<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["order_id"]) && isset($_POST["reason"]) ){




      $filedname1["status"]="2";
      $filedname1["reason"]=$_POST["reason"];
      $where["order_id"]=$_POST["order_id"];
      $result3=$obj->update("order_blood",$filedname1,$where,"or");
      if($result3){
        $return["STATUS"]="1";
        $return["MSG"]="update sucessfully...";
      }
      else{
        $return["STATUS"]="0";
        $return["MSG"]=" Not Rejected sucessfully...";
      }
  
}else{

  $return["STATUS"]="000";
  $return["MSG"]="Field id not set...";
}
echo json_encode($return);
