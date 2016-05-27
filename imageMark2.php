<?php
/*打开图片*/
//1.图片路径
$src_path = "Tulips.jpg";
//2.获取图片信息
$src_info = getimagesize($src_path);
//3.通过图片的编号获取图片的类型
$src_type = image_type_to_extension($src_info[2],false);//jpeg
//4.内存中保存图片
$func = "imagecreatefrom{$src_type}";
$src_img = $func($src_path);

/*操作图片*/
//1.水印图片路径
$mark_path = "address.png";
//2.水印图片信息
$mark_info = getimagesize($mark_path);
//3.水印图片类型
$mark_type = image_type_to_extension($mark_info[2],false);
//4.水印图片保存在内存当中
$func2 = "imagecreatefrom{$mark_type}";
$mark_img = $func2($mark_path);
//合并图片
 imagecopymerge( $src_img , $mark_img , 20 ,  30 , 0,0,$mark_info[0] , $mark_info[1] , 30 );
 imagedestroy($mark_img);
 
 /*输出图片*/
 header("Content-type:".$src_info['mime']);
 $func3 = "image{$src_type}";
 $func3($src_img);
 /*销毁图片*/
 imagedestroy($src_img);
?>