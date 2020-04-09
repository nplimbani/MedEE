<?php
require"Config.php";
header('Content-Type: application/json');



$obj=new Config();
if(isset($_POST["email_id"])){

  $result=$obj->myQuery("select email_id,password from login where `email_id`= '".$_POST["email_id"]."'  ")->fetch_assoc();


  if($result!=""){

  /*$filedname["password"]=md5($rand);
  $where["email_id"]=$_POST["email_id"];
  $resultUpdate=$obj->update("login",$filedname,$where,"or");*/
  $return["STATUS"]="1";
  $return["email_id"]=$result["email_id"];

  }else{
  $return["STATUS"]="0";
  $return["email_id"]="0";

  }
}
echo json_encode($return);
