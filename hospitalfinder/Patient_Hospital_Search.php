<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
if(isset($_POST["state"]) && isset($_POST["city"]) && isset($_POST["category"]) && isset($_POST["type"]) ){

if($_POST["type"]=='All'){

  if($_POST["category"]!='MultiSpecialist'){
    $result=$obj->myQuery("select hospital_id,name,profile,category,type from hospital where `state`=  '".$_POST["state"]."' AND
                            `city`='".$_POST["city"]."' AND `category`='".$_POST["category"]."' AND `status`=1  ");

      $result1=$obj->myQuery("select hospital_id,name,profile,category,type from hospital where `state`=  '".$_POST["state"]."' AND
                              `city`='".$_POST["city"]."' AND `category`='MultiSpecialist' AND `status`=1  ");


            $resultData=array();
            while($row=$result->fetch_assoc())
            {
                  $row["profile"]=$obj->IMAGEWEBURL.$row["profile"];

                    $resultData[]=$row;
              }
              while($row1=$result1->fetch_assoc())
              {
                    $row1["profile"]=$obj->IMAGEWEBURL.$row1["profile"];

               $resultData[]=$row1;
              }
  }else{
      $result=$obj->myQuery("select hospital_id,name,profile,category,type from hospital where `state`=  '".$_POST["state"]."' AND
          `city`='".$_POST["city"]."' AND `category`='".$_POST["category"]."' AND `status`=1  ");

          $resultData=array();
          while($row=$result->fetch_assoc())
          {
              $row["profile"]=$obj->IMAGEWEBURL.$row["profile"];

           $resultData[]=$row;
          }
        }


}
else if($_POST["category"]!='MultiSpecialist'){
      $result=$obj->myQuery("select hospital_id,name,profile,category,type from hospital where `state`=  '".$_POST["state"]."' AND
                              `city`='".$_POST["city"]."' AND `category`='".$_POST["category"]."' AND `type`='".$_POST["type"]."' AND `status`=1  ");
      $result1=$obj->myQuery("select hospital_id,name,profile,category,type from hospital where `state`=  '".$_POST["state"]."' AND
                              `city`='".$_POST["city"]."' AND `category`='MultiSpecialist' AND `type`='".$_POST["type"]."' AND `status`=1  ");


                  $resultData=array();
                  while($row=$result->fetch_assoc())
                    {
                        $row["profile"]=$obj->IMAGEWEBURL.$row["profile"];

                      $resultData[]=$row;
                    }
                      while($row1=$result1->fetch_assoc())
                      {
                            $row1["profile"]=$obj->IMAGEWEBURL.$row1["profile"];

                       $resultData[]=$row1;
                      }

                  }else{
                      $result=$obj->myQuery("select hospital_id,name,profile,category,type from hospital where `state`=  '".$_POST["state"]."' AND
                          `city`='".$_POST["city"]."' AND `category`='".$_POST["category"]."' AND `type`='".$_POST["type"]."' AND `status`=1  ");

                          $resultData=array();
                          while($row=$result->fetch_assoc())
                          {
                              $row["profile"]=$obj->IMAGEWEBURL.$row["profile"];

                           $resultData[]=$row;
                          }
                        }



        if($resultData!=""){

          //  $return["msg"]="Details found";
        //  print_r ($row);
            $return["STATUS"]="1";
            $return["hospitaldetails"]=$resultData;
        }
        else{
          $return["STATUS"]="0";
          $return["hospitaldetails"]="null";

        }


}else{

            $return["STATUS"]="00";
            $return["hospitaldetails"]="field is not set";

}




echo json_encode($return);
