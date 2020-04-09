<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["login_id"])){
$result=$obj->myQuery("select * from docter where `login_id`= '".$_POST["login_id"]."'  ");


                $resultData=array();
                while($row=$result->fetch_assoc())
                {
                  $row["docter_image"]=$obj->IMAGEWEBURL.$row["docter_image"];


                 $resultData[]=$row;
                }
                if(count($resultData)!=0){

                  //  $return["msg"]="Details found";
                //  print_r ($row);
                    $return["STATUS"]="1";
                    $return["docterdetails"]=$resultData;
                }
                else{
                  $return["STATUS"]="0";
                  $return["docterdetails"]="";

                }


}else{

  $return["STATUS"]="00";
  $return["docterdetails"]="some error or field is not set..";
}


echo json_encode($return);
