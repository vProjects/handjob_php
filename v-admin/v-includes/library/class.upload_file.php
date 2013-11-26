<?php

class FileUpload{
	
	/**
	* global variables declared to check allowed file types, maximum file size and upload paths
	*/
	private $allowed_filetypes = array('.jpg','.jpeg','.png','.gif','.txt', '.pdf','.JPG');
	private $max_filesize = 10485760;
	private $upload_path = '';
	public $error ='';
	
	/**
	* function to add image to folder
	*/
	public function upload_file($filename_desired,$input_name,$path){
		$this->upload_path = $path;
		$uploaded = $this->fileuploader($filename_desired, $this->upload_path,$input_name);
		echo 'function call to fileuploader';
		return $uploaded;
		
	}
	
		
   /**
	* function responsible to upload a file to specified directory it takes argument filename and the location where the file 
	* will be stored
	*/
	public function fileuploader($filename_desired, $location,$input_name){
		echo 'entered into file uploading sections<br>';
		$filename = $_FILES[$input_name]['name'];
		
		$ext = substr($filename,strpos($filename,'.'),4);
		
		if(!in_array($ext,$this->allowed_filetypes)){
			$this->error = 'The file you attempted to upload is not allowed';
			//echo '<span style="color:red">' .$this->upload_path.$filename . '</span>';
	  		//die('');
			echo 'no allowed filetypes<br>';
		}
			
		else if(filesize($_FILES[$input_name]['tmp_name']) > $this->max_filesize){
			$this->error = 'The file you attempted to upload is too large';
	 		//die('');
			echo 'file size exceeds<br>';
		}
			
		else if(!is_writable($this->upload_path)){
			$this->error = 'You cannot upload to the specified directory please CHMOD it to 777';
	  		//die('');
			echo $this->upload_path.'<br>';
			echo 'directory is not writable<br>';
		}
		else{
			$uploaded  = move_uploaded_file($_FILES[$input_name]['tmp_name'],$this->upload_path.$filename_desired.$ext);
			$this->error ='success';
			echo 'uploaded<br>';
			return $filename_desired.$ext;
		}
	}

}


?>