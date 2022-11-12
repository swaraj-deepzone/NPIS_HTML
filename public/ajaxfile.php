<?php

if(isset($_FILES['file']['name'])){
   // file name
   $filename = $_FILES['file']['name']; //print_r($filename);exit;
   // Location
   $location = '../public/uploads/gambar_images/'.$filename;
   $response = 0;
      // Upload file
   move_uploaded_file($_FILES['file']['tmp_name'],$location);
   $response = 1;
   echo $response;
   exit;
}