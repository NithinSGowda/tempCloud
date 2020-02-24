<?php
ini_set('upload_max_filesize', '200M');
ini_set('post_max_size', '200M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);
   if(isset($_POST['btn'])){
     $f_name=$_FILES['file']['name'];
     $t_name=$_FILES['file']['tmp_name'];
     $room=$_POST['room'];
     $name=$_POST['name'];
     $upload='uploads';
     if( is_dir($upload.'/'.$room) === false )
        {
            mkdir($upload.'/'.$room);
        }
        $extend=end((explode(".", $f_name)));
     $fupload=move_uploaded_file($t_name,$upload.'/'.$room.'/'.$name.'.'.$extend);
     if($fupload){
         echo '<script>setTimeout(window.location.replace("http://tempcloud.ml"), 2000);alert("File upload successfull.")</script>';
     }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temp Cloud</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head> 
<body>
    <div class="title">
        <div class="main-title">tempCloud</div>
        <div class="sub-title">Temporary cloud storage for handy file sharing</div>
    </div>

    <div class="text">
        <div class="t1">File transfers made easy</div>
        <div class="t2">Just follow these simple steps below :<br>
            1) Click on upload and choose your file, enter a random private room number [1 - 99999]<br>
            2) On the reciever device click on download and enter the port number to download your file
        </div>
    </div>

    <div class="main">
        <span class="upload" onclick="uploader()">Upload</span><br>
        <span class="download">Download</span>
    </div>
    <div class="uform">
        <div class="uformBox">
            <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" required><br>
            <input type="text" name="name" placeholder="Enter the name of your file" value="myname" required><br>
            <input type="number" name="room" min="1" max="99999" placeholder="1-99999" value="10" required><br>
            <input type="submit" class="submit" name="btn">
        </form>
    </div>
        </div>
    <script defer src="script.js"></script>

</body>
</html>