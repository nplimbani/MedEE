<?php
require"Config.php";
header('Content-Type: application/json');

$obj=new Config();
$data=array();
$i=0;
$data1=array();
$z=0;
if(isset($_POST["state"]) && isset($_POST["city"]) && isset($_POST["category"]) && isset($_POST["type"]) ){

if($_POST["type"]=='All'){

  if($_POST["category"]!='MultiSpecialist'){
    $result=$obj->myQuery("select hospital_id from hospital where `state`=  '".$_POST["state"]."' AND
                            `city`='".$_POST["city"]."' AND `category`='".$_POST["category"]."' AND `status`=1  ");

      $result1=$obj->myQuery("select hospital_id from hospital where `state`=  '".$_POST["state"]."' AND
                              `city`='".$_POST["city"]."' AND `category`='MultiSpecialist' AND `status`=1  ");


            $resultData=array();
            while($row=$result->fetch_assoc())
            {

                    $resultData[]=$row;
                    $data[$i]=$row["hospital_id"];
                    $i=$i+1;

              }
              while($row1=$result1->fetch_assoc())
              {
               $resultData[]=$row1;
               $data[$i]=$row1["hospital_id"];
               $i=$i+1;

              }
              $data= array_filter($data);



  }else{
      $result=$obj->myQuery("select hospital_id from hospital where `state`=  '".$_POST["state"]."' AND
          `city`='".$_POST["city"]."' AND `category`='".$_POST["category"]."' AND `status`=1  ");

          $resultData=array();

          while($row=$result->fetch_assoc())
          {
              $data[$i]=$row["hospital_id"];
              $i=$i+1;


           $resultData[]=$row;
          }
          $data= array_filter($data);









}
}
else if($_POST["category"]!='MultiSpecialist'){
      $result=$obj->myQuery("select hospital_id from hospital where `state`=  '".$_POST["state"]."' AND
                              `city`='".$_POST["city"]."' AND `category`='".$_POST["category"]."' AND `type`='".$_POST["type"]."' AND `status`=1  ");
      $result1=$obj->myQuery("select hospital_id from hospital where `state`=  '".$_POST["state"]."' AND
                              `city`='".$_POST["city"]."' AND `category`='MultiSpecialist' AND `type`='".$_POST["type"]."' AND `status`=1  ");


                  $resultData=array();

                  while($row=$result->fetch_assoc())
                    {

                        $data[$i]=$row["hospital_id"];
                        $i=$i+1;

                      $resultData[]=$row;
                    }
                      while($row1=$result1->fetch_assoc())
                      {

                            $data[$i]=$row1["hospital_id"];
                            $i=$i+1;

                       $resultData[]=$row1;
                      }
                      $data= array_filter($data);



  }else{
                      $result=$obj->myQuery("select hospital_id,name,profile,category,type from hospital where `state`=  '".$_POST["state"]."' AND
                          `city`='".$_POST["city"]."' AND `category`='".$_POST["category"]."' AND `type`='".$_POST["type"]."' AND `status`=1  ");

                          $resultData=array();

                          while($row=$result->fetch_assoc())
                          {

                              $data[$i]=$row["hospital_id"];
                              $i=$i+1;

                           $resultData[]=$row;
                          }
                          $data= array_filter($data);


    }



        if($resultData!=""){

            for($j=0;$j<count($data);$j++){
              $result2=$obj->myquery("select COUNT(*) as cnt from blood where `hospital_id`=".$data[$j])->fetch_assoc();
              if($result2["cnt"]>0){
                $data1[$z]=$data[$j];
                $z=$z+1;
              }


            }
            if($data1!=""){

              $resultData1=array();

              for($j=0;$j<count($data1);$j++){
                $result4=$obj->myQuery("select hospital_id,name,profile,category,type from hospital where `hospital_id`=".$data1[$j]);
                while($row2=$result4->fetch_assoc())
                {

                  $row2["profile"]=$obj->IMAGEWEBURL.$row2["profile"];
                 $resultData1[]=$row2;
               }
              }
              if($resultData1!=""){
                $return["STATUS"]="1";
                $return["hospitaldetails"]=$resultData1;



              }else{
                $return["STATUS"]="0";
                $return["hospitaldetails"]="null";
              }
            }else{
              $return["STATUS"]="0";
              $return["hospitaldetails"]="null";

            }



          //  $return["msg"]="Details found";
        //  print_r ($row);

          //  $return["filerdata"]=$resultData1;
            /*$return["data"]=$data1;
            $return["result"]=$result2["cnt"];*/
        }
        else{
          $return["STATUS"]="0";
          $return["hospitaldetails"]="null";
        //  $return["filerdata"]=$resultData1;

        }


}else{

            $return["STATUS"]="00";
            $return["hospitaldetails"]="field is not set";

}




echo json_encode($return);
