<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();


if( isset($_POST["docter_id"]) && isset($_POST["first_name"]) && isset($_POST["middle_name"])
 && isset($_POST["last_name"]) &&  isset($_POST["qualification"])&& isset($_POST["mobile_number"]) && isset($_POST["category"]) ){


      $insData["first_name"]=$_POST["first_name"];
      $insData["middle_name"]=$_POST["middle_name"];
      $insData["last_name"]=$_POST["last_name"];
      $insData["qualification"]=$_POST["qualification"];
      $insData["mobile_number"]=$_POST["mobile_number"];
      $insData["category"]=$_POST["category"];

      $where["docter_id"]=$_POST["docter_id"];
      $resultUpdate=$obj->update("docter",$insData,$where,"or");

      if($resultUpdate){
        $return["STATUS"]="1";
        $return["MSG"]="Update sucessfully..";

      }else{

        $return["STATUS"]="0";
        $return["MSG"]="Not updated";
      }



}
else{

  $return["STATUS"]="00";
  $return["MSG"]="Field id not set...";
}
echo json_encode($return);
