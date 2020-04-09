<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if(isset($_POST["hospital_id"])){
$result=$obj->myQuery("select * from order_medicine where `status`= 1 and `hospital_id`= '".$_POST["hospital_id"]."' ");

$resultData=array();
while($row=$result->fetch_assoc())
{
  $result1=$obj->myQuery("select * from patient where `patient_id`= '".$row["patient_id"]."'");
  while($row1=$result1->fetch_assoc()){
    $row["email_id"]=$row1["email_id"];
    $row["first_name"]=$row1["first_name"];
    $row["middle_name"]=$row1["middle_name"];
    $row["last_name"]=$row1["last_name"];
    $row["date_of_birth"]=$row1["date_of_birth"];
    $row["mobile_number"]=$row1["mobile_number"];


    }
    $result1=$obj->myQuery("select * from medicine where `medicine_id`= '".$row["medicine_id"]."'");
    while($row1=$result1->fetch_assoc()){
      $row["medicine_name"]=$row1["name"];



      }
 $resultData[]=$row;
}
if($resultData!=""){

  //  $return["msg"]="Details found";
//  print_r ($row);
    $return["STATUS"]="1";
    $return["Order_Medicine_Details"]=$resultData;
}
else{
  $return["STATUS"]="0";
  $return["Order_Medicine_Details"]="not avialbale";

}
}
else{
  $return["STATUS"]="00";
  $return["Order_Medicine_Details"]="field is not set.. ";

}



echo json_encode($return);
