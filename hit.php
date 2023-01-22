<?php 

include("function.php");

$id = $_GET['id'];

$objCrudAdmin = new CrudApp();



    $responseMessage=$objCrudAdmin->display_data_id($id);



echo json_encode($responseMessage);






?>
