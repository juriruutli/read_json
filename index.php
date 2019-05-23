<?php 
require_once("mysql.php");

//add
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING); 
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);

//print_r($_REQUEST);

if (isset($action) && $action === 'insert') { 

  $errors = []; 

    if (empty($title)) {
        $errors = ['Fill sports name'];
    }

    if (empty($url)) {
        $errors = ['Insert Url'];
    }

    if (empty($description)) {
        $errors = ['Insert description'];
    }

  $date =  date('Y-m-d H:i:s');

  $insert = "INSERT INTO TA17_Ruutli.sports (title, image_url, description, added, edited, status) 
  VALUES ('" . $title . "', '" . $url . "', '" . $description . "', '" . $date . "', '" . $date . "', 1)"; 
  
   

  //var_dump(mysqli_query($link, $insert));
 
  if (mysqli_query($link, $insert) === TRUE) { 
    ?><div class="alert alert-success">Row inserted</div><?php 
  } else { 
    ?><div class="alert alert-danger">Row not inserted <?php echo $errors; echo $insert; ?> </div><?php 
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Sports</title>
  </head>
  <body>
    <h1>Sports</h1>

    <div class="container" >
        <form method="POST">
      <div class="form-group">
        <label for="title">Sports Name</label>
        <input type="text" class="form-control" id="title"  placeholder="Enter Sports name" name="title">
      </div>
      <div class="form-group">
        <label for="pictureUrl">Picture URL</label>
        <input type="text" class="form-control" id="pictureUrl" placeholder="PictureUrl" name="url">
      </div>
      <div class="form-group">
        <label for="pictureUrl">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Description" name="description">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status">
        <label class="form-check-label" for="exampleCheck1">Status</label>
      </div>
      <button type="submit" class="btn btn-primary" name="action" value="insert">Submit</button>
    </form>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>