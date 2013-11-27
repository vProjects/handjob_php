 <!--footer starts here-->
    <div ><div id="footer" class="span12">
    	<div class="container">
        	<p class="credit">Powered by: Vyrazu Labs</p>
        </div>
    </div><!--footer ends here-->

<!--Import the bootstrap JS-->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<!-- styles and js to support the crop-->
<script src="js/jquery.Jcrop.min.js" type="text/javascript" ></script>
<script language="Javascript">
	$(function(){

		$('#cropbox').Jcrop({
			onChange: showCoords,
			onSelect: updateCoords
		});
	});

	function updateCoords(c)
	{
		var image_h = $("#image_box").height();
		var image_w = $("#image_box").width();
		$('#Image_h').val(image_h);
		$('#Image_w').val(image_w);
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
		$('#x2').val(c.x2);
		$('#y2').val(c.y2);		
	};
	
	function showCoords(c)
	{
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
		$('#x2').val(c.x2);
		$('#y2').val(c.y2);		
	};
	
	function searchPage(pageName,boxId)
	{
		var x = document.getElementById(boxId).value ;
		
		window.location = pageName+'?keyword='+x ;
	}
</script>
</body>
</html>