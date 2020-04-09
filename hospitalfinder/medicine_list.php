<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if( isset($_POST["hospital_id"])){
        $result=$obj->myQuery("select * from medicine where `hospital_id`= '".$_POST["hospital_id"]."'  ");


        $resultData=array();
        while($row=$result->fetch_assoc())
        {

         $resultData[]=$row;
        }
        if($resultData!=""){

          //  $return["msg"]="Details found";
        //  print_r ($row);
            $return["STATUS"]="1";
            $return["MedicineDetails"]=$resultData;
        }
        else{
          $return["STATUS"]="0";
          $return["MedicineDetails"]="Not avilable";

        }


}else{

  $return["STATUS"]="00";
  $return["MedicineDetails"]="Field id not set...";
}
echo json_encode($return);
