<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();


if( isset($_POST["blood_id"]) && isset($_POST["blood_group"]) && isset($_POST["stock"])
 ){

   $insData["blood_group"]=$_POST["blood_group"];
   $insData["stock"]=$_POST["stock"];
   $where["blood_id"]=$_POST["blood_id"];
   $resultUpdate=$obj->update("blood",$insData,$where,"or");

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
