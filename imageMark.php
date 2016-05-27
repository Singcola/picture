<?php

/*打开图片*/
//1.配置图片路径
$src = "Tulips.jpg";
//2获取图片信息
$info = getimagesize($src);
//3通过图片编号$type获取图片的类型
$src_type = image_type_to_extension($info[2],false);
//4内存中创建一个和我们图像类型一样的图像
$fun = "imagecreatefrom{$src_type}";//imagecreatefromjpeg,imagecreatefrompng;
//5图像放在我们的内存中
$image = $fun($src);//imagecreatefromjpeg("Tulips.jpg");


/*操作图片*/
//1.字体的路径
$font = "SIMYOU.TTF";
//2.水印的内容
$content = "Hello,zhoujielun";
//3.图片上字体的颜色
$color = imagecolorallocatealpha($image, 255, 255, 255, 20);
//4.写入文字
imagettftext($image, 20, 0, 20, 70, $color, $font, $content);
//5.输出图片
header("Content-type:".$info['mime']);//header("Content-type:image/jpeg");header("Content-type:image/png");
$func = "image{$src_type}";//imagepng($image);imagejpeg($image);
$func($image);
//6.销毁图片
imagedestroy($image);
?>