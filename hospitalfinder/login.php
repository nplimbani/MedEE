<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["email_id"]) && isset($_POST["password"]) && isset($_POST["category"]) ){

$result=$obj->myQuery("select login_id,email_id,password,category from login where email_id='".$_POST["email_id"]."' AND category='".$_POST["category"]."'")->fetch_assoc();
//  print_r ($result);
//  echo $result["password"];
if($result!=""){
  if(md5($_POST["password"])==$result["password"])
  {
    unset($result["password"]);
    $return["STATUS"]="1";
    $return["MSG"]="Login Sucess";
    $return["UserDetails"]=$result;
  }
  else {
    $return["STATUS"]="0";
    $return["MSG"]="password incorrect";
    $return["UserDetails"]=null;


  }
}
else {
  $return["STATUS"]="00";
  $return["MSG"]="email not found";
  $return["UserDetails"]=null;

  //$return["UserDetails"]="please enter correct email";



}

}
else{
  $return["STATUS"]="000";
  $return["MSG"]="field not set";
  $return["UserDetails"]=null;

//  $return["UserDetails"]="There was some error";


}

echo json_encode($return);
