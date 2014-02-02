<?php
header('Content-type: text/html; charset=utf-8');
mysql_connect("localhost","cricketp_news","123456");
mysql_select_db("cricketp_news");
function aasort (&$array, $key) {
    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    $array=$ret;
}
class sagar{

  public $mb;
  public $tm;
function aasort (&$array, $key) {
    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    $array=$ret;
}
function mark($a,$all){
$mark = array(
    "0" => array(
         "name" => $a,
         "mark" => "30"
    ),
    "1" => array(
         "name" => "ঘর",
         "mark" => "10"
    ),
    "2" => array(
         "name" => "পাঠশালে",
         "mark" => "20"
    ),
    "3" => array(
         "name" => "পর",
         "mark" => "15"
    ),
    "4" => array(
         "name" => "বাঁশ ঝাড়",
         "mark" => "12"
    ),
    "5" => array(
         "name" => "পুব",
         "mark" => "19"
    ),
    "6" => array(
         "name" => "প্রাণ",
         "mark" => "19"
    ),
);

$result=array();
$newline="৷";
$line = explode($newline, $all);
$currentline=0;
$linemark=0;
$totalmark=0;
foreach($line as $singleline){
$currentline=$currentline+1;
$linemark=0;
if($singleline==""){}else{
foreach($mark as $markb){

if (strpos($singleline,$markb['name']) !== false) {
 $linemark=$linemark+$markb['mark'];
}
}
if($linemark==0){
$linemark=10;
}

$lineresult= array(
		 "line" => $currentline,
         "full" => $singleline,
         "mark" => $linemark
    );
	
array_push($result,$lineresult);
$totalmark=$totalmark+$linemark;
}
}
self::aasort($result,"mark");
$reversed = array_reverse($result);
/**
echo "<center><h3>Passage<h3></center><br><hr>";
echo nl2br($all);
echo "<center><h3>Line Mark<h3></center><br><hr>";
foreach($mark as $markb){
echo $markb['name']." = ".$markb['mark']."<br>";
}


echo "<center><h3>All Line Results<h3></center><br><hr>";
foreach($reversed as $resultb){
echo "Reading Line No. ".$resultb['line']." : ".$resultb['full']."<br>";
echo "Line Mark is = ".$resultb['mark']."<br>";
}

echo "<center><h3>Top Two Lines<h3></center><br><hr>";
$currentprint=0;
foreach($reversed as $resultb){
$currentprint=$currentprint+1;
if($currentprint<3){
echo "TOP ".$currentprint." : ".$resultb['full']."<br>";
echo "Mark = ".$resultb['mark']."<br>";
}
}

echo "<center><h3>Total Mark<h3></center><br><hr>";
echo "Total Mark is = ".$totalmark."<br>";
**/
$this->mb=$reversed;
$this->tm=$totalmark;
}
}


$data=mysql_query("select * from news");
while($row=mysql_fetch_array($data)){


$hone= "$row[1]";
$str = "$row[2]";
$honeb= "$row[3]";
$strb = "$row[4]";
$sagar=new sagar;
$sagar->mark($hone,$str);
$reversea=$sagar->mb;
$totala=$sagar->tm;
$sagar->mark($honeb,$strb);
$reverseb=$sagar->mb;
$totalb=$sagar->tm;

$result = array_merge($reversea, $reverseb);
$total=$totala+$totalb;
aasort($result,"mark");
$reversed = array_reverse($result);


echo "<center><h3>All Line Results<h3></center><br><hr>";
foreach($reversed as $resultb){
echo "Reading Line No. ".$resultb['line']." : ".$resultb['full']."<br>";
echo "Line Mark is = ".$resultb['mark']."<br>";
}

echo "<center><h3>Top Two Lines<h3></center><br><hr>";
$currentprint=0;
foreach($reversed as $resultb){
$currentprint=$currentprint+1;
if($currentprint<4){
echo "TOP ".$currentprint." : ".$resultb['full']."<br>";
echo "Mark = ".$resultb['mark']."<br>";
}
}

echo "<center><h3>Total Mark<h3></center><br><hr>";
echo "Total Mark is = ".$total."<br>";

/**
echo htmlspecialchars_decode($str);
$all=htmlspecialchars_decode($str);

 note that here the quotes aren't converted
echo htmlspecialchars_decode($str, ENT_NOQUOTES);

echo "<br>";
**/
echo"XXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$total=0;
}

?>



