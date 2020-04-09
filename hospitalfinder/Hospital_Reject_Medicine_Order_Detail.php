<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["order_medicine_id"]) && isset($_POST["reason"]) ){




  $result3=$obj->myQuery("UPDATE `order_medicine` SET `status`=2,`reason`='".$_POST["reason"]."' WHERE `order_medicine_id`='".$_POST["order_medicine_id"]."'");

      if($result3){
        $result4=$obj->myQuery("select * from order_medicine where `order_medicine_id`='".$_POST["order_medicine_id"]."'")->fetch_assoc();
                /*$resultData[];
                while ($row=$result4->fetch_assoc()) {

                  $resultData=$row;
                }*/
                $insData1["patient_id"]=$result4["patient_id"];
                $insData1["hospital_id"]=$result4["hospital_id"];
                $insData1["status"]=2;
                $result5= $obj->insert("notification_medicine",$insData1);

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

  $return["STATUS"]="000";
  $return["MSG"]="Field id not set...";
}
echo json_encode($return);
