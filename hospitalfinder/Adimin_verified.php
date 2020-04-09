<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["hospital_id"]) ){


  $filedname["status"]="1";
  $where["hospital_id"]=$_POST["hospital_id"];
  $result=$obj->update("hospital",$filedname,$where,"or");

  $return["STATUS"]=true;
  $return["MSG"]="update sucessfully...";


}else{

  $return["STATUS"]=false;
  $return["MSG"]="Field id not set...";
}
echo json_encode($return);
