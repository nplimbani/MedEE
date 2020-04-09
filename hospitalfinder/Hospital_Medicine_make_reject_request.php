<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["order_medicine_id"]) && isset($_POST["medicine_id"]) && isset($_POST["stock"]) && isset($_POST["reason"]) ){

  $result=$obj->myQuery("select stock from medicine where `medicine_id`= '".$_POST["medicine_id"]."'  ")->fetch_assoc();
  $filedname["stock"]=$result["stock"]+$_POST["stock"];
  $where["medicine_id"]=$_POST["medicine_id"];
  $result2=$obj->update("medicine",$filedname,$where,"or");
  if($result2){

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
                $insData2["patient_id"]=$result4["patient_id"];
                $insData2["hospital_id"]=$result4["hospital_id"];
                $insData2["h_status"]=2;
                $result6= $obj->insert("notification_medicine",$insData2);

                if($result5 && $result6){
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
