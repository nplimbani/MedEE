<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["order_id"]) && isset($_POST["blood_id"]) && isset($_POST["stock"]) && isset($_POST["reason"]) ){

  $result=$obj->myQuery("select stock from blood where `blood_id`= '".$_POST["blood_id"]."'  ")->fetch_assoc();
  $filedname["stock"]=$result["stock"]+$_POST["stock"];
  $where["blood_id"]=$_POST["blood_id"];
  $result2=$obj->update("blood",$filedname,$where,"or");
  if($result2){

    $result3=$obj->myQuery("UPDATE `order_blood` SET `status`=2,`reason`='".$_POST["reason"]."' WHERE `order_id`='".$_POST["order_id"]."'");

      if($result3){

        $result4=$obj->myQuery("select * from order_blood where `order_id`='".$_POST["order_id"]."'")->fetch_assoc();

        $insData1["patient_id"]=$result4["patient_id"];
        $insData1["hospital_id"]=$result4["hospital_id"];
        $insData1["status"]=2;
        $result5= $obj->insert("notification_blood",$insData1);

        if($result5){
          $return["STATUS"]="1";
          $return["MSG"]="sucessfully";
        }
        else{
          $return["STATUS"]="00";
          $return["MSG"]=" Not confirmed sucessfully...";
        }
      }
      else{
        $return["STATUS"]="0";
        $return["MSG"]=" Not Rejected sucessfully...";
      }
  }else{
    $return["STATUS"]="00";
    $return["MSG"]=" Not update stock  sucessfully...";
  }
}else{

  $return["STATUS"]="000";
  $return["MSG"]="Field id not set...";
}
echo json_encode($return);
