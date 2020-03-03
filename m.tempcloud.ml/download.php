<?php
   if(isset($_POST['btn'])){
     $room=$_POST['room'];
     $name=$_POST['name'];
     $upload='uploads';
        $File=$upload.'/'.$room.'/'.$name;
        if(file_exists($File)) {
        header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($File).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($File));
            flush();
            readfile($File);
            die();
    }
    else{
        http_response_code(404);
        die();
    }
}
?>