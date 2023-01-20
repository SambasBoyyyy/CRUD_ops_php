<?php

include("function.php");

$objCrudAdmin = new CrudApp();


$students = $objCrudAdmin->display_data();

if(isset($_GET['status'])){

    if($_GET['status'] = 'edit'){
        
     $id = $_GET['id'];
     
    $returnDAta =  $objCrudAdmin->display_data_id($id);



    }

}

if(isset($_POST['update_info'])){
   
 $responseMessage=$objCrudAdmin->update_data($_POST);

  
  }


?>












<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>CRUD APP</title>
  </head>
  <body>
    <?php
     
     if(isset($responseMessage)){

    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Well done!</strong>'.$responseMessage.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';

     }

    ?>
  <!-- <div class="p-3 mb-2 bg-dark text-white"> -->
  <div class="container my-4 p-4 shadow bg-dark text-white">
     
  <h2><a href="index.php">Student Database</a></h2>

   <!-- FORM for student -->
  <form action="" method="post"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="uname_std" id ="exampleInputEmail1" value="<?php echo $returnDAta['Name']?>" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Roll</label>
    <input type="text" class="form-control" name="uroll_std" value="<?php echo $returnDAta['Roll']?>" id="exampleInputPassword1">
  </div>
  <div class="container p-2 shadow bg-dark text-white">
    <h4>Uploaded Photo</h4>
  <img style="height: 100px;" src="upload/<?php echo $returnDAta['Img'];?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1"> <strong> Reupload passport size photo</strong></label>
    <input type="file" class="form-control-file" name="ufile_img" id="exampleFormControlFile1">
  </div>
  <div>
  <input type="hidden" name="ustd_id" value="<?php echo $returnDAta['Serial'];?>">
  </div>

  <button type="submit" class="btn btn-warning" name="update_info" >Update Info</button>
</form>

<div class="container my-2 p-2">
<a class="btn btn-success p-1 my-2 " href="index.php">HOME</a>
</div>
  
  </div>

<!--  href="index.php" -->


   


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>