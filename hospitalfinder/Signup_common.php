<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

$flag=0;
if(isset($_POST["email_id"]) && isset($_POST["password"])  && isset($_POST["category"]) ){


      $insData["email_id"]=$_POST["email_id"];
      $insData["password"]=md5($_POST["password"]);
      $insData["signup_date"]=date("Y-m-d");
      $insData["category"]=$_POST["category"];

      $check=$obj->myQuery("select email_id from login where `email_id`='".$_POST["email_id"]."'")->fetch_assoc();
    //  $resultData1=array();


          if($_POST["email_id"]!=$check["email_id"]){
              $result= $obj->insert("login",$insData);
              //return login id after insert row for forward signup procress.
              $login=$obj->myQuery("select login_id,email_id from login where `email_id`='".$_POST["email_id"]."'");
              $resultData=array();
              while($row=$login->fetch_assoc())
              {
                  $login_id=$row["login_id"];
                  $email_id=$row["email_id"];

               $resultData[]=$row;
              }

              if($resultData!="")
              {
                 $return["STATUS"]="1";
                 $return["MSG"]="Insert Successful...";
                 $return["login_id"]=$login_id;
                 $return["email_id"]=$email_id;


            }
          }else{
                  $return["STATUS"]="0";
                  $return["MSG"]=" email already exists";
                  $return["login_id"]=0;
                  $return["email_id"]=null;
          }

}else{

  $return["STATUS"]="00";
  $return["MSG"]="Field id not set...";
  $return["login_id"]=00;
  $return["email_id"]=null;

}
echo json_encode($return);
