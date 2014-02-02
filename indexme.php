<?php
header('Content-type: text/html; charset=utf-8');

$all="আমাদের ছোট গাঁয়ে ছোট ছোট ঘর,
থাকি সেথা সবে মিলে নাহি কেহ পর৷
পাড়ার সকল ছেলে মোরা ভাই ভাই,
এক সাথে খেলি আর পাঠশালে যাই৷
আমাদের ছোট গ্রাম মায়ের সমান,
আলো দিয়ে, বায়ু দিয়ে বাঁচাইয়াছে প্রাণ৷
মাঠ ভরা ধান তার জল ভরা দিঘি,
চাঁদের কিরণ লেগে করে ঝিকিমিকি৷
আম গাছ, জাম গাছ, বাঁশ ঝাড় যেন,
মিলে মিশে আছে ওরা আত্মীয় হেন৷
সকালে সোনার রবি পুব দিকে ওঠে,
পাখি ডাকে, বায়ু বয়, নানা ফুল ফোটে৷";
$mark = array(
    "0" => array(
         "name" => "আমাদের ছোট গ্রাম",
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
$lineresult= array(
		 "line" => $currentline,
         "full" => $singleline,
         "mark" => $linemark
    );
	
array_push($result,$lineresult);
$totalmark=$totalmark+$linemark;
}
}
aasort($result,"mark");
$reversed = array_reverse($result);

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
?>