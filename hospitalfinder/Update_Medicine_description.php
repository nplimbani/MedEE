<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();


if( isset($_POST["medicine_id"]) && isset($_POST["description"]) ){


  $filedname["description"]=$_POST["description"];
  $where["medicine_id"]=$_POST["medicine_id"];

  $resultUpdate=$obj->update("medicine",$filedname,$where,"or");

  if($resultUpdate){

    $return["STATUS"]="1";
    $return["MSG"]="Medicine description update sucessfully ";
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
