<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["hospital_id"])){
  $result=$obj->myQuery("select about from hospital where hospital_id='".$_POST["hospital_id"]."'")->fetch_assoc();

if(count($result)!=0){
  $return["STATUS"]="1";
  $return["about"]=$result["about"];
  $return["MSG"]="found";

}else{
  $return["STATUS"]="0";
  $return["about"]="";
  $return["MSG"]="not found";

}


}else{


    $return["STATUS"]="00";
    $return["about"]="";

    $return["MSG"]="some error or field is not set..";

}
echo json_encode($return);
