<?php
        $myfile = fopen("TEXT/".$_GET['num'].".txt", "r") or die("No text found in this location ");
        print fread($myfile,filesize("TEXT/".$_GET['num'].".txt"));
        fclose($myfile);
?>