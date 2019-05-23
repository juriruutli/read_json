<?php

$cacheFile = 'cache/last-data.json';
$refreshCache = false;
$link = mysqli_connect("localhost", "TA17_Ruutli", "qwerty123", "TA17_Ruutli"); 
$query = "SELECT * FROM sports";

if (file_exists($cacheFile)) { 

    $lastModified = filemtime ($cacheFile); 
    $nextModified = $lastModified + 6*2; // added 2min 

    if ($nextModified < time()) { 
        $refreshCache = true; 
    } 

    //print_r(date("Y-m-d H:i:s", filemtime ($cacheFile))); 
    //print_r($nextModified); 
} else { 
    $refreshCache = true; 
} 

if ($refreshCache) { 
    //all data from server 
    $result= mysqli_query($link, $query);
    
    //var_dump ($result);
    
    $arr_json = $result->fetch_all(MYSQLI_ASSOC);
    //print_r($arr_json);
       
    $jsonData = json_encode($arr_json); 

    file_put_contents($cacheFile, $jsonData); 
} 

if (file_exists($cacheFile)) { 
    exit(file_get_contents($cacheFile)); 
}  

exit([]);