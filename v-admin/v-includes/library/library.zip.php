<?php
	//library to create zip files form the files of a directory
	class zip_library
	{
		private $zip;
		
		function __construct()
		{
			$this->zip = new ZipArchive() ;
			return $this->zip ;
		}
		
		/*
		- create a zip file
		- direct file archive
		- Auth Singh
		*/
		function createZip($inputPath,$outputPath,$outputFilename)
		{
			$this->zip->open( $outputPath.$outputFilename , ZipArchive::CREATE );
			$files = scandir($inputPath);
			unset($files[0],$files[1]);
			foreach($files as $file)
			{
				if(is_file($inputPath.$file))
				{
					$this->zip->addFile( $inputPath."/{$file}" , $file );
				}
			}
			$this->zip->close();
		}
	}
?>