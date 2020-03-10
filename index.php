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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Images/Logo.png" type="image/png">
    <meta charset="UTF-8">
    <title>temp Cloud</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <meta name="description" content="Temporary Cloud Stoarage and Service">
    <meta name="keywords" content="tempcloud, nithin ,nithin s,Temporary Cloud, File sharing online">
    <meta name="author" content="Nithin S">
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
            2) On the reciever device click on download and enter the port number to download your file<br>
            3) This a temporary cloud service, your files will be deleted if not downloaded for last <b>24hrs</b>
        </div>
    </div>

    <div class="main">
        <span class="upload" onclick="uploader()">Upload</span><br>
        <span class="download" onclick="downloader()">Download</span>
    </div>
    <div class="uform">
        <div class="uformBox">
            <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" required><br>
            <input type="text" name="name" placeholder="Enter the name of your file : (myfile)" required autofocus><br>
            <input type="number" name="room" min="1" max="99999" placeholder="1-99999" required><br>
            <input type="submit" class="submit" name="btn">
        </form>
    </div>
    <div class="uclose" onclick="uclose()">X</div>
        </div>
    <div class="dform">
        <div class="dformBox">
            <form action="download.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Filename : (example.pdf)" required autofocus><br>
            <input type="number" name="room" min="1" max="99999" placeholder="1-99999" required><br>
            <input type="submit" class="submit" name="btn">
        </form>
    </div>
    <div class="dclose" onclick="dclose()">X</div>
        </div>
        <div class="dev">
        &copy; Developed by Nithin S. All rights reserved
    </div>

    <div class="tutorial">
        <span class="done" onclick="tuthide()">Got it</span>
        <div class="up">
            <img src="Images/up.png" class="up-img" type="image/png">
        </div>
        <div class="mid">
            <img src="Images/fast-forward.png" class="mid-img" type="image/png">
        </div>
        <div class="instructions-1">
            Upload the file from any device by entering :<br>
            1) File name (without extension type like .pdf)<br>
            2) A private random room number.
        </div>
        <div class="instructions-2">
            Download the file from any device by entering :<br>
            1) File name (with extension type like .pdf)<br>
            2) The same private room number provided during upload
        </div>
        <div class="down">
            <img src="Images/down.png" class="down-img" type="image/png">
        </div>
    </div>


    <script defer src="script.js"></script>

</body>
</html>
