<?php


require_once ("../resources/config.php");
include_once(databaza);
$db=new database();


    if(isset($_POST['query']))
    {
        $output='<ul style="background-color:#eee;cursor:pointer;width:250px;">';
        $query="SELECT * from flights where  origin LIKE '%".$_POST['query']."%'";

        $result=$db->getData($query);
        foreach($result as $key=>$value){
            $output.="<li class='origin' style='padding:6px;'>".$value['origin']."</li>";
        }
        $output.="</ul>";
        echo $output;

    }
    if(isset($_POST['query1']))
    {
        $output='<ul style="background-color:#eee;cursor:pointer;width:250px;">';
        $query="SELECT * from flights where  origin LIKE '%".$_POST['query1']."%'";

        $result=$db->getData($query);
        foreach($result as $key=>$value){
            $output.="<li  class='destination' style='padding:6px;'>".$value['destination']."</li>";
        }
        $output.="</ul>";
        echo $output;

    }
    