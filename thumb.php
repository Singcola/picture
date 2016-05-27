<?php
/*打开图片*/
//1.图片路径
$src_path = "Tulips.jpg";
//2.获取图片信息
$src_info = getimagesize($src_path);
//3.获取图片类型
$src_type = image_type_to_extension($src_info[2],false);
//4.将图片放入内存中
$func = "imagecreatefrom{$src_type}";
$src_img = $func($src_path);

/*操作图片*/
//1.在内存中建立一个300,200的真色彩载体图片
$thumb_img = imagecreatetruecolor(300,200);
//2.将原始图片拷贝到真色彩的载体图片上
imagecopyresampled ( $thumb_img , $src_img , 0 , 0 , 0 , 0 , 300 , 200 , $src_info[0] , $src_info[1] );
//3.销毁原始图片
imagedestroy($src_img);

/*输出图片*/
header("Content-type:".$src_info['mime']);
$func = "image{$src_type}";
$func($thumb_img);

/*图片保存到内存中*/
$func($thumb_img,"thumb.".$src_type);

/*销毁图片*/
imagedestroy($thumb_img);
?>