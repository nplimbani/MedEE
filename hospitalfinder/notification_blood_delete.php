<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if(isset($_POST["b_notification_id"])){
//$result=$obj->myQuery("select * from order_blood where `status`= 1 and `patient_id`= '".$_POST["patient_id"]."' ");
$where["b_notification_id"]=$_POST["b_notification_id"];
$result=$obj->delete("notification_blood",$where,"or");

if($result){
  $return["STATUS"]="1";
  $return["MSG"]="Your Order Request is Cancled ";


}else{
  $return["STATUS"]="1";
  $return["MSG"]="Your Order Request is Not Cancled ";

}


}
else{
  $return["STATUS"]="00";
  $return["MSG"]="field is not set.. ";

}



echo json_encode($return);
