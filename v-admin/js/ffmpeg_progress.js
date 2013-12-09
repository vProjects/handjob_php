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

//this function insert text in the process box
function appendText(textString)
{
	var x = document.getElementById('process_div') ;
	x.innerHTML += textString ;
	x.scrollTop = x.scrollHeight ;
}

//this function replaces the value from the div
function updateText(updateId,textString)
{
	var y = document.getElementById(updateId) ;
	y.innerHTML = textString ;
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
	//check for the snaps process
	setInterval(function(){if( typeof data_ajax_snaps !== "undefined" )
	{
		getLogValue_snaps('v-includes/cron_jobs/log3.php');
		
		if( data_ajax_snaps.time != "break" )
		{
			if( x_1 == 1 )
			{
				//get the progress of extracting the snaps from log3.php
				appendText("Process of extracting snaps from video......");
				appendText('<br/>Process of getting snaps <div id="value_1_status"></div>');
				appendText('<br/><div id="value_1_progress"></div>');
				x_1++ ;
			}
			updateText('value_1_status','Status:' + data_ajax_snaps.status);
			updateText('value_1_progress','Progress:' + data_ajax_snaps.progress + '%');
			if( data_ajax_snaps.progress > 97 )
			{
				updateText('value_1_status','Progress: Completed');
				updateText('value_1_progress','Progress:' + 100 + '%');
				appendText('<p>Process Extracting Snaps ' + process_snaps_no + ' completed</p>');
				process_snaps_no++ ;
			}
		}
		else
		{
			if( x_1 == 1 )
			{
				//get the progress of extracting the snaps from log3.php
				appendText("Process of extracting snaps from video......");
				appendText('<br/>Process of getting snaps <div id="value_1_status"></div>');
				appendText('<br/><div id="value_1_progress"></div>');
				x_1++ ;
			}
			updateText('value_1_status','Status: Completed');
			updateText('value_1_progress','Progress:' + 100 + '%');
		}
		
	}},700);

}

function showProgress_conversion()
{
	getLogValue_conversion('v-includes/cron_jobs/log1.php');
	
	process_convert_no = 1 ;	
	
	var x_2 = 1 ; 
	//for the conversion process
	setInterval(function(){if( typeof data_ajax_conversion !== "undefined" )
	{
		getLogValue_conversion('v-includes/cron_jobs/log1.php');
		
		if( data_ajax_conversion.time != "break" )
		{
			if( x_2 == 1)
			{
				appendText("Process of extracting snaps from video......");
				appendText('<br/>Process conversion started <div id="value_2_status"></div>');
				appendText('<br/><div id="value_2_progress"></div>');
				x_2++ ;
			}
			
			updateText('value_2_status','Status:' + data_ajax_conversion.status);
			updateText('value_2_progress','Progress:' + data_ajax_conversion.progress + '%');
			if( data_ajax_conversion.progress >= 99 )
			{
				updateText('value_2_status','Status: Completed');
				updateText('value_2_progress','Progress:' + 100 + '%');
				appendText('<p>Process conversion ' + process_convert_no + ' completed</p>');
				process_convert_no++ ;
			}
		}
		else
		{
			if( x_2 == 1)
			{
				appendText("Process of extracting snaps from video......");
				appendText('<br/>Process conversion started <div id="value_2_status"></div>');
				appendText('<br/><div id="value_2_progress"></div>');
				x_2++ ;
			}
			updateText('value_2_status','Status: Completed');
			updateText('value_2_progress','Progress:' + 100 + '%');
		}
		
	}},1500);
}

function showProgress_slice()
{
	getLogValue_slice('v-includes/cron_jobs/log2.php');
	
	process_slice_no = 1 ;
	
	var x_3 = 1 ; 
	//for the slice process
	setInterval(function(){if( typeof data_ajax_slice !== "undefined" )
	{
		getLogValue_slice('v-includes/cron_jobs/log2.php');
			
		if( data_ajax_slice.time != "break" )
		{
			if( x_3 == 1)
			{
				appendText("Process of Slicing video......");
				appendText('<br/>Process slicing started <div id="value_3_status"></div>');
				appendText('<br/><div id="value_3_progress"></div>');
				x_3++ ;
			}
			updateText('value_3_status','Status:' + data_ajax_slice.status);
			updateText('value_3_progress','Progress:' + data_ajax_slice.progress + '%');
			if( data_ajax_slice.progress >= 33 )
			{
				updateText('value_3_status','Status: Completed');
				updateText('value_3_progress','Progress:' + 100 + '%');
				appendText('<p>Process Slice ' + process_slice_no + ' completed</p>');
				process_slice_no++ ;
			}
		}
		else
		{
			if( x_3 == 1)
			{
				appendText("Process of Slicing video......");
				appendText('<br/>Process slicing started <div id="value_3_status"></div>');
				appendText('<br/><div id="value_3_progress"></div>');
				x_3++ ;
			}
			updateText('value_3_status','Status: Completed');
			updateText('value_3_progress','Progress:' + 100 + '%');
		}
		
	}},1500);
}

function fireProgress()
{
	var process_checker = 0 ;
	
	var fireProgress_check = setInterval(function(){
		getLogValue_conversion('v-includes/cron_jobs/log1.php');
		getLogValue_slice('v-includes/cron_jobs/log2.php');
		getLogValue_snaps('v-includes/cron_jobs/log3.php');
		if( process_checker == 3 )
		{
			clearInterval( fireProgress_check );
		}
	},800);
	
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
	},700);
	
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
	},700);
	
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
	},700);
}