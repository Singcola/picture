# picture
实现图片的图片水印，文字水印，以及图片压缩

imageMark.php   图片上的水印文字代码
imageMark2.php  图片上的图片水印
thumb.php       图片压缩
image.class.php 封装一个类，其中，包括水印和压缩的功能

这些都是基于php的gd库实现的。
其中需要注意到的有：
1.header("Content-type:image/jpeg")/header("Content-type:image/png");
  "image/jpeg"或者"image/png"都是需要更具我们所传出的图片的mime属性来决定的，如果不按照mime,就会出现在屏幕显示时乱码
2.imagepng/image/jpeg,同样也要和输出的图片的类型保持一致，由于我们都不能确定有什么类型的图片，所以要抽取图片的type，使得图片显示在屏幕上的函数
  和图片的类型相符，比如image{png/jpeg};
3.在图片得到保存或者显示后，要及时销毁内存的图片，避免占用内存
4.具体要用到哪些gd函数，可以查看php手册的gd库
