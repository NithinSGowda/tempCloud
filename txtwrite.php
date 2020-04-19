<?php
if(isset($_POST['btn'])){
    $num=$_POST['number'];
    $txt=$_POST['txt'];
    exec("echo \"$txt\">TEXT/".$num.".txt");
    echo '<script>var r = confirm("Text write successful");window.location.href ="http://tempcloud.ml";</script>';
  }
?>