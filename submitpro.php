<?php
$con=mysqli_connect("localhost","cricketp_news","123456","cricketp_news");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$heada=html_entity_decode($_POST['head1'],ENT_QUOTES,'UTF-8');
$newsa=html_entity_decode($_POST['news1'],ENT_QUOTES,'UTF-8');
$headb=html_entity_decode($_POST['head2'],ENT_QUOTES,'UTF-8');
$newsb=html_entity_decode($_POST['news2'],ENT_QUOTES,'UTF-8');

$sql="INSERT INTO news (head1, news1, head2 ,news2)
VALUES
('$heada','$newsa','$headb','$newsb')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "News Uploaded";

mysqli_close($con);
?>