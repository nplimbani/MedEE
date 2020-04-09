<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();


  $result=$obj->myQuery("select DISTINCT   state_name from pincode_master ");


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




echo json_encode($return);
