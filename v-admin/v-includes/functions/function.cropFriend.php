<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$jpeg_quality = 90;
		$output_h = 377 ;
		$output_w = 250 ;
		$src = '../../../members/images/friend_thumb/'.$_POST['filename'];
		$img_r = imagecreatefromjpeg($src);
		$dst_r = ImageCreateTrueColor( $output_w,$output_h );
	  
		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],$output_w,$output_h,$_POST['w'], $_POST['h']);
	  
		//header('Content-type: image/jpeg');
		
		imagejpeg($dst_r,"../../../temp/".$_POST['filename'],$jpeg_quality);
		//echo '<img src="../../../temp/'.$_POST["filename"].'"/>' ;
	  
		header('Location: ../../cropFriend.php?filename='.$_POST['filename'].'&save=answer&id='.$_POST['id']);
	}
?>