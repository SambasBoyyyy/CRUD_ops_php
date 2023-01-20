<?php

class CrudApp{

private $conn;

public function __construct()
{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'crud_app';

$this->conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$this->conn) {
    die("Connection failed");
  }
    
}

public function add_data($data){
 
$name = $data['name_std'];
$roll = $data['roll_std'];
$img = $_FILES['file_img']['name'];
$tem_p = $_FILES['file_img']['tmp_name'];

$sql = "INSERT INTO student_info( Name,Roll ,Img)
VALUES ('$name', $roll, '$img')";

if (mysqli_query($this->conn, $sql)) {
  move_uploaded_file($tem_p, 'upload/'.$img);
  return "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
}
  
}

public function display_data(){

  $sql = "SELECT * FROM student_info";

  if (mysqli_query($this->conn, $sql)) {
   
    $returnData = mysqli_query($this->conn, $sql);
    
  
     
    return $returnData;

  }


}

public function  display_data_id($id){

  $sql = "SELECT * FROM student_info WHERE `Serial`= $id ";

  if (mysqli_query($this->conn, $sql)) {
   
    $returnData = mysqli_query($this->conn, $sql);
      $studentData = mysqli_fetch_assoc($returnData);
    return $studentData;

  }


}

public function update_data($data){
 
  $serial = $data['ustd_id'];
  $name = $data['uname_std'];
  $roll = $data['uroll_std'];
  $img = $_FILES['ufile_img']['name'];
  $tem_g = $_FILES['ufile_img']['tmp_name'];

  // echo $data['ustd_id'];
  // echo $name;
  // echo $roll;
  // echo $img;

  
  $sql_quesy = "UPDATE `student_info` SET `Name`='$name',`Roll`=$roll ,`Img`='$img' WHERE `Serial`= $serial ";
  
  if (mysqli_query($this->conn, $sql_quesy)) {
    move_uploaded_file($tem_g, 'upload/'.$img);
    return "New record updated successfully";
  } else {
    echo "Error: " . $sql_quesy . "<br>" . mysqli_error($this->conn);
  }
    
  }


  public function delete_data($id){
 
    $catch_img = "SELECT * FROM student_info WHERE `Serial`=$id";
            $delete_std_info = mysqli_query($this->conn, $catch_img);
            $std_infoDle = mysqli_fetch_assoc($delete_std_info);
            $deleteImg_data = $std_infoDle['Img'];
            $query = "DELETE FROM student_info WHERE `Serial`=$id";
            if(mysqli_query($this->conn, $query)){
              
              
                unlink('upload/'.$deleteImg_data);
                return "Deleted Successfully";
            }



  }



}





?>