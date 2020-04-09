<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["state_name"])){
  $result=$obj->myQuery("select DISTINCT district_name from pincode_master where `state_name`= '".$_POST["state_name"]."'  ");


  $resultData=array();
  while($row=$result->fetch_assoc())
  {


   $resultData[]=$row;
  }
  if($resultData!=""){

    //  $return["msg"]="Details found";
  //  print_r ($row);
      $return["STATUS"]="1";
      $return["stateDetails"]=$resultData;
  }
  else{
    $return["STATUS"]="0";
    $return["stateDetails"]="";

  }


}
else{

  $return["STATUS"]="00";
  $return["stateDetails"]="some error or field is not set..";
}


echo json_encode($return);
