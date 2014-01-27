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
- codes for like and dislike
- Jquery Ajax with JavaScript
- Auth Singh
*/
function status(varible_l_d,id_input,username,type,index)
{
	
	//initialize the required variables
	var allow_like = 0 ;
	var allow_dislike = 0 ;


	//if a preson likes a post
	if( varible_l_d == 'like' )
	{
		if( allow_like == 0 )
		{
			//make the ajax call to the like function page
			$.post('v-templates/like.php',{
				status: 'like' ,
				user: username,
				type: type,
				id : id_input
			},function(data){
				if(data == 'You have already provided your views for this comment.'){
					
				}
				else {
					console.log($('.comments .span10 .badge-success')[parseInt(index)]);
					console.log($('.comments .span10 .badge-success')[parseInt(index)].innerHTML);
					
					var currentDislikes =  $('.comments .span10 .badge-success')[parseInt(index)].innerHTML;
					currentDislikes = parseInt(currentDislikes);
					$('.comments .span10 .badge-success')[parseInt(index)].innerHTML = currentDislikes +1 ;
				}
				result = data ;
				alert(data) ;
				allow = 0 ;
			});
		}
	}
	//if a preson dislike the post
	if( varible_l_d == 'dislike' )
	{
		if( allow_dislike == 0 )
		{
			//make the ajax call to the like function page
			$.post('v-templates/like.php',{
				status: 'dislike' ,
				user: username,
				type: type,
				id : id_input
			},function(data){
				if(data == 'You have already provided your views for this comment.'){
					
				}
				else {
					console.log($('.comments .span10 .badge-inverse')[parseInt(index)]);
					var currentDislikes =  $('.comments .span10 .badge-inverse')[parseInt(index)].innerHTML;
					currentDislikes = parseInt(currentDislikes);
					$('.comments .span10 .badge-inverse')[parseInt(index)].innerHTML = currentDislikes +1 ;
				}
				result = data ;
				alert(data) ;
				allow = 0 ; 
			});
		}
	}
}

/*
- codes for full gallery page to control
- the nbumber of images
- Auth Singh
*/
function controlImages(noElements,url_sent)
{
	window.location = 'full_gallery.php?'+url_sent+'&element='+noElements ;
}

/*
 * Jquery codes
 * Author: Vasu Naman
 */ 

$( document ).ready(function() {
	  $('.rating .rateme').mouseenter(function(){
	  	
	  	//new image to be replaced
	  	var newSrc = 'http://handjobstop.com/members/images/red-star.png';
	  	
	  	//current selected element
	  	var currentIndex = $('.rateme').index(this);
	  	
	  	/*
	  	 * calculation of the starting poing of the loop
	  	 */
	  	var basic = Math.floor(currentIndex/5);
	  	loopStartPoint = basic*4+basic ;
	  	
	  	
	  	
	  	//image src of the slected element
	  	var currentSrc = $(this).attr('src');
	  	
	  	
	  	for(var i=loopStartPoint; i<=currentIndex; i++){
	  		var element = $('.rateme')[i];
	  		element.src = newSrc;
	  	}
	  	//var currentSrc = $(this).attr('src');
	  		
	  	
	  });
	  
	  
	  
	  $('.rating .rateme').mouseleave(function(){
	  	
	  	//new image to be replaced
	  	var newSrc = 'http://handjobstop.com/members/images/white-star.png';
	  	
	  	//current selected element
	  	var currentIndex = $('.rateme').index(this);
	  	
	  	/*
	  	 * calculation of the starting poing of the loop
	  	 */
	  	var basic = Math.floor(currentIndex/5);
	  	loopStartPoint = basic*4+basic ;
	  	
	  	//image src of the slected element
	  	var currentSrc = $(this).attr('src');
	  	
	  	
	  	for(var i=loopStartPoint; i<=currentIndex; i++){
	  		var element = $('.rateme')[i];
	  		element.src = newSrc;
	  	}
	  	//var currentSrc = $(this).attr('src');
	  		
	  	
	  });
});