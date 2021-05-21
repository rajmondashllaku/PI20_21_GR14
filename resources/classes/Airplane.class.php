<?php


class Airplane{
    private $aid;
    private $aname='';
    private $cruisingRange=0;

    public function __construct($aname)
    {
        $nrParametrave=func_num_args();
        $parametrat=func_get_args();
        switch($nrParametrave)
        {
            case 1:
               $this->constructor1($parametrat[0]);
               break;
            case 2:
                $this->constructor2($parametrat[0],$parametrat[1]);
                break;
            default:
             return;
         
        }
    }
    private function constructor1($aname)
    {
        $this->aid++;
        $this->aname=$aname;

    }
    private function constructor2($aname,$cruisingRange)
    {
        $this->aid++;
        $this->aname=$aname;
        $this->cruisingRange=$cruisingRange;
    }
    public function getAid()
    {
        return $this->aid;
    }
    public function getAname()
    {
        return $this->aname;
    }
    public function getCruisingRange()
    {
        return $this->cruisingRange;
    }


}
function insertAirplane($db,$airplane)
{
    $sql="INSERT INTO airplanes(aname,cruisingrange) VALUES(%s,%d)";

    if($airplane->getCruisingRange()==0)
    {

        $result=$db->executeData($sql,$airplane->getAname(),0);
    }
    else {
        $result=$db->executeData($sql,$airplane->getAname(),$airplane->getCruisingRange());
    }
    if($result)
    {
        return true;
    }
    return false;

}