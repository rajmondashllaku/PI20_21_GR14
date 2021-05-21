<?php 

class Flight{
  
    private $fid=0;
    private $origin="";
    private $destination="";
    private $flight_date="";
    private $flight_return="";
    private $qmimi;
    public function __construct()
    {
        $nrParametrave=func_num_args();
        $parametrat=func_get_args();
        echo $nrParametrave;
        switch($nrParametrave){
          case 4:
              $this->constructor1($parametrat[0],$parametrat[1],$parametrat[2],$parametrat[3]);
              break;
          case 5:
              $this->constructor2($parametrat[0],$parametrat[1],$parametrat[2],$parametrat[3],$parametrat[4]);
          default:
             $this->fid="";

        }
        
    }
    private function constructor1($origin,$destination,$flight_date,$qmimi)
    {
        $this->fid++;
        $this->origin=$origin;
        $this->destination=$destination;
        $this->flight_date=$flight_date;
        $this->qmimi=$qmimi;
        
    }
    private function constructor2($origin,$destination,$flight_date,$flight_return,$qmimi)
    {
        $this->fid++;
        $this->origin=$origin;
        $this->destination=$destination;
        $this->flight_date=$flight_date;
        $this->flight_return=$flight_return;
        $this->qmimi=$qmimi;
        
    }
    
    public function __get($name)
    {
        return $name;
    }
    public function __set($name, $value)
    {
        $this->name=$value;
    }
    public function getOrigin()
    {
        return $this->origin;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function getFlightDate()
    {
        return $this->flight_date;
    }
    public function getFlightReturn()
    {
        return $this->flight_return;
    }
    public function getQmimi(){
        return $this->qmimi;
    }
}

function createFlight()
{
    $flight="";
    $parametrat=func_get_args();
    switch(count($parametrat))
    {
        case 4:
           $flight=new Flight($parametrat[0],$parametrat[1],$parametrat[2],$parametrat[3]);
        case 5:
           $flight=new Flight($parametrat[0],$parametrat[1],$parametrat[2],$parametrat[3],$parametrat[4]);
           
    }


}
function insertFlight($db,$flight)
{
   if($flight->getFlightReturn()==""){
       var_dump($flight->getFlightReturn());
    $sql="INSERT INTO flights(origin,destination,flight_date,flight_return,Qmimi) 
    VALUES('{$flight->getOrigin()}','{$flight->getDestination()}','{$flight->getFlightDate()}',NULL,'{$flight->getQmimi()}');";
    }
   else {
    $sql="INSERT INTO flights(origin,destination,flight_date,flight_return,Qmimi) 
    VALUES('{$flight->getOrigin()}','{$flight->getDestination()}','{$flight->getFlightDate()}','{$flight->getFlightReturn()}','{$flight->getQmimi()}');";
   }
   echo $sql;
   if($db->executeData($sql)){
       return true;
   }
   else 
     return false;
}



?>