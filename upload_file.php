<?php 
 $target = "a/"; 
 $target = $target . basename( $_FILES['upload']['name']) ; 
 $ok=1;
$uploaded_type ='data.TXT';
$ext = $target['extension'];

if($ext !== 'txt' && $uploaded_type =="text/php"){
  //don't upload
  echo "No PHP files<br>"; 
 $ok=0; 
 } 

 
 
 //Here we check that $ok was not set to 0 by an error 
 if ($ok==0) 
 { 
 Echo "Sorry your file was not uploaded"; 
 } 
 
 //If everything is ok we try to upload it 
 else 
 { 
 if(move_uploaded_file($_FILES['upload']['tmp_name'], $target)) 
 { 
 echo "The file ". basename( $_FILES['upload']['name']). " has been uploaded"; 
 } 
 else 
 { 
 echo "Sorry, there was a problem uploading your file."; 
 } 
 } 
 ?> 
