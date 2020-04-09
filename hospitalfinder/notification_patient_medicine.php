<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if( isset($_POST["patient_id"])){
        $result=$obj->myQuery("select * from notification_medicine where `patient_id`= '".$_POST["patient_id"]."' AND status =1 or status =2  ");


        $resultData=array();
        while($row=$result->fetch_assoc())
        {

         $resultData[]=$row;
        }
        if($resultData!=""){

          //  $return["msg"]="Details found";
        //  print_r ($row);
            $return["STATUS"]="1";
            $return["Mnotification"]=$resultData;
        }
        else{
          $return["STATUS"]="0";
          $return["Mnotification"]="Not avilable";

        }


}else{

  $return["STATUS"]="00";
  $return["Mnotification"]="Field id not set...";
}
echo json_encode($return);
