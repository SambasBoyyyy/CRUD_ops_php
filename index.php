<?php

include("function.php");

$objCrudAdmin = new CrudApp();

if(isset($_POST['submit_info'])){
   
$responseMessage=$objCrudAdmin->add_data($_POST);

}

$students = $objCrudAdmin->display_data();

if(isset($_GET['status'])){

  if($_GET['status'] = 'delete'){
      
   $delete_id = $_GET['id'];
   
  $returnMsgg =  $objCrudAdmin->delete_data($delete_id);

  }

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

     if(isset($returnMsgg)){

      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Well done!</strong>'.$returnMsgg.'
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
    <input type="text" class="form-control" name="name_std" id ="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Roll</label>
    <input type="text" class="form-control" name="roll_std" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1"> <strong> Upload passport size photo</strong></label>
    <input type="file" class="form-control-file" name="file_img" id="exampleFormControlFile1">
  </div>
  
  <button type="submit" class="btn btn-warning" name="submit_info" >Add Info</button>
</form>
  
  </div>



  </div>
    <div class="container my-4 p-4 shadow bg-dark ">
        <table class="table table-striped table-dark ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php while($student  = mysqli_fetch_assoc($students)){ ?>
              <!-- getting a associative array -->
                <tr>
                    <td><?php echo $student['Serial'];?></td>
                    <td><?php echo $student['Name'];?></td>
                    <td><?php echo $student['Roll'];?></td>
                    <td><img style="height: 100px;" src="upload/<?php echo $student['Img'];?>"></td>
                    
                    <td>
                        <a class="btn btn-success p-1 " href="edit.php?status=edit&&id=<?php echo $student['Serial'];?>">Edit</a>
                        <a class="btn btn-warning p-1 " href="?status=delete&&id=<?php echo $student['Serial'];?>">Delete</a>
                    </td>
                </tr>

              <?php } ?>

            </tbody>
        </table>
    </div>
























    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>