<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if(isset($_POST["patient_id"]) && isset($_POST["hospital_id"]) && isset($_POST["docter_id"]) && isset($_POST["date"]) &&
 isset($_POST["time"])  ){

   $result=$obj->myQuery("select patient_id,hospital_id,docter_id,date,time from appointment where `patient_id`='".$_POST["patient_id"]."' AND `hospital_id`='".$_POST["hospital_id"]."' AND `docter_id`='".$_POST["docter_id"]."' AND `date`='".$_POST["date"]."' ")->fetch_assoc();

if($result!=null){

        $return["STATUS"]="000";
        $return["MSG"]="Already booked";
    }else{
      $insData["patient_id"]=$_POST["patient_id"];
      $insData["hospital_id"]=$_POST["hospital_id"];
      $insData["docter_id"]=$_POST["docter_id"];
      $insData["date"]=$_POST["date"];
      $insData["time"]=$_POST["time"];

      $result1= $obj->insert("appointment",$insData);

      if($result1){
        $result=$obj->myQuery("select appointment_id from appointment where `patient_id`='".$_POST["patient_id"]."' AND `hospital_id`='".$_POST["hospital_id"]."' AND `docter_id`='".$_POST["docter_id"]."' AND `date`='".$_POST["date"]."' ")->fetch_assoc();

        $insData1["patient_id"]=$_POST["patient_id"];
        $insData1["hospital_id"]=$_POST["hospital_id"];
        $insData1["docter_id"]=$_POST["docter_id"];
        $insData1["appointment_id"]=$result["appointment_id"];


        $result2= $obj->insert("notification_appointment",$insData1);
         if($result2){

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
    }
}else{
  $return["STATUS"]="00";
  $return["MSG"]="Field id not set";

}
echo json_encode($return);
