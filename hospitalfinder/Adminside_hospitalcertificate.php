<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["hospital_id"])){
$result=$obj->myQuery("select certificate from hospital where `hospital_id`= '".$_POST["hospital_id"]."'")->fetch_assoc();
$pdffileurl=$result["certificate"];
if($result!=null){
  $certificateurl=$obj->IMAGEWEBURL.$pdffileurl;
}

$return["STATUS"]=true;
$return["MSG"]="certificate retrived";
$return["certificate"]=$certificateurl;

}else{

  $return["STATUS"]=false;
  $return["MSG"]="Field Is Not Set...";
  $return["certificate"]=null;

}
echo json_encode($return);
