<?php
function shapeSpace_disk_usage() {
	$disktotal = disk_total_space ('/');
	$diskfree  = disk_free_space  ('/');
	$diskuse   = round (100 - (($diskfree / $disktotal) * 100)) .'%';
	return $diskuse;
}
function shapeSpace_server_uptime() {
	$uptime = floor(preg_replace ('/\.[0-9]+/', '', file_get_contents('/proc/uptime')) / 3600);
	return $uptime;
}
$loadtime = sys_getloadavg();
ini_set('upload_max_filesize', '200M');
ini_set('post_max_size', '200M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);
$url = 'http://nith.ml/api.php?input=';
$return = 'http://tempcloud.ml?link=';

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
        //$link = 'http://tempcloud.ml/uploads/'.$room.'/'.$name.'.'.$extend;
        //header('Location:'.$url.$link);
        echo '<script>alert("File uploaded")</script>';
     }
   }


	$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://covid-193.p.rapidapi.com/statistics?country=India",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: covid-193.p.rapidapi.com",
		"x-rapidapi-key: 3230f449d2msh85d69f60dd39ee8p101b93jsn1b8b3dcb6164"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$obj2 = stripslashes(html_entity_decode($response));
	$obj = json_decode($obj2,true);
	//$result = printValues($obj);
	//echo $result["response"];
	$corona = $obj["response"]["0"]["cases"]["active"];
	$death = $obj["response"]["0"]["deaths"]["total"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tempCloud</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="Images/Logo.png" type="image/png">
    <link rel="manifest" href="./manifest.webmanifest">
    <meta name="description" content="Temporary Cloud Stoarage and Service">
    <meta name="keywords" content="tempcloud, nithin ,nithin s,Temporary Cloud, File sharing online">
    <meta name="author" content="Nithin S">
	<meta property="og:site_name" content="tempCloud">
    <meta property="og:title" content="World's fastest file transfer" />
    <meta property="og:description" content="Temporary Cloud Stoarage and Service" />
    <meta property="og:image:secure_url" itemprop="image" content="https://tempcloud.ml/Images/share.png">
    <meta property="og:type" content="website" />
</head>
<body>
	<!--<div class="alert alert-success" role="alert">
        	File upload successful <a href="http://bit.ly/tempcloudinsta" class="alert-link">Follow me on Instagram</a>.
    </div>-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><span class="h1 tempCloud">tempCloud</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          </ul>
          <form class="form-inline my-2 my-lg-0 myform" action="txtwrite.php" method="POST" enctype="multipart/form-data">
            <!--<span class="nit1 mr-sm-2" style="color: rgb(255, 196, 0);">Text Share</span>-->
            <input class="form-control mr-sm-2" type="text" placeholder="Paste text here..." name="txt"><br><br>
            <input class="form-control mr-sm-2" min="1" max="9999" type="number" placeholder="Number" name="number"><br><br>
            <button class="btn btn-success my-2 my-sm-0" type="submit" name="btn">Share text</button>
          </form>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <span class="form-inline my-2 my-lg-0" onsubmit="gettext()">
            <input class="form-control mr-sm-2" min="1" max="9999" type="number" placeholder="Number" name="number-down" id="txt-retrieve"><br>
            <button class="btn btn-success my-2 my-sm-0" name="btn" role="button" data-toggle="modal" data-target="#TEXT" type="button" onclick="gettext()">Get text</button>
          </span>
        </div>
      </nav>
      
      <div class="jumbotron">
        <h1>Fastest and simplest file transfer</h1>
        <p class="lead">Developed by Nithin S</p>
        <hr class="my-4">
        <hr class="my-4">
        <hr class="my-4">
        
        <a class="btn btn-outline-success mr-5 btn-lg" href="#" role="button" data-toggle="modal" data-target="#Upload" type="button">&nbsp Upload &nbsp </a>
        <a class="btn btn-success btn-lg" href="#" role="button" data-toggle="modal" data-target="#Download" type="button">Download</a>
        <hr class="my-4">
      	<div class="container">
          <span class="stats">Server load : </span><?php echo $loadtime[0]*100 ?>% <span class="stats">&nbsp Disk Usage :</span> <?php echo shapeSpace_disk_usage(); ?> <span class="stats">&nbspServer uptime :</span>  <?php echo shapeSpace_server_uptime(); ?> Hours
        </div>
      <br>
      <div class="container">
      <span class="stats">Corona in India LIVE : </span><?php print_r($corona);?> cases | <?php print_r($death);?> deaths
        </div>
      <div class="container">
      <span class="stats">#STAY HOME STAY SAFE</span>
        </div>
      </div>
      <div class="container">
          <h3 class="steps">How to use it</h1>
            <p>
                1) Click on upload and choose your file, enter a random private number [1 - 9999]<br>
                2) On the reciever device click on download and enter the same name(with file extension) and number to download your file<br>
                3) This is a temporary cloud service, your files will be deleted if not downloaded for last <b>48hrs</b>
            </p>
      </div>


      <div class="modal fade" id="TEXT" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Here's your text</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <textarea name="text" class="form-control" id="mycontent"></textarea>
          </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="btn" data-dismiss="modal" onclick="copytoCB()">Copy to clipboard</button>
          </div>
          </div>
        </div>
      </div>



      <div class="modal fade" id="Upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Upload</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form action="index.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
            
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="file">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                    <div class="form-group">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your files with anyone else.</small>
                      <label for="exampleInputEmail1">File name</label>
                      <input type="text" class="form-control file-input-name" name="name" placeholder="Name of your file">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Number</label>
                      <input type="number" min="1" max="9999" class="form-control" name="room"  placeholder="1-9999">
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" name="btn">Upload</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="Download" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <form action="download.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Download</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <small id="emailHelp" class="form-text text-muted">Enter the file name with extension type [.png, .pdf etc]</small>
                <label for="exampleInputEmail1">File name</label>
                <input type="text" class="form-control file-input-name" name="name" placeholder="Name of your file">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Number</label>
                <input type="number" min="1" max="9999" class="form-control" name="room" placeholder="1-9999">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success" name="btn">Download</button>
            </div>
            </form>
          </div>
        </div>
      </div>
		
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script defer src="script.js"></script>
</html>
