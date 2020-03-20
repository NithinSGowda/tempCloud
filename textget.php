<?php
        $myfile = fopen("TEXT/".$_GET['num'].".txt", "r") or die("Unable to open file!");
        print fread($myfile,filesize("TEXT/".$_GET['num'].".txt"));
        fclose($myfile);
?>