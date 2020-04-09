<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if( isset($_POST["hospital_id"]) && isset($_POST["blood_group"])  ){

$result=$obj->myQuery("select blood_group from blood where  hospital_id='".$_POST["hospital_id"]."' AND blood_group='".$_POST["blood_group"]."'")->fetch_assoc();
    /*if(count($result)!=0){

      while($row=$result->fetch_assoc()){
        $MSG=$row["blood_group"];

      }*/
      $MSG=$result["blood_group"];
      if($MSG!=null){
        $return["STATUS"]="1";
        $return["MSG"]=$MSG;
      }else{
        $return["STATUS"]="0";
        $return["MSG"]="Not found...";
      }



    /*}else{

    }*/


}else{

  $return["STATUS"]="00";
  $return["MSG"]="field not set";

}
echo json_encode($return);
