<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["hospital_id"]) &&  isset($_POST["name"])  ){

$result=$obj->myQuery("select name from medicine where hospital_id='".$_POST["hospital_id"]."' AND name='".$_POST["name"]."'")->fetch_assoc();


  $MSG=$result["name"];
  if($MSG!=null){
        $return["STATUS"]="1";
        $return["MSG"]="found";

    }else{
      $return["STATUS"]="0";
      $return["MSG"]="Not found...";
    }


}else{

  $return["STATUS"]="00";
  $return["MSG"]="field not set";

}
echo json_encode($return);
