<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if(isset($_POST["hospital_id"]) && $_FILES['hospital_image']['name']!=""){


          $type = ".".pathinfo($_FILES['hospital_image']['name'], PATHINFO_EXTENSION);
           if($type == ".jpeg" || $type == ".png" || $type == ".jpg"|| $type == ".bmp" || $type ==".JPG" || $type==".JPEG" ||  $type ==".PDF" || $type==".pdf"){

             $size=$_FILES['hospital_image']['size']/1024/1024;
             if($size<100)
              {
                $error=$_FILES['hospital_image']['error'];
                if($error==0)
                {

               $fileName=date("d-m-Y-h-i-s").$type;
              $serverPath=$obj->IMAGEUPLOADURL.$fileName;
              move_uploaded_file($_FILES['hospital_image']['tmp_name'],$serverPath);

                /*$query="INSERT INTO tbl_student SET `path` = '$serverPath'" ;
                $res = $obj->myQuery($query);
                $r=$obj->IMAGEWEBURL.$fileName;*/


                  $filedname["hospital_image"]=$fileName;
                  $where["hospital_id"]=$_POST["hospital_id"];
                  $resultUpdate=$obj->update("hospital",$filedname,$where,"or");


              $return["STATUS"]="1";
              $return["MSG"]="File Uplod Success";


                }
                 else{
                  $rdata["STATUS"]="0";
                  $rdata["MSG"]="Selected File Have Some Error.";

                }
              }
              else
              {
                $rdata["STATUS"]="00";
                $rdata["MSG"]="Max 5MB Is Allow.";

              }



           }else{
             $return["STATUS"]="000";
             $return["MSG"]="This File Type Is Not Allow";

           }

}else{


  $return["STATUS"]="0000";
  $return["MSG"]="Field Is Not Set...";

}
echo json_encode($return);
