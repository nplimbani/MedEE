<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["hospital_id"]) && isset($_POST["medicine_id"])){
  $result=$obj->myQuery("select description from medicine where hospital_id='".$_POST["hospital_id"]."' AND medicine_id='".$_POST["medicine_id"]."' ")->fetch_assoc();

if(count($result)!=0){
  $return["STATUS"]="1";
  $return["description"]=$result["description"];
  $return["MSG"]="found";

}else{
  $return["STATUS"]="0";
  $return["description"]="";
  $return["MSG"]="not found";

}


}else{


    $return["STATUS"]="00";
    $return["description"]="";

    $return["MSG"]="some error or field is not set..";

}
echo json_encode($return);
