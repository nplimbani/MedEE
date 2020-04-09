<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if( isset($_POST["hospital_id"]) && isset($_POST["blood_group"]) && isset($_POST["stock"]) ){

  $insData["hospital_id"]=$_POST["hospital_id"];
  $insData["blood_group"]=$_POST["blood_group"];
  $insData["stock"]=$_POST["stock"];

  $result= $obj->insert("blood",$insData);
      if($result)
      {
            $return["STATUS"]="1";
            $return["MSG"]="Insert Successful...";

       }
     else{

       $return["STATUS"]="0";
       $return["MSG"]="Not Inserted..";
     }


}else{


    $return["STATUS"]="00";
    $return["MSG"]="Field id not set...";

}
echo json_encode($return);
