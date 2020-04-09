<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();


if( isset($_POST["login_id"]) && isset($_POST["email_id"] ) &&   isset($_POST["hospital_id"]) && isset($_POST["first_name"]) && isset($_POST["middle_name"])
 && isset($_POST["last_name"]) &&  isset($_POST["qualification"])&& isset($_POST["mobile_number"]) && isset($_POST["category"])
 && $_FILES['docter_image']['name']!=""  ){



   $type = ".".pathinfo($_FILES['docter_image']['name'], PATHINFO_EXTENSION);
  if($type == ".jpeg" || $type == ".png" || $type == ".jpg"|| $type == ".bmp" || $type ==".JPG" || $type==".JPEG"){


    $size=$_FILES['docter_image']['size']/1024/1024;


    if($size<100)
     {
       $error=$_FILES['docter_image']['error'];

       if($error==0)
       {

         $fileName=date("d-m-Y-h-i-s").$type;
        $serverPath=$obj->IMAGEUPLOADURL.$fileName;
        move_uploaded_file($_FILES['docter_image']['tmp_name'],$serverPath);

        $insData["login_id"]=$_POST["login_id"];
        $insData["email_id"]=$_POST["email_id"];

        $insData["hospital_id"]=$_POST["hospital_id"];
        $insData["first_name"]=$_POST["first_name"];
        $insData["middle_name"]=$_POST["middle_name"];
        $insData["last_name"]=$_POST["last_name"];
        $insData["qualification"]=$_POST["qualification"];
        $insData["mobile_number"]=$_POST["mobile_number"];
        $insData["category"]=$_POST["category"];
        $insData["docter_image"]=$fileName;

        $result= $obj->insert("docter",$insData);

        if($result)
        {
          $login=$obj->myQuery("select docter_id  from docter where `email_id`='".$_POST["email_id"]."'");
          $resultData=array();
          while($row=$login->fetch_assoc())
          {
              $docter_id=$row["docter_id"];

           $resultData[]=$row;
          }
              $return["STATUS"]="1";
              $return["MSG"]="Insert Successful...";
              $return["docter_id"]=$docter_id ;

         }
       }else{

         $return["STATUS"]="0";
         $return["MSG"]="Selected File Have Some Error.";
         $return["docter_id"]="";

       }

      }else{


       $return["STATUS"]="00";
       $return["MSG"]="Max 100MB Is Allow.";
       $return["docter_id"]="";

      }


    }else{
      $return["STATUS"]="000";
      $return["MSG"]="This File Type Is Not Allow";
      $return["docter_id"]="";


    }
}
else{

  $return["STATUS"]="0000";
  $return["MSG"]="Field id not set...";
  $return["docter_id"]="";

}
echo json_encode($return);
