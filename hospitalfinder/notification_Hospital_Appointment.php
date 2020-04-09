<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if( isset($_POST["hospital_id"])){
        $result=$obj->myQuery("select * from notification_appointment where `hospital_id`= '".$_POST["hospital_id"]."' and `read_status`= 0 AND `status`=0 ");


        $resultData=array();
        while($row=$result->fetch_assoc())
        {

         $resultData[]=$row;
        }
        if($resultData!=""){

          //  $return["msg"]="Details found";
        //  print_r ($row);
            $return["STATUS"]="1";
            $return["Anotification"]=$resultData;
        }
        else{
          $return["STATUS"]="0";
          $return["Anotification"]="Not avilable";

        }


}else{

  $return["STATUS"]="00";
  $return["Anotification"]="Field id not set...";
}
echo json_encode($return);
