<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if(isset($_POST["hospital_id"])){
//$result=$obj->myQuery("select * from order_blood where `status`= 1 and `patient_id`= '".$_POST["patient_id"]."' ");
$where["hospital_id"]=$_POST["hospital_id"];
$result1=$obj->delete("docter",$where,"or");
    if($result1){
      $result=$obj->delete("hospital",$where,"or");
      if($result){
        $return["STATUS"]="1";
        $return["MSG"]="Your login is cancled ";


      }else{
        $return["STATUS"]="1";
        $return["MSG"]="Your login is not cancled ";

      }


}else{
  $return["STATUS"]="1";
  $return["MSG"]="Your login is not  cancled ";

}




}
else{
  $return["STATUS"]="00";
  $return["MSG"]="field is not set.. ";

}



echo json_encode($return);
