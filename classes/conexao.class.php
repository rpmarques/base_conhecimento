<?php

/* ESTE ARQUIVO FAZ A CONEXÃO COM O BANCO DE DADOS */


// LOCALHOST
DEFINE('USER', 'root');
DEFINE('PASSWORD', '');
DEFINE('HOST', 'localhost');
DEFINE('DBNAME', 'chamados');
DEFINE('CHARSET', 'utf8');

class Conexao {
   //Atributo estático para instância do PDO   
   private static $pdo;
   // Escondendo o construtor da classe      
   private function __construct() {
      //   
   }

   public static function getInstance() {
      if (!isset(self::$pdo)) {
         try {
            self::$pdo = new PDO("pgsql:host=192.168.10.14;port=5432;dbname=supogen ;user=postgres;password=genesys");
//            $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);
//            self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } catch (PDOException $e) {
            print "Erro: " . $e->getMessage();
         }
      }
      return self::$pdo;
   }
}

?>
