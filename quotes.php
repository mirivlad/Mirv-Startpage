<?php
function getElementByClassname ($html, $classname) {
  $dom = new DOMDocument();
  $dom->loadHTML($html);

  $xpath = new DOMXpath($dom);
  $nodes = $xpath->query('//div[@class="' . $classname . '"]');

  $tmp_dom = new DOMDocument();
  foreach ($nodes as $node) {
    $tmp_dom->appendChild($tmp_dom->importNode($node, true));
	break;
  }

  return trim($tmp_dom->saveHTML());
}

$random = rand()&1;
$url= '';
$pre_quote = '';
$quote = "";
$class = '';

if ($random == 0){
        $url = "http://ipfw.ru/bash/random";
        $pre_quote = "from ipfw.ru/bash:<br><hr style='width: 33%;'>";
		$class = "quotebody";
}else{
		$url = "http://ibash.org.ru/random.php";
        $pre_quote = "from iBASH:<br><hr style='width: 33%;'>";
		$class = "quotbody";
}
        $data = "";
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13'
        ));
        $data = curl_exec($curl);
        curl_close($curl);
        $quote = $pre_quote.getElementByClassname($data, $class);
?>
