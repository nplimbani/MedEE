<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if(isset($_POST["appointment_id"])  ){
//$result=$obj->myQuery("select * from order_blood where `status`= 1 and `patient_id`= '".$_POST["patient_id"]."' ");
$filedname1["status"]="1";
$filedname1["d_status"]="0";

$where["appointment_id"]=$_POST["appointment_id"];
$result=$obj->update("appointment",$filedname1,$where,"or");

if($result){
  $result4=$obj->myQuery("select * from appointment where `appointment_id`='".$_POST["appointment_id"]."'")->fetch_assoc();
  /*$resultData[];
  while ($row=$result4->fetch_assoc()) {

    $resultData=$row;
  }*/
  $insData1["patient_id"]=$result4["patient_id"];
  $insData1["hospital_id"]=$result4["hospital_id"];
  $insData1["docter_id"]=$result4["docter_id"];
  $insData1["appointment_id"]=$result4["appointment_id"];
  $insData1["status"]=1;
  $result5= $obj->insert("notification_appointment",$insData1);

  $insData2["patient_id"]=$result4["patient_id"];
  $insData2["hospital_id"]=$result4["hospital_id"];
  $insData2["docter_id"]=$result4["docter_id"];
  $insData2["appointment_id"]=$result4["appointment_id"];
  $insData2["h_status"]=1;
  $result6= $obj->insert("notification_appointment",$insData2);
  if($result5 && $result6){
    $return["STATUS"]="1";
    $return["MSG"]="Your Appointment is Confirm";
  }
  else{
    $return["STATUS"]="00";
    $return["MSG"]=" Not confirmed sucessfully...";
  }



}else{
  $return["STATUS"]="1";
  $return["MSG"]="Your Appointment is not Confirm ";

}


}
else{
  $return["STATUS"]="00";
  $return["MSG"]="field is not set.. ";

}



echo json_encode($return);
