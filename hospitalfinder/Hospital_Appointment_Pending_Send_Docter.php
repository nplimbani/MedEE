<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();

if(isset($_POST["appointment_id"])  ){



      $filedname1["d_status"]="1";
      $where["appointment_id"]=$_POST["appointment_id"];
      $result3=$obj->update("appointment",$filedname1,$where,"or");
      if($result3){

        $filedname2["read_status"]="2";
        $where["appointment_id"]=$_POST["appointment_id"];
        $result4=$obj->update("notification_appointment",$filedname2,$where,"or");

        if($result4){
        $return["STATUS"]="1";
        $return["MSG"]="update sucessfully...";
        }
        else{
          $return["STATUS"]="00";
          $return["MSG"]=" Not confirmed sucessfully...";
      }
    }
      else{
        $return["STATUS"]="0";
        $return["MSG"]=" Not confirmed sucessfully...";
      }

}else{

  $return["STATUS"]="000";
  $return["MSG"]="Field id not set...";
}
echo json_encode($return);
