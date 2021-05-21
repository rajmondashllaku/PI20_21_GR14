<?php

include (__DIR__."/../config.php");



class database extends db_connector {
  
}


class db_connector {
  public $connection;

  protected function connector_create_db() {
       global $config;
       $this->connection=mysqli_connect($config["db"]["host"],$config["db"]["username"],$config["db"]["password"]);
       if(!$this->connection)
       {
           die("Connection failed");

       }

       $sql="CREATE DATABASE ".$config["db"]["dbname"];

       if(mysqli_query($this->connection,$sql))
           $rez=true;
        else
           $rez=false;

//  $this->close_connection();
        return $rez;

        
     
  }
  public function getData($sql)
  {
    $this->connect();

    try {
      if ($sql instanceof safe_query) {
          $sql = $sql->merr_safe_string($this->connection);
      } else if (func_num_args() > 1) {
          $sql = (new safe_query(func_get_args()))->merr_safe_string($this->connection);
      }
  }
  catch (Exception $e) {
      $this->close_connection();
      return array();
  }
    $array = array();
      mysqli_real_escape_string($this->connection,$sql);
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                array_push($array, $row);
            }
        }
        $this->close_connection();
        return $array;

  }
  public function executeData($sql){
    
    $this->connect();
       // Nese kemi safe_query ose me shume parametra provo merr safe string.
       try {
        if ($sql instanceof safe_query) {
            $sql = $sql->merr_safe_string($this->connection);
        } else if (func_num_args() > 1) {
            $sql = (new safe_query(func_get_args()))->merr_safe_string($this->connection);
    
          }
    }
    catch (Exception $e) {
        $this->close_connection();
        return false;
    }
    echo $sql;
    if (mysqli_query($this->connection, $sql)) {
        return true;
    }
        return false;
  }

  public function connect()
  {
    global $config;
    $this->connection=mysqli_connect($config['db']['host'],$config['db']['user'],$config['db']['password'],$config['db']['dbname']);
    $error = mysqli_connect_error();
    if ( mysqli_connect_errno() ) {
      die( mysqli_connect_error() ); // die() is equivalent to exit()
      }

  }
  private function close_connection()
  {

    mysqli_close($this->connection);
  }
 


};
class safe_query {
  private $sql;
  private $parametrat;
  public function __construct($sql) {
      if (is_array($sql)) {
          if (empty($sql)) throw new Exception("Krijim jo valid i safe query.");
          $this->sql = array_shift($sql);
          $this->parametrat = $sql;
          return;
      }
      $this->sql = $sql;
      $argumentet = func_get_args();
      array_shift($argumentet);
      $this->parametrat = $argumentet;
  }
  public function merr_safe_string($connection) {
      $pattern = '/(?<!\\\)%(s|d)/';
      $count = count($this->parametrat);
      $i = 0;
      $rez = preg_replace_callback(
          $pattern,
          function ($matches) use ($connection, $count, &$i) {
              if ($i >= $count) {
                  throw new Exception("Mosperputhje e parametrave tek $this->sql.");
              }
              $parametri = $this->parametrat[$i++];
              switch ($matches[1])
              {
                  case 's':
                      return "'" . mysqli_real_escape_string($connection, $parametri) . "'";
                  case 'd':
                      $pattern_numer = '/^\s*[+\-]?(?:\d+(?:\.\d+)?|\.\d+)\s*$/';
                      if (preg_match($pattern_numer, $parametri)) {
                          return $parametri;
                      } else throw new Exception("Vlere jo numerike $parametri.");
                  default:
                      return $matches[0];
              }
          },
          $this->sql);
      
      return str_replace("\%", "%", $rez);
  }
}






?>