<?php
require_once('image.class.php');
$mark_path = "address.png";
$content = "hello world";
$font_url = "SIMYOU.TTF";
$path = "Tulips.jpg";
$color = array(
		0=>255,
		1=>255,
		2=>255,
		3=>20
	);
$location = array(
		0=>20,
		1=>20
	);
$size = 20;
$angle = 0;
$img = new Image($path);
/*$img->fontMark($content,$font_url,$color,$location,$size,$angle);*/
$img->imgMark($mark_path,$location);
/*$img->thumb(300,200);*/
$img->save("hh","test");
$img->show();
?>