<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if( isset($_POST["hospital_id"])){
        $result=$obj->myQuery("select * from blood where `hospital_id`= '".$_POST["hospital_id"]."'  ");


        $resultData=array();
        while($row=$result->fetch_assoc())
        {

         $resultData[]=$row;
        }
        if($resultData!=""){

          //  $return["msg"]="Details found";
        //  print_r ($row);
            $return["STATUS"]="1";
            $return["BloodDetails"]=$resultData;
        }
        else{
          $return["STATUS"]="0";
          $return["BloodDetails"]="Not avilable";

        }


}else{

  $return["STATUS"]="00";
  $return["BloodDetails"]="Field id not set...";
}
echo json_encode($return);
