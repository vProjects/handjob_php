<?php
	if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		echo $galleryId = $_GET["galleryId"];
		$fileName = $_GET["fileName"];
	}
	
	$filePath = $_SERVER['DOCUMENT_ROOT']."members/gallery/".$galleryId."/";
	
	//delete all three large medium and small	
	unlink($filePath."s/".$fileName);	
	unlink($filePath."m/".$fileName);	
	unlink($filePath.$fileName);	

	header('Location: ../../galleryFromImage.php?galleryId='.$galleryId);
	
?>