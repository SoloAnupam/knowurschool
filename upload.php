<?php
      if(isset($_POST["submit"])){
          $check = getimagesize($_FILES["img"]["tmp_name"]);
          if($check !== false){
              $image = $_FILES['img']['tmp_name'];
              $imgContent = addslashes(file_get_contents($image));

            /*
             * Insert image data into database
             */

            //DB details
            $dbHost     = 'localhost';
            $dbUsername = 'gxg';
            $dbPassword = '9Akh5Q}ktjMZ';
            $dbName     = 'reegistration';

            //Create connection and select DB
            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

            // Check connection
            if($db->connect_error){
                die("Connection failed: " . $db->connect_error);
            }

            $dataTime = date("Y-m-d H:i:s");
			// Taking all 6 values from the form data(input)
			
			$School_name =  $_REQUEST['School_name'];
			$address = $_REQUEST['address'];
			$contact =  $_REQUEST['contact'];
			$State = $_REQUEST['State'];
			$city = $_REQUEST['city'];
			$Board = $_REQUEST['Board'];
            //Insert image content into database
            $insert = $db->query("INSERT into find (img, created) VALUES ('', '$dataTime')");
            if($insert){
                echo "File uploaded successfully.";
            }else{
                echo "File upload failed, please try again.";
            } 
        }else{
            echo "Please select an image file to upload.";
        }
    }
    ?>