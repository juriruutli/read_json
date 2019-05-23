<?php 

//http://php.net/manual/en/mysqli.query.php 
//Procedural style 
$link = mysqli_connect("localhost", "TA17_Ruutli", "qwerty123", "TA17_Ruutli"); 

/* check connection */ 
if (mysqli_connect_errno()) { 
    printf("Connect failed: %s\n", mysqli_connect_error()); 
    exit(); 
} else { 
    echo 'Connection successfully'; 
}