<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["login_id"])){
$result=$obj->myQuery("select * from hospital where `login_id`= '".$_POST["login_id"]."'  ");


                $resultData=array();
                while($row=$result->fetch_assoc())
                {
                    $row["profile"]=$obj->IMAGEWEBURL.$row["profile"];
                    $row["hospital_image"]=$obj->IMAGEWEBURL.$row["hospital_image"];
                    $row["certificate"]=$obj->IMAGEWEBURL.$row["certificate"];

                 $resultData[]=$row;
                }
                if(count($resultData)!=0){

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
