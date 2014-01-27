// JavaScript Document
//Auth Singh
function deleteComment(comment_type, comment_id){
	var answer_del = confirm('Are you sure you want to delete?') ;
	if(answer_del)
	{
		window.location = "v-includes/functions/function.deleteComment.php?del_id="+comment_id+"&type="+comment_type ;
		//alert(comment_type+comment_id) ;
	}
}

//function to delete the friends
function delFriends(friends_id)
{
	var answer_del = confirm('Are you sure you want to delete?') ;
	if(answer_del)
	{
		window.location = "v-includes/functions/function.deleteEntity.php?type=friends&del_id="+friends_id ;
		//alert(comment_type+comment_id) ;
	}
}