<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if( isset($_POST["login_id"]) && isset($_POST["email_id"])&& isset($_POST["name"]) && isset($_POST["owner_name"])
&& isset($_POST["mobile_number"]) &&  isset($_POST["category"])&& isset($_POST["type"])
&& isset($_POST["time"]) &&  isset($_POST["building_no"])&& isset($_POST["colony"])
&& isset($_POST["land_mark"])  && isset($_POST["area"])  && isset($_POST["pincode"]) &&  isset($_POST["city"]) && isset($_POST["state"])
&& isset($_POST["latitude"]) &&  isset($_POST["longitude"])&& isset($_POST["medical_facilities"])&& isset($_POST["about"])
&& $_FILES['hospital_image']['name']!="" && $_FILES['certificate']['name']!="" && $_FILES['profile']['name']!="" ){



  $type = ".".pathinfo($_FILES['hospital_image']['name'], PATHINFO_EXTENSION);
  $type1 = ".".pathinfo($_FILES['certificate']['name'], PATHINFO_EXTENSION);
  $type2 = ".".pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);


   if($type == ".jpeg" || $type == ".png" || $type == ".jpg"|| $type == ".bmp" || $type ==".JPG" || $type==".JPEG"
 || $type1 == ".PDF" || $type1== ".pdf" ||$type2 == ".jpeg" || $type2 == ".png" || $type2 == ".jpg"|| $type2 == ".bmp" || $type2 ==".JPG" || $type2 ==".JPEG" ){


     $size=$_FILES['hospital_image']['size']/1024/1024;
     $size1=$_FILES['certificate']['size']/1024/1024;
     $size2=$_FILES['profile']['size']/1024/1024;


     if($size<100 && $size1<100 && $size2<100)
      {
        $error=$_FILES['hospital_image']['error'];
        $error1=$_FILES['certificate']['error'];
        $error2=$_FILES['profile']['error'];


        if($error==0 || $error1==0 || $error==0)
        {

       $fileName=date("d-m-Y-h-i-s").$type;
      $serverPath=$obj->IMAGEUPLOADURL.$fileName;
      move_uploaded_file($_FILES['hospital_image']['tmp_name'],$serverPath);

      $fileName1=date("d-m-Y-h-i-s")."file".$type1;
      $serverPath1=$obj->IMAGEUPLOADURL.$fileName1;
      move_uploaded_file($_FILES['certificate']['tmp_name'],$serverPath1);

      $fileName2=date("d-m-Y-h-i-s")."profile".$type2;
      $serverPath2=$obj->IMAGEUPLOADURL.$fileName2;
      move_uploaded_file($_FILES['profile']['tmp_name'],$serverPath2);



  $insData["login_id"]=$_POST["login_id"];
  $insData["email_id"]=$_POST["email_id"];
  $insData["name"]=$_POST["name"];
  $insData["owner_name"]=$_POST["owner_name"];
  $insData["mobile_number"]=$_POST["mobile_number"];
  $insData["category"]=$_POST["category"];
  $insData["type"]=$_POST["type"];
  $insData["time"]=$_POST["time"];
  $insData["building_no"]=$_POST["building_no"];
  $insData["colony"]=$_POST["colony"];
  $insData["land_mark"]=$_POST["land_mark"];
  $insData["area"]=$_POST["area"];
  $insData["pincode"]=$_POST["pincode"];
  $insData["city"]=$_POST["city"];
  $insData["state"]=$_POST["state"];
  $insData["latitude"]=$_POST["latitude"];
  $insData["longitude"]=$_POST["longitude"];
  $insData["medical_facilities"]=$_POST["medical_facilities"];
  $insData["about"]=$_POST["about"];
  $insData["hospital_image"]=$fileName;
  $insData["certificate"]=$fileName1;
  $insData["profile"]=$fileName2;


  $result= $obj->insert("hospital",$insData);

  if($result){

    $hospitalid=$obj->myQuery("select  hospital_id from hospital where `login_id`='".$_POST["login_id"]."'")->fetch_assoc();
    foreach($hospitalid as $field =>$value){
      $hospital_id=$value;
    }
  }


       	$return["STATUS"]="1";
       	$return["MSG"]="File Uplod Success and data insert sucess";
        $return["hospital_id"]=$hospital_id;

  }
  else{
   $return["STATUS"]="0";
   $return["MSG"]="Selected File Have Some Error.";
   $return["hospital_id"]="0";

  }
}
    else
    {
      $return["STATUS"]="00";
      $return["MSG"]="Max 100MB Is Allow.";
      $return["hospital_id"]="00";

    }
  }else{
      $return["STATUS"]="000";
      $return["MSG"]="This File Type Is Not Allow";
      $return["hospital_id"]="000";

    }
  }else{
    $return["STATUS"]="0000";
    $return["MSG"]="Field Is Not Set...";
    $return["hospital_id"]="0000";

  }

echo json_encode($return);
