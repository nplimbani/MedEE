<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if( isset($_POST["hospital_id"])&& isset($_POST["name"]) && isset($_POST["owner_name"])
&& isset($_POST["mobile_number"]) &&  isset($_POST["category"])&& isset($_POST["type"])
&& isset($_POST["time"]) &&  isset($_POST["building_no"])&& isset($_POST["colony"])
&& isset($_POST["land_mark"])  && isset($_POST["area"])  && isset($_POST["pincode"]) &&  isset($_POST["city"])
&& isset($_POST["state"])){


        $filedname["name"]=$_POST["name"];
        $filedname["owner_name"]=$_POST["owner_name"];
        $filedname["mobile_number"]=$_POST["mobile_number"];
        $filedname["category"]=$_POST["category"];
        $filedname["type"]=$_POST["type"];
        $filedname["time"]=$_POST["time"];
        $filedname["building_no"]=$_POST["building_no"];
        $filedname["colony"]=$_POST["colony"];
        $filedname["land_mark"]=$_POST["land_mark"];
        $filedname["area"]=$_POST["area"];
        $filedname["pincode"]=$_POST["pincode"];
        $filedname["city"]=$_POST["city"];
        $filedname["state"]=$_POST["state"];
        $where["hospital_id"]=$_POST["hospital_id"];
        $resultUpdate=$obj->update("hospital",$filedname,$where,"or");

        if($resultUpdate){
          $return["STATUS"]="1";
          $return["MSG"]="Update sucessfully..";

        }else{

          $return["STATUS"]="0";
          $return["MSG"]="Not updated";
        }


}
else{
  $return["STATUS"]="00";
  $return["MSG"]="Field Is Not Set...";

}

echo json_encode($return);
