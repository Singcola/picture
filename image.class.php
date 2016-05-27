<?php
class Image
{
	private $image;
	private $infor;
	/*打开一张图片，并且读入到内存中去*/
	public function __construct($src_path)
	{
		$infor = getimagesize($src_path);
		$this->infor = array(
				'width'=>$infor[0],
				'height'=>$infor[1],
				'type'=>image_type_to_extension($infor[2],false),
				'mime'=>$infor['mime']
			);
		$func = "imagecreatefrom{$this->infor['type']}";
		$this->image = $func($src_path);
	}

	/*操作图片，压缩*/
	public function thumb($width,$height)
	{
		$thumb_image = imagecreatetruecolor($width, $height);
		imagecopyresampled($thumb_image, $this->image, 0, 0, 0, 0, $width, $height, $this->infor['width'],$this->infor['height']);
		imagedestroy($this->image);
		$this->image = $thumb_image;
	}
	/*操作图片，水印*/
	public function fontMark($content,$font_url,$color,$location,$size,$angle)
	{	$color = imagecolorallocate($this->image, $color[0], $color[1], $color[2]);
		imagettftext($this->image, $size, $angle, $location[0], $location[1], $color, $font_url, $content);
	}
	/*操作图片，水印图片*/
	public function imgMark($mark_path,$location)
	{
		$mark_info = getimagesize($mark_path);
		$mark_type = image_type_to_extension($mark_info[2],false);
		$func2 = "imagecreatefrom{$mark_type}";
		$mark_img = $func2($mark_path);
		imagecopymerge( $this->image , $mark_img , $location[0] ,$location[1], 0,0,$mark_info[0] , $mark_info[1] , 30 );
		imagedestroy($mark_img);
	}
	/*浏览器中输出图片*/
	public function show(){
		header("Content-type:".$this->infor['mime']);
		$func = "image{$this->infor['type']}";
		$func($this->image);
	}
	/*图片保存到硬盘里*/
	public function save($newname,$path=null){
		$path = ($path==null)?null:$path."/";
		$func = "image{$this->infor['type']}";
		$func($this->image,$path.$newname.".".$this->infor['type']);
	}
	/*销毁图片*/
	public function __destruct()
	{
		imagedestroy($this->image);
	}
}
?>