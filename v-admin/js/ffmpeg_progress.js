/*
- this js is required to update the process
- tab according to progess of the ffmpeg process
- takes values from the log generated during the 
- ffmpeg process
- Copyright 2013 Vyrazu Labs
- Auth Singh
*/

//variable to store the values from ajax call
var data_ajax_snaps ;
var data_ajax_conversion ;
var data_ajax_slice ;

var slice_percent ;
var no_slice ;

function getNo_slice(id_no_slice)
{
	//get the no of slices from the page using no_of_slice id
	no_slice = document.getElementById(id_no_slice).innerHTML ;
	no_slice = parseInt(no_slice) ;
	slice_percent = parseInt(100/(no_slice/3)) ;
	slice_percent = slice_percent - 3 ;
}

//this function insert text in the process box
function appendText(textString)
{
	var x = document.getElementById('process_div') ;
	x.innerHTML += textString ;
	x.scrollTop = x.scrollHeight ;
}

//append the progress bar
function appendProgressbar(progressBar_id)
{
	var x = document.getElementById('process_div') ;
	x.innerHTML += '<div class="progress span10 progress-striped active"><div id="'+progressBar_id+'" class="bar" style="width: 1%;"></div></div>' ;
	x.scrollTop = x.scrollHeight ;
}

//function to change the width of the progress bar
function changeProgress_width(idName_progressBar,width_progressBar)
{
	var pb = document.getElementById(idName_progressBar) ;
	pb.style.width = width_progressBar + "%" ;
}

//this function replaces the value from the div
function updateText(updateId,textString)
{
	var y = document.getElementById(updateId) ;
	y.innerHTML = textString ;
	//scroll till end
	//var z = document.getElementById('process_div') ;
	//z.scrollTop = z.scrollHeight ;
}

//get values from the log file using ajax
function getLogValue_conversion(fileRequested){
	$(function(){
		$.post( fileRequested, function(data) {
			//store the recieved value into global variable
			data_ajax_conversion = data ;
		},'json'); 
	});
}
function getLogValue_snaps(fileRequested){
	$(function(){
		$.post( fileRequested, function(data) {
			//store the recieved value into global variable
			data_ajax_snaps = data ;
		},'json'); 
	});
}
function getLogValue_slice(fileRequested){
	$(function(){
		$.post( fileRequested, function(data) {
			//store the recieved value into global variable
			data_ajax_slice = data ;
		},'json'); 
	});
}

//function to get the value from the log file and process the values
function showProgress_snaps()
{
	getLogValue_snaps('v-includes/cron_jobs/log3.php');
	
	//variable to store the process numbers
	process_snaps_no = 1 ;
	
	var x_1 = 1 ;
	var x_1_timeout = 700 ;
	var x_1_append = 1 ;
	var x_1_id = 1 ;
	
	//check for the snaps process
	setInterval(function(){if( typeof data_ajax_snaps !== "undefined" )
	{
		getLogValue_snaps('v-includes/cron_jobs/log3.php');
		
		if( data_ajax_snaps.time != "break" && data_ajax_snaps.progress <= 80 )
		{
			if( x_1 == 1 )
			{
				//get the progress of extracting the snaps from log3.php
				appendText("<br/><br/><p>Process of extracting snaps from video......</p>");
				appendText('Process of getting snaps <div id="value_1_status_' + x_1_id +'"></div>');
				appendText("<p>Duration: " + data_ajax_snaps.duration + "</p>");
				appendText('<div id="value_1_progress_' + x_1_id +'"></div><br/>');
				appendProgressbar('value_1_progressBar_' + x_1_id);
				x_1++ ;
			}
			updateText('value_1_status_' + x_1_id,'Status:' + data_ajax_snaps.status);
			updateText('value_1_progress_' + x_1_id,'Progress:' + data_ajax_snaps.progress + '%');
			changeProgress_width('value_1_progressBar_' + x_1_id ,data_ajax_snaps.progress);
			
			if( data_ajax_snaps.progress >= 80 )
			{
				updateText('value_1_status_' + x_1_id,'Progress: Completed');
				updateText('value_1_progress_' + x_1_id,'Progress:' + 100 + '%');
				changeProgress_width('value_1_progressBar_' + x_1_id ,100);
				
				if( x_1_append == 1 )
				{
					appendText('<p>Process Extracting Snaps ' + process_snaps_no + ' completed</p>');
					x_1_append++ ;
					process_snaps_no++ ;
					x_1 = 1 ;
					x_1_id++ ;
				}
				x_1_timeout = 6000 ;
			}
		}
		else
		{
			x_1_append = 1 ;
			
			if( x_1 == 1 )
			{
				//get the progress of extracting the snaps from log3.php
				appendText("<br/><br/>Process of extracting snaps from video......");
				appendText('<br/>Process of getting snaps <div id="value_1_status_' + x_1_id +'"></div>');
				appendText('<div id="value_1_progress_' + x_1_id +'"></div><br/>');
				appendProgressbar('value_1_progressBar_' + x_1_id );
				var x_1_timeout = 700 ;
				x_1++ ;
			}
			
			updateText('value_1_status_' + x_1_id,'Status: Completed');
			updateText('value_1_progress_' + x_1_id,'Progress:' + 100 + '%');
			changeProgress_width('value_1_progressBar_' + x_1_id ,100);
		}
		
	}},x_1_timeout);

}

