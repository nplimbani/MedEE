<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if( isset($_POST["hospital_id"]) && isset($_POST["name"]) && isset($_POST["stock"])  && isset($_POST["description"])  ){

  $insData["hospital_id"]=$_POST["hospital_id"];
  $insData["name"]=$_POST["name"];
  $insData["stock"]=$_POST["stock"];
  $insData["description"]=$_POST["description"];

  $result= $obj->insert("medicine",$insData);
      if($result)
      {
            $return["STATUS"]="1";
            $return["MSG"]="Insert Successful...";

       }
     else{

       $return["STATUS"]="0";
       $return["MSG"]="Not Inserted..";
     }


}else{


    $return["STATUS"]="00";
    $return["MSG"]="Field id not set...";

}
echo json_encode($return);
