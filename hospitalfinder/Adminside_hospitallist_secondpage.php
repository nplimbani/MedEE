<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["hospital_id"])){
$result=$obj->myQuery("select * from hospital where `hospital_id`= '".$_POST["hospital_id"]."'  ");
/*name,owner_name,mobile_number,category,type,time,
                            building_no,colony,land_mark,area,pincode,city,state,latitude,longitude,medical_facilities,about*/

$resultData=array();
while($row=$result->fetch_assoc())
{
    $row["profile"]=$obj->IMAGEWEBURL.$row["profile"];
    $row["hospital_image"]=$obj->IMAGEWEBURL.$row["hospital_image"];
    $row["certificate"]=$obj->IMAGEWEBURL.$row["certificate"];

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
  $return["hospitaldetails"]="";

}

}else{

  $return["STATUS"]="00";
  $return["hospitaldetails"]="some error or field is not set..";
}


echo json_encode($return);
