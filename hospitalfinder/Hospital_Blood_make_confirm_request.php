<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["order_id"]) && isset($_POST["blood_id"]) && isset($_POST["stock"]) ){

  $result=$obj->myQuery("select stock from blood where `blood_id`= '".$_POST["blood_id"]."'  ")->fetch_assoc();
  $filedname["stock"]=$result["stock"]-$_POST["stock"];
  $where["blood_id"]=$_POST["blood_id"];
  $result2=$obj->update("blood",$filedname,$where,"or");
  if($result2){

    /*  $filedname1["status"]=1;
      $where["order_id"]=$_POST["order_id"];
      $result3=$obj->update("order_blood",$filedname1,$where,"or");*/
      $result3=$obj->myQuery("UPDATE `order_blood` SET `status`=1 WHERE `order_id`='".$_POST["order_id"]."'");
      if($result3){

        $result4=$obj->myQuery("select * from order_blood where `order_id`='".$_POST["order_id"]."'")->fetch_assoc();
        /*$resultData[];
        while ($row=$result4->fetch_assoc()) {

          $resultData=$row;
        }*/
        $insData1["patient_id"]=$result4["patient_id"];
        $insData1["hospital_id"]=$result4["hospital_id"];
        $insData1["status"]=1;
        $result5= $obj->insert("notification_blood",$insData1);

        if($result5){
          $return["STATUS"]="1";
          $return["MSG"]=$_POST["order_id"];
        }
        else{
          $return["STATUS"]="00";
          $return["MSG"]=" Not confirmed sucessfully...";
        }

      }
      else{
        $return["STATUS"]="0";
        $return["MSG"]=" Not confirmed sucessfully...";
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
