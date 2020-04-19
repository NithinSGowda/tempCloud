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
	$corona = $obj["response"]["0"]["cases"]["total"];
	$death = $obj["response"]["0"]["deaths"]["total"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>tempCloud</title>
  <meta content="Temporary Cloud Storage and File Sharing Service" name="description">
  <meta content="tempcloud, nithin ,nithin s,Temporary Cloud, File sharing online" name="keywords">
  <link href="assets/img/Logo.png" rel="icon">
  <link href="assets/img/Logo.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

	<link rel="icon" href="assets/img/Logo.png" type="image/png">
    <link rel="manifest" href="./manifest.webmanifest">
    <meta name="author" content="Nithin S">
	<meta property="og:site_name" content="tempCloud">
    <meta property="og:title" content="Temporary Cloud Storage and File Sharing Service" name="description" />
    <meta property="og:description" content="Temporary Cloud Storage and File Sharing Service" />
    <meta property="og:image" itemprop="image" content="https://tempcloud.ml/assets/img/Logo.png">
    <meta property="og:type" content="website" />
	<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
	<script>
  	var OneSignal = window.OneSignal || [];
  	OneSignal.push(function() {
    OneSignal.init({
      appId: "53339a09-c5e8-4f59-b0f7-93fa2fcfb7a0",
    });
  	});
</script>
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="#header"><span>tempCloud</span></a></h1>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#about">How it works</a></li>
          <li><a href="#upload">Upload</a></li>
          <li><a href="#download">Download</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav>

    </div>
  </header>

  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="assets/img/fast.png" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2>We move<br>your files<br>over the internet</h2>
        <div>
          <a href="#upload" class="btn-get-started scrollto">Upload</a>
          <a href="#download" class="btn-services scrollto">Download</a>
        </div>
      </div>

    </div>
  </section>

  <main id="main">
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>How it works</h3>
          <p>Sharing files on tempcloud is easier than ever</p>
        </header>

        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <p>
              Just follow these simple steps to share your files
            </p>

            <div class="icon-box wow fadeInUp">
              <div class="icon"><i class="fa fa-cloud-upload"></i></div>
              <h4 class="title"><a href="#upload">Upload</a></h4>
              <p class="description">Click on upload and choose your file, enter a random private number [1 - 9999]<br>Remember to enter the filename <b>without</b> file extension [,pdf , .png , etc..]</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-cloud-download"></i></div>
              <h4 class="title"><a href="#download">Download</a></h4>
              <p class="description">On the reciever device click on download and enter the same name(with file extension) and number to download your file<br>Remember to enter the filename <b>with</b> file extension [,pdf , .png , etc..]</p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-exclamation-circle"></i></div>
              <h4 class="title">Note</h4>
              <p class="description">This is a temporary cloud service, your files will be deleted if not downloaded for last <b>48hrs</b></p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
            <img src="assets/img/main-header.png" class="img-fluid" alt="">
          </div>
        </div>

        <section>
          <div class="container">
            <header class="section-header"><h3><hr></h3></header>
            <div class="row about-container">
    
              <div class="col-lg-6 content order-lg-1 order-2" id="upload">
                <h3><b>Upload</b></h3>

                <form action="index.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                  
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="file" required>
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                          <div class="form-group">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your files with anyone else.</small>
                            <label for="exampleInputEmail1">File name</label>
                            <input type="text" class="form-control file-input-name" name="name" placeholder="Name of your file" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Number</label>
                            <input type="number" min="1" max="9999" class="form-control" name="room"  placeholder="1-9999" required>
                          </div>
                  <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="btn" onclick="loader()">Upload</button>
                  </div>
                  </form>    
              </div>




              <div class="col-lg-6 content order-lg-1 order-2" id="download">
                <h3><b>Download</b></h3>
                <form action="download.php" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                      <small id="emailHelp" class="form-text text-muted">Enter the file name with extension type [.png, .pdf etc]</small>
                      <label for="exampleInputEmail1">File name</label>
                      <input type="text" class="form-control file-input-name" name="name" placeholder="Name of your file" required id="fileName">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Number</label>
                      <input type="number" min="1" max="9999" class="form-control" name="room" placeholder="1-9999" required id="fileNumber">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal" role="button" data-toggle="modal" data-target="#link" onclick="getlink()">Get sharable link</button>
                    <button type="submit" class="btn btn-success" name="btn">Download</button>
                  </div>
                  </form>   
              </div>
        </section>
        <hr>









        <div class="row about-extra">
          <div class="col-lg-6 wow fadeInUp">
            <img src="assets/img/sec.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">
            <h4>Highly secure file transfer</h4>
            <p>
              Your files are always safe with us
            </p>
            <p>
              We ensure that your files are accessible only by you
            </p>
          </div>
        </div>

        <div class="row about-extra">
          <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
            <img src="assets/img/hiw.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
            <h4>Fastest and most Efficient file transfer</h4>
            <p>
              Sharing files on tempCloud is easier than sharing them on any other platform
            </p>
            <p>
              Speed guaranteed with our servers having over 350Mbps network connection
            </p>
            <p>
              99.99% server uptime as promised 
            </p>
          </div>

        </div>

      </div>
    </section>

    <section id="services" class="section-bg">
      
    </section>

    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Why choose us?</h3>
          <p>Sharing files on tempcloud is easier than ever</p>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
              <i class="fa fa-fast-forward"></i>
              <div class="card-body">
                <h5 class="card-title">Fast</h5>
                <p class="card-text">Speed guaranteed with our servers having over 350Mbps network connection</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
              <i class="fa fa-lock"></i>
              <div class="card-body">
                <h5 class="card-title">Secure</h5>
                <p class="card-text">We follow highest safety standards to ensure that your files are safe with us</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
              <i class="fa fa-tachometer"></i>
              <div class="card-body">
                <h5 class="card-title">Reliable</h5>
                <p class="card-text">99.99% server uptime as promised</p>
              </div>
            </div>
          </div>

        </div>

        <div class="row counters">

          <div class="col-lg-4 col-6 text-center">
            <span><?php echo $loadtime[0]*100 ?>%</span>
            <p>Server load</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span><?php echo shapeSpace_disk_usage(); ?></span>
            <p>Disk Usage</p>
          </div>

          <div class="col-lg-4 col-12 text-center">
            <span><?php echo shapeSpace_server_uptime(); ?> Hours</span>
            <p>Server uptime</p>
          </div>
        </div>

      </div>
    </section>

    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Reach out to us</h3>
        </div>

        <div class="row wow fadeInUp">


          <div class="col-lg-12">
            <div class="row">
              <div class="col-md-5 info">
                <i class="ion-ios-location-outline"></i>
                <p>Hassan, Karnataka - 573202</p>
              </div>
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p>oneandonlytobe@gmail.com</p>
              </div>
              <div class="col-md-3 info">
                <i class="ion-ios-telephone-outline"></i>
                <p>+919481543420</p>
              </div>
            </div>

            <div class="form">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section>
  </main>
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>tempCloud</h3>
            <p>Temporary Cloud Stoarage and Service</p>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#about">How it works</a></li>
          <li><a href="#upload">Upload</a></li>
          <li><a href="#download">Download</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact Us</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              <strong>Phone:</strong> +919481543420<br>
              <strong>Email:</strong> oneandonlytobe@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="https://twitter.com/Techin_Studio" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/hackernithin" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/nithin_s.gowda/" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="https://www.linkedin.com/in/NithinSGowda" class="linkedin"><i class="fa fa-linkedin"></i></a>
              <a href="https://www.github.com/NithinSGowda" class="GitHib"><i class="fa fa-github"></i></a>
            </div>

          </div>
        </div>
      </div>
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


    <div class="modal fade" id="link" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Here's your sharable link</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <textarea name="text" class="form-control" id="mylink"></textarea>
        </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" name="btn" data-dismiss="modal" onclick="copytoCB2()">Copy to clipboard</button>
        </div>
        </div>
      </div>
    </div>




    <div class="container">
      <div class="copyright">
        <span style="color: #00428A;">&copy; Copyright <strong>NewBiz</strong>. All Rights Reserved</span>
      </div>
      <div class="credits">
        Developed by <a href="https://www.instagram.com/nithin_s.gowda/">NithinSGowda</a><br>
        <span style="color: #00428A;"> Designed by <a href="https://bootstrapmade.com/" style="color: #00428A;">BootstrapMade</a></span>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/mobile-nav/mobile-nav.js"></script>
  <script src="assets/vendor/wow/wow.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

</body>

</html>