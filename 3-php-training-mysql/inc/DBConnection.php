<?php
// Singleton to connect db. 
// For those that read comments, this is a design pattern !
// Check it out.
class DBConnection {
    // Hold the class instance.
    private static $instance = null;
    private $conn;
    
    // The db connection is established in the private constructor.
    private function __construct()
    {
      // This could really be done in a better way.
      // Yet, as students have a way of never setting a web server properly...
      // this should be bullet proof.
      $credentials_filepath = dirname(__FILE__).'/../../credentials.ini';
      $config = parse_ini_file($credentials_filepath); 
      if(empty($config)){
        // have you copied the credentials sample and renamed it ?
        throw new Exception('missing credentials file. Please check your code.');
      }
      try {
       $this->conn = new PDO("mysql:host=".$config['server'].":".$config['port'].";dbname=".$config['dbname'],$config['username'],$config['password'],
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
      } catch (PDOException $e) {
        error_log('Error whilst connecting to database. ');
        // Please check your ini file 
        throw $e;
      }
    }
    
    public static function getInstance()
    {
      if(!self::$instance)
      {
        self::$instance = new DBConnection();
      }
     
      return self::$instance;
    }
    
    public function getConnection()
    {
      return $this->conn;
    }
  }