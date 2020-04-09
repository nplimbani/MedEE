<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["district_name"])){
  $result=$obj->myQuery("select DISTINCT pincode from pincode_master where `district_name`= '".$_POST["district_name"]."'  ");


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
