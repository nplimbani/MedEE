<?php
require "Config.php";
header('Content-Type: application/json');

$obj=new Config();

if( isset($_POST["email_id"]) && isset($_POST["password"])){


  $filedname["password"]=md5($_POST["password"]);
  $where["email_id"]=$_POST["email_id"];
  $resultUpdate=$obj->update("login",$filedname,$where,"or");

  if($resultUpdate!==""){

    $return["STATUS"]="1";
    $return["msg"]="password updated";

    }
    else{
          $return["STATUS"]="0";
          $return["msg"]="password not updated";
    }
}else{

  $return["STATUS"]="00";
  $return["msg"]="field is not set";

}
echo json_encode($return);
