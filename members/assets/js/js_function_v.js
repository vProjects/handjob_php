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