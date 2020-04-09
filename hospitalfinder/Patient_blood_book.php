<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if(isset($_POST["patient_id"]) && isset($_POST["hospital_id"]) && isset($_POST["blood_id"]) && isset($_POST["quantity"]) &&
 isset($_POST["date"])  ){


   $insData["patient_id"]=$_POST["patient_id"];
   $insData["hospital_id"]=$_POST["hospital_id"];
   $insData["blood_id"]=$_POST["blood_id"];
   $insData["quantity"]=$_POST["quantity"];
   $insData["date"]=$_POST["date"];

   $result= $obj->insert("order_blood",$insData);

   if($result){
     $insData1["patient_id"]=$_POST["patient_id"];
     $insData1["hospital_id"]=$_POST["hospital_id"];
     $result1= $obj->insert("notification_blood",$insData1);
      if($result1){

        $return["STATUS"]="1";
        $return["MSG"]="Inserted";
      }else{
        $return["STATUS"]="000";
        $return["MSG"]="Not Inserted";
      }


   }else{
     $return["STATUS"]="0";
     $return["MSG"]="Not Inserted";
   }

}else{
  $return["STATUS"]="00";
  $return["MSG"]="Field id not set";

}
echo json_encode($return);
