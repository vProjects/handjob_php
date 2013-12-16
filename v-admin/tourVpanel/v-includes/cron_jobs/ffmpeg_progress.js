/*
- this js is required to update the process
- tab according to progess of the ffmpeg process
- takes values from the log generated during the 
- ffmpeg process
- Copyright 2013 Vyrazu Labs
- Auth Singh
*/

//variable to store the values from ajax call
var data_ajax ;

//this function insert text in the process box
function appendText(textString)
{
	var x = document.getElementById('process_div') ;
	x.innerHTML += textString ;
	x.scrollTop = x.scrollHeight ;
}

//this function replaces the value from the div
function updateText(updateId,textString,data)
{
	var y = document.getElementById(updateId) ;
	if(y=='value_1_status')
	   y.innerHTML = textString+data.status ;
	else if(y=='value_1_progress')
	   y.innerHTML = textString+data.progress+'%' ;
}

//get values from the log file using ajax
function getLogValue(fileRequested,myfunction,i){
	$(function(){
		$.post( fileRequested, function(data) {
			//store the recieved value into global variable
			data_ajax = data ;
			
            //updateText('value_1_status','Status:',data);
            //updateText('value_1_progress','Progress:',data);
            
            myfunction('value_1_status','Status:',data,i);
            myfunction('value_1_progress','Progress:',data,i);
		},'json'); 
	});
	
	
}

function myfunction(updateId,textString,data,i){
    if(updateId=='value_1_status'){
        var y = document.getElementById(updateId);
        //y.innerHTML = textString+data.status;
        $('.value_1_status').text(textString+data.status);
    }
    else if(updateId=='value_1_progress'){
       var y = document.getElementById(updateId);
       //y.innerHTML = textString+data.progress+'%' ;
       $('.value_1_progress').text(textString+data.progress+'%');
    }
}
//function to get the value from the log file and process the values
function showProgress(i)
{
	//get the progress of extracting the snaps from log3.php
	appendText("Process of extracting snaps from video......");
	appendText('<br/>Process 1 of getting snaps <div class="value_1_status"></div>');
	appendText('<br/><div class="value_1_progress"></div>');
	//get the value using ajax
	getLogValue('v-includes/cron_jobs/log3.php',myfunction,i);
	
	  // updateText('value_1_status','Status:' + data_ajax.status);
	
	//setTimeout(updateText('value_1_progress','Progress:' + data_ajax.progress + '%'),1200);
}


function rotateIt(){
    for(var i = 0; i<10;i++){
        setInterval(showProgress(i),3000);
    }
}
