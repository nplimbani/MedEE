<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
$result=$obj->myQuery("select hospital_id,name,profile from hospital where `status`= 0  ");

$resultData=array();
while($row=$result->fetch_assoc())
{
    $row["profile"]=$obj->IMAGEWEBURL.$row["profile"];

 $resultData[]=$row;
}
if($resultData!=""){

  //  $return["msg"]="Details found";
//  print_r ($row);
    $return["STATUS"]="1";
    $return["hospitaldetails"]=$resultData;
}
else{
  $return["STATUS"]="0";
  $return["hospitaldetails"]=null;

}




echo json_encode($return);
