<?php
  if(!empty($_GET['id'])){
      //DB details
     $dbHost     = 'localhost';
     $dbUsername = 'root';
     $dbPassword = '*****';
     $dbName     = 'codexworld';

     //Create connection and select DB
     $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

     //Check connection
     if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
     }

     //Get image data from database
     $result = $db->query("SELECT image FROM find WHERE id = {$_GET['id']}");

     if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();

        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }else{
        echo 'Image not found...';
    }
   }
  ?>