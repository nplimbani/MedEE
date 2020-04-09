<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();


if( isset($_POST["login_id"]) && isset($_POST["email_id"]) &&  isset($_POST["first_name"]) && isset($_POST["middle_name"])
 && isset($_POST["last_name"]) &&  isset($_POST["date_of_birth"])&& isset($_POST["mobile_number"])   ){


  $insData["login_id"]=$_POST["login_id"];
  $insData["email_id"]=$_POST["email_id"];
  $insData["first_name"]=$_POST["first_name"];
  $insData["middle_name"]=$_POST["middle_name"];
  $insData["last_name"]=$_POST["last_name"];
  $insData["date_of_birth"]=$_POST["date_of_birth"];
  $insData["mobile_number"]=$_POST["mobile_number"];

  $check=$obj->myQuery("select email_id from patient where `email_id`='".$_POST["email_id"]."'")->fetch_assoc();
  if($_POST["email_id"]!=$check["email_id"]){
    $result= $obj->insert("patient",$insData);



    if($result)
    {
       $return["STATUS"]="1";
       $return["MSG"]="Insert Successful...";

  }
    else{

      $return["STATUS"]="0";
      $return["MSG"]="Somthing wrong... ";
    }

  }else{
    $return["STATUS"]="00";
    $return["MSG"]="email is already exists...";

  }
}
else{

  $return["STATUS"]="000";
  $return["MSG"]="Field id not set...";
}
echo json_encode($return);
