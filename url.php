<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("db.class.php");
$database = new db("urlshortener");
if(!$database->table_exist('urlshortener')){
	die("No Table exist named 'urlshortener'");
};
$code = array(
    'a' => 1, 'b'=> 2, 'c'=> 3, 'd'=> 4, 'e'=> 5, 'f'=> 6, 'g'=> 7, 'h'=> 8, 'i'=> 9, 'j'=> 10, 'k'=> 11, 'l'=> 12, 'm'=> 13, 'n'=> 14, 'o'=> 15, 'p'=> 16, 'q'=> 17, 'r'=> 18, 's'=> 19, 't'=> 20, 'u'=> 21, 'v'=> 22, 'w'=> 23, 'x'=> 24, 'y'=> 25, 'z'=> 26,
	'A'=> 27, 'B'=> 28, 'C'=> 29, 'D'=> 30, 'E'=> 31, 'F'=> 32, 'G'=> 33, 'H'=> 34, 'I'=> 35, 'J'=> 36, 'K'=> 37, 'L'=> 38, 'M'=> 39, 'N'=> 40, 'O'=> 41, 'P'=> 42, 'Q'=> 43, 'R'=> 44, 'S'=> 45, 'T'=> 46, 'U'=> 47, 'V'=> 48, 'W'=> 49, 'X'=> 50, 'Y'=> 51, 'Z'=> 52
);
$base = count($code);
if(isset($_GET['url'])) {
	$url = $_GET['url'];
	$id = $database->insert('urlshortener', "URL='', shortenURL=''");
	$index = $id;
	$shortendUrl = "";

	function searchKey($val, $array){
		foreach ($array as $key => $value) {
			if($value == $val){
				return $key;
			}
		}
	}
	while($index > 0){
		$shortendUrl .= searchKey($index%$base, $code);
		$index = floor($index/$base);
	}
	$database->update('urlshortener', "URL='".$url."', shortenURL='".$shortendUrl."'", "id=".$id, 'none');
	echo $shortendUrl;	
}
elseif(isset($_GET['shortUrl'])){
	$url = $_GET['shortUrl'];
	$index = 0;
	$i=0;
	for ($i=0; $i <strlen($url); $i++) { 
		$index = $index + $code[$url[$i]]*pow($base, $i);
	}
	$redirect = $database->select('urlshortener', 'URL', "id=".$index, 'none', 'none');
	$redirect = $redirect['URL'];

	function startsWith($haystack, $needle){
	    return $needle === "" || strpos($haystack, $needle) === 0;
	}

	echo startsWith($redirect, 'http');

	if (startsWith($redirect, 'http://') || startsWith($redirect, 'https://'))
		header("Location: ".$redirect);
	else
		header("Location: http://".$redirect);

}
?>