function showProgress_conversion()
{
	getLogValue_conversion('v-includes/cron_jobs/log1.php');
	
	process_convert_no = 1 ;	
	
	var x_2 = 1 ; 
	var x_2_timeout = 800 ;
	var x_2_append = 1 ;
	var x_2_id = 1 ;
	
	//for the conversion process
	setInterval(function(){if( typeof data_ajax_conversion !== "undefined" )
	{
		getLogValue_conversion('v-includes/cron_jobs/log1.php');
		
		if( data_ajax_conversion.time != "break" && data_ajax_conversion.progress <= 95)
		{
			if( x_2 == 1)
			{
				appendText("<br/><br/>Process of converting video......");
				appendText('<br/>Process conversion started <div id="value_2_status_' + x_2_id +'"></div>');
				appendText("<p>Duration: " + data_ajax_conversion.duration + "</p>");
				appendText('<div id="value_2_progress_' + x_2_id +'"></div><br/>');
				appendProgressbar('value_2_progressBar_' + x_2_id );
				x_2++ ;
			}
			
			updateText('value_2_status_' + x_2_id,'Status:' + data_ajax_conversion.status);
			updateText('value_2_progress_' + x_2_id,'Progress:' + data_ajax_conversion.progress + '%');
			changeProgress_width('value_2_progressBar_' + x_2_id ,data_ajax_conversion.progress);
			
			if( data_ajax_conversion.progress >= 95 )
			{
				updateText('value_2_status_' + x_2_id,'Status: Completed');
				updateText('value_2_progress_' + x_2_id,'Progress:' + 100 + '%');
				changeProgress_width('value_2_progressBar_' + x_2_id,100);
				
				if( x_2_append == 1 )
				{
					appendText('<p>Process conversion ' + process_convert_no + ' completed</p>');
					x_2_append++ ;
					process_convert_no++ ;
					x_2 = 1 ;
					x_2_id++ ;
				}
				x_2_timeout = 8000 ;
			}
		}
		else
		{
			x_2_append = 1 ;
			
			if( x_2 == 1)
			{
				appendText("<br/><br/>Process of converting video......");
				appendText('<br/>Process conversion started <div id="value_2_status_' + x_2_id +'"></div>');
				appendText('<div id="value_2_progress_' + x_2_id +'"></div><br/>');
				appendProgressbar('value_2_progressBar_' + x_2_id );
				var x_2_timeout = 800 ;
				x_2++ ;
			}
			
			updateText('value_2_status_' + x_2_id,'Status: Completed');
			updateText('value_2_progress_' + x_2_id,'Progress:' + 100 + '%');
			changeProgress_width('value_2_progressBar_' + x_2_id,100);
		}
		
	}},x_2_timeout);
}

