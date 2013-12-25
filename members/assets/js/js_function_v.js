// JavaScript Document
//Copyright Vyrazu Labs
//Auth Singh
var allow = 1 ;
var result = "" ;
function rate(rating,username,id_input,type)
{
	//check whether the rating has been provided or not
	if( allow == 1 )
	{
		$.post('v-templates/rate.php',{
			rate: rating ,
			user: username,
			type: type,
			id : id_input
		},function(data){
			result = data ;
			alert(data) ;
			allow = 0 ;
		});
	}
}



/*
 * Jquery codes
 * Author: Vasu Naman
 */ 

$( document ).ready(function() {
	  $('.rateme').mouseenter(function(){
	  	
	  	//new image to be replaced
	  	var newSrc = 'http://handjobstop.com/members/images/red-star.png';
	  	
	  	//current selected element
	  	var currentIndex = $(this).index();
	  	
	  	//image src of the slected element
	  	var currentSrc = $(this).attr('src');
	  	
	  	
	  	for(var i=0; i<=currentIndex; i++){
	  		var element = $('.rateme')[i];
	  		element.src = newSrc;
	  	}
	  	//var currentSrc = $(this).attr('src');
	  		
	  	
	  });
	  
	  
	  
	  $('.rateme').mouseleave(function(){
	  	
	  	//new image to be replaced
	  	var newSrc = 'http://handjobstop.com/members/images/white-star.png';
	  	
	  	//current selected element
	  	var currentIndex = $(this).index();
	  	
	  	//image src of the slected element
	  	var currentSrc = $(this).attr('src');
	  	
	  	
	  	for(var i=0; i<=currentIndex; i++){
	  		var element = $('.rateme')[i];
	  		element.src = newSrc;
	  	}
	  	//var currentSrc = $(this).attr('src');
	  		
	  	
	  });
});