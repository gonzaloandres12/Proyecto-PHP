<?php

/*
 * Acceso a datos con BD Usuarios : 
 * Usando la librería mysqli
 * Uso el Patrón Singleton :Un único objeto para la clase
 * Constructor privado, y métodos estáticos 
 */
class AccesoDatosLogin {
    
    private static $modelo = null;
    private $dbh = null;
    
    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatosLogin();
        }
        return self::$modelo;
    }
    
    

   // Constructor privado  Patron singleton
   
    private function __construct(){
        
       
         $this->dbh = new mysqli(DB_SERVER,DB_USER,DB_PASSWD,DATABASE_LOGIN);
         
      if ( $this->dbh->connect_error){
         die(" Error en la conexión ".$this->dbh->connect_errno);
        } 

    }

    //login = Gonzalo pass = Gonzalo rol = 0 INSERT INTO `user`(`login`, `password`, `rol`) VALUES ('Gonzalo',SHA('Gonzalo'),'1')
    //login = Alfonso pass = Alfonso rol = 1 INSERT INTO `user`(`login`, `password`, `rol`) VALUES ('Alfonso',SHA('Alfonso'),'1')
    public function obtenerDatosLogin ($login,$pass) {
        $cli = false;
        
        $stmt_login   = $this->dbh->prepare("SELECT * FROM `user` WHERE `login` = ? and `password` = SHA(?);");
        if ( $stmt_login == false) die ($this->dbh->error);

        // Enlazo $login con el primer ? 
        $stmt_login->bind_param('ss', $login, $pass);
        $stmt_login->execute();
        $result = $stmt_login->get_result();
        if ( $result ){
            $cli = $result->fetch_object('User');
            }
        
        return $cli;
    }

        // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
        public static function closeModelo(){
            if (self::$modelo != null){
                $obj = self::$modelo;
                // Cierro la base de datos
                $obj->dbh->close();
                self::$modelo = null; // Borro el objeto.
            }
        }
    
    
    
     // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }

    
}



