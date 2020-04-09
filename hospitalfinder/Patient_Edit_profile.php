<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();


if(isset($_POST["patient_id"]) &&  isset($_POST["first_name"]) && isset($_POST["middle_name"])
 && isset($_POST["last_name"]) &&  isset($_POST["date_of_birth"])&& isset($_POST["mobile_number"])   ){


  $insData["first_name"]=$_POST["first_name"];
  $insData["middle_name"]=$_POST["middle_name"];
  $insData["last_name"]=$_POST["last_name"];
  $insData["date_of_birth"]=$_POST["date_of_birth"];
  $insData["mobile_number"]=$_POST["mobile_number"];
  $where["patient_id"]=$_POST["patient_id"];
  $resultUpdate=$obj->update("patient",$insData,$where,"or");

  if($resultUpdate){
    $return["STATUS"]="1";
    $return["MSG"]="Update sucessfully..";

  }else{

    $return["STATUS"]="0";
    $return["MSG"]="Not updated";
  }

}
else{

  $return["STATUS"]="000";
  $return["MSG"]="Field id not set...";
}
echo json_encode($return);
