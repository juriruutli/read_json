<?php 

$data = file_get_contents('http://ubuntu.ametikool.ee/~TA17_Ruutli/hajusrakendused/api/');

$aData = json_decode($data); 

//var_dump($aData);


// if (!empty($aData)) { 
//   foreach ($aData as $key => $row) { 
//         //  echo '<p><img src="' . $row->image_url . '"></p>'; 
//         //  echo "<p>{$row->title}</p>"; 
//      } 
//  } 


//echo"<pre>"; print_r(json_decode($data));

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
    
    <?php if (!empty($aData)) : foreach ($aData as $key=>$row) : ?>
    <div class="conteiner">
      <div class="media">
        <div class="row"> 
          <div>
            <?php echo '<p><img src="' . $row->image_url . '" height="200px" ></p>'; ?>
          </div>
          <div class="media-body">         
            <div>
              <li><?php echo $row->ID ?></li>
              <li><?php echo $row->title ?></li>
              <li><?php echo $row->description ?></li> 
              <li><?php echo date("d.m.Y H:i:s", strtotime($row->added)); ?></li> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; endif; ?> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