function showProgress_slice()
{
	getLogValue_slice('v-includes/cron_jobs/log2.php');
	
	process_slice_no = 1 ;
	
	//get the slice percent
	getNo_slice('no_of_slice_1') ;
	
	var x_3 = 1 ; 
	var x_3_timeout = 800 ;
	var x_3_append = 1 ;
	var x_3_check_id = 1 ;
	var x_3_slice_id = 1 ;
	var x_3_id = 1 ;
	
	//for the slice process
	setInterval(function(){if( typeof data_ajax_slice !== "undefined" )
	{
		getLogValue_slice('v-includes/cron_jobs/log2.php');
			
		if( data_ajax_slice.time != "break" && data_ajax_slice.progress <= (slice_percent+1) )
		{
			if( x_3 == 1)
			{
				appendText("<br/><br/>Process of Slicing video......");
				appendText('<br/>Process slicing started <div id="value_3_status_' + x_3_id +'"></div>');
				appendText("<p>Duration: " + data_ajax_slice.duration + "</p>");
				appendText('<div id="value_3_progress_' + x_3_id +'"></div><br/>');
				appendProgressbar('value_3_progressBar_' + x_3_id );
				
				x_3++ ;
			}
			
			updateText('value_3_status_' + x_3_id,'Status:' + data_ajax_slice.status);
			updateText('value_3_progress_' + x_3_id,'Progress:' + (data_ajax_slice.progress*(no_slice/3)) + '%');
			changeProgress_width('value_3_progressBar_' + x_3_id , (data_ajax_slice.progress*(no_slice/3)) );
			
			if( data_ajax_slice.progress >= slice_percent )
			{
				updateText('value_3_status_' + x_3_id,'Status: Completed');
				updateText('value_3_progress_' + x_3_id,'Progress:' + 100 + '%');
				changeProgress_width('value_3_progressBar_' + x_3_id ,100);
				
				if( x_3_append == 1 )
				{
					appendText('<p>Process Slice ' + process_slice_no + ' completed</p>');
					x_3_append++ ;
					process_slice_no++ ;
					x_3 = 1 ;
					x_3_id++ ;
					//check fot the next id for getting no of slice
					if( x_3_check_id == no_slice )
					{
						//increment the is for checking the next value
						x_3_slice_id++ ;
						//update the id to next value
						var x_3_idName = 'no_of_slice_' + x_3_slice_id ;
						getNo_slice(x_3_idName) ;
					}
					x_3_check_id++ ;
				}
				x_3_timeout = 6000 ;
			}
		}
		else
		{
			x_3_append = 1 ;
			if( x_3 == 1)
			{
				appendText("<br/><br/>Process of Slicing video......");
				appendText('<br/>Process slicing started <div id="value_3_status_' + x_3_id +'"></div>');
				appendText('<div id="value_3_progress_' + x_3_id +'"></div><br/>');
				appendProgressbar('value_3_progressBar_' + x_3_id );
				x_3++ ;
				x_3_timeout = 800 ;
			}
			updateText('value_3_status_' + x_3_id,'Status: Completed');
			updateText('value_3_progress_' + x_3_id,'Progress:' + 100 + '%');
			changeProgress_width('value_3_progressBar_' + x_3_id ,100);
			
		}
		
	}},x_3_timeout);
}

function fireProgress()
{
	var process_checker = 0 ;
	
	var fireProgress_check = setInterval(function(){
		getLogValue_conversion('v-includes/cron_jobs/log1.php');
		getLogValue_slice('v-includes/cron_jobs/log2.php');
		getLogValue_snaps('v-includes/cron_jobs/log3.php');
	},2000);
	
	var fireProgress_snaps = setInterval(function(){
		if( typeof data_ajax_snaps !== "undefined" )
		{
			if( data_ajax_snaps.time != "break" )
			{
				showProgress_snaps();
				process_checker++ ;
				clearInterval(fireProgress_snaps);
			}
		}
	},2000);
	
	var fireProgress_convert = setInterval(function(){
		if( typeof data_ajax_conversion !== "undefined" )
		{
			if( data_ajax_conversion.time != "break" )
			{
				showProgress_conversion();
				process_checker++ ;
				clearInterval(fireProgress_convert);
			}
		}
	},2000);
	
	var fireProgress_slice = setInterval(function(){
		if( typeof data_ajax_slice !== "undefined" )
		{
			if( data_ajax_slice.time != "break" )
			{
				showProgress_slice();
				process_checker++ ;
				clearInterval(fireProgress_slice);
			}
		}
	},2000);
}