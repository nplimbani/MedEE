<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if(isset($_POST["patient_id"])){
$result=$obj->myQuery("select * from appointment where `status`= 2 and `patient_id`= '".$_POST["patient_id"]."' ");

$resultData=array();


while($row=$result->fetch_assoc())
{
  $result1=$obj->myQuery("select * from hospital where `hospital_id`= '".$row["hospital_id"]."'");
  while($row1=$result1->fetch_assoc()){
    $row["email_id"]=$row1["email_id"];
    $row["name"]=$row1["name"];
    $row["mobile_number"]=$row1["mobile_number"];
    $row["city"]=$row1["city"];
    $row["state"]=$row1["state"];


    }
    $result1=$obj->myQuery("select * from docter where `docter_id`= '".$row["docter_id"]."'");
    while($row1=$result1->fetch_assoc()){
      $row["first_name"]=$row1["first_name"];
      $row["middle_name"]=$row1["middle_name"];
      $row["last_name"]=$row1["last_name"];



      }

 $resultData[]=$row;

}
if($resultData!=""){

  //  $return["msg"]="Details found";
//  print_r ($row);



    $return["STATUS"]="1";
    $return["Patient_Appointment_Details"]=$resultData;
}
else{
  $return["STATUS"]="0";
  $return["Patient_Appointment_Details"]="not avialbale";

}
}
else{
  $return["STATUS"]="00";
  $return["Patient_Appointment_Details"]="field is not set.. ";

}



echo json_encode($return);
