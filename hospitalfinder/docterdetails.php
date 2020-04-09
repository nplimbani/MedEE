<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["hospital_id"])){
  $result=$obj->myQuery("select * from docter where `hospital_id`= '".$_POST["hospital_id"]."'  ");


  $resultData=array();
  while($row=$result->fetch_assoc())
  {
  $row["docter_image"]=$obj->IMAGEWEBURL.$row["docter_image"];

   $resultData[]=$row;
  }
  if($resultData!=""){

    //  $return["msg"]="Details found";
  //  print_r ($row);
      $return["STATUS"]="1";
      $return["DocterDetails"]=$resultData;
  }
  else{
    $return["STATUS"]="0";
    $return["DocterDetails"]="";

  }


}
else{

  $return["STATUS"]="00";
  $return["hospitaldetails"]="some error or field is not set..";
}


echo json_encode($return);
