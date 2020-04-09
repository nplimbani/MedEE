<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();


if(isset($_POST["hospital_id"]) && isset($_POST["about"])){


  $filedname["about"]=$_POST["about"];
  $where["hospital_id"]=$_POST["hospital_id"];
  $resultUpdate=$obj->update("hospital",$filedname,$where,"or");

  if($resultUpdate){

    $return["STATUS"]="1";
    $return["MSG"]="About update sucessfully ";
  }
  else{

        $return["STATUS"]="0";
        $return["MSG"]="Not Updated ";
      }





}
else{

  $return["STATUS"]="00";
  $return["MSG"]="some error or field is not set..";
}
echo json_encode($return);
