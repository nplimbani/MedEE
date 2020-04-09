<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if(isset($_POST["login_id"])){
//$result=$obj->myQuery("select * from order_blood where `status`= 1 and `patient_id`= '".$_POST["patient_id"]."' ");
$where["login_id"]=$_POST["login_id"];
$result=$obj->delete("login",$where,"or");

if($result){
  $return["STATUS"]="1";
  $return["MSG"]="Your login is cancled ";


}else{
  $return["STATUS"]="1";
  $return["MSG"]="Your login is not cancled ";

}


}
else{
  $return["STATUS"]="00";
  $return["MSG"]="field is not set.. ";

}



echo json_encode($return);
