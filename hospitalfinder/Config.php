<?php
class Config{
    public $con;
    public $CURRENTDATE;
    public $REMOTEIP;


    public $IMAGEWEBURL;
    public $IMAGEUPLOADURL;
    public $MYAPIKEY;
    public function __construct(){
        $HOSTNAME="localhost";
        $USERNAME="root";
        $PASSWORD="";
        $DBNAME="hospitalfinder";

        date_default_timezone_set("Asia/kolkata");
        $this->con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DBNAME);
        if(!$this->con)
        {
          echo "Not Connected...";
        }
//change this loacal host to regarding ip adress;

        $this->IMAGEWEBURL="http://192.168.43.5/hospitalfinder/uploads/";
        $this->IMAGEUPLOADURL=$_SERVER['DOCUMENT_ROOT']."/hospitalfinder/uploads/";

        $this->MYAPIKEY=100;

       $this->CURRENTDATE=date("Y-m-d h:i:s");
        $this->REMOTEIP=$_SERVER["REMOTE_ADDR"];


    }
    //======================INSERT=============================*/

    public function insert($tblname,$data){

      $fieldval="";
      foreach ($data as $field => $value) {
        $fieldval=$fieldval."`".$field."`='".$value."',";
      }
      $fieldval=trim($fieldval,",");

       $query="INSERT INTO `$tblname` SET $fieldval";

      // echo $query;
      return $this->con->query($query);

  }

  //==========================DELETE==============================*/
    public function delete($tblname,$wh=NULL,$op="AND"){

      $where="";
      if($wh!=NULL)

      {
        $where=" where ";
      }
      foreach ($wh as $field => $value) {
        $where=$where."`".$field."`='".$value."' ".$op;
      }
      $where=trim($where,$op);
       $query="DELETE FROM `$tblname` $where";
       return $this->con->query($query);


    }


  //=============================UPDATE===========================*/
    public function update($tblname,$filedname,$wh=NULL,$op="AND")
    {

      $fieldval="";
      foreach ($filedname as $field => $value) {

        $fieldval=$fieldval."`".$field."`= '".$value."',";
      }
        $fieldval=trim($fieldval,",");

      $where="";
      if($wh!=NULL)
      {

        $where=" where ";
      }
      foreach ($wh as $key => $value) {
        $where=$where."`".$key."`= '".$value."' ".$op;

      }
        $where=trim($where,$op);

       $query="UPDATE $tblname SET $fieldval $where";

      return $this->con->query($query);
    }
    public function myQuery($query){
    	return $this->con->query($query);
    }

    //==============================SELECT===============================
  /*public function select($tblname,$row=" * ",$wh=NULL,$op="AND"){

      $where="";
echo "NPL";
      if($wh!=NULL){
        echo "NPL";

        $where="WHERE";

        foreach ($wh as $field => $value) {
          $where=$where."`".$field."`='".$value."' ".$op;
        }

        $where=trim($where,"$op ");
      }

      echo $query="SELECT $row FROM $tblname $where";

      return $this->con->query($query);
    }*/
}
