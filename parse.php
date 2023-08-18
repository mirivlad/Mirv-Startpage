<?php
function getElementByClassname ($html, $classname) {
  $dom = new DOMDocument();
  $dom->loadHTML($html);

  $xpath = new DOMXpath($dom);
  $nodes = $xpath->query('//div[@class="' . $classname . '"]');

  $tmp_dom = new DOMDocument();
  foreach ($nodes as $node) {
    $tmp_dom->appendChild($tmp_dom->importNode($node, true));
  }

  return trim($tmp_dom->saveHTML());
}
$quote = "";
$random = rand()&1;
if ($random == 0){
	$file=file_get_contents("http://ipfw.ru/bash/fortune");
	$file = mb_convert_encoding($file, 'UTF-8', 'KOI8-R');
	$arr = explode ('%', $file);
	array_splice($arr,0,3);
	shuffle($arr);
//foreach ($arr as $fortune){
//	$fortune=nl2br($fortune);
//echo $fortune;
//echo "<br><hr><br>";
//}
	$quote = "from ipfw.ru/bash:<br><hr style='width: 33%;'>".nl2br(htmlentities($arr[0]));
	$quote = str_replace ("<br><br>","<br>", $quote);
}else{
	$data = "";
	$curl = curl_init();
// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl, array(
    	CURLOPT_RETURNTRANSFER => 1,
    	CURLOPT_URL => 'http://ibash.org.ru/random.php',
    	CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13'
	));
// Send the request & save response to $resp
	$data = curl_exec($curl);
// Close request to clear up some resources
	curl_close($curl);
//$data = mb_convert_encoding($data, 'UTF-8', 'windows-1251');
	$quote = "from iBASH:<br><hr style='width: 33%;'>".getElementByClassname($data, "quotbody");
}
//print_r ($arr);
?>
