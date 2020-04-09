<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();


if( isset($_POST["medicine_id"]) && isset($_POST["name"]) && isset($_POST["stock"])
 ){

   $insData["name"]=$_POST["name"];
   $insData["stock"]=$_POST["stock"];
   $where["medicine_id"]=$_POST["medicine_id"];
   $resultUpdate=$obj->update("medicine",$insData,$where,"or");

   if($resultUpdate){
     $return["STATUS"]="1";
     $return["MSG"]="Update sucessfully..";

   }else{

     $return["STATUS"]="0";
     $return["MSG"]="Not updated";
   }


 }else{

   $return["STATUS"]="00";
   $return["MSG"]="Field id not set...";
 }
 echo json_encode($return);
