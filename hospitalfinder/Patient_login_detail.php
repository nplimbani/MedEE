<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["login_id"])){
$result=$obj->myQuery("select * from patient where `login_id`= '".$_POST["login_id"]."'  ");


                $resultData=array();
                while($row=$result->fetch_assoc())
                {


                 $resultData[]=$row;
                }
                if(count($resultData)!=0){

                  //  $return["msg"]="Details found";
                //  print_r ($row);
                    $return["STATUS"]="1";
                    $return["patientdetails"]=$resultData;
                }
                else{
                  $return["STATUS"]="0";
                  $return["patientdetails"]="";

                }


}else{

  $return["STATUS"]="00";
  $return["patientdetails"]="some error or field is not set..";
}


echo json_encode($return);
