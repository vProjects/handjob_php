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
</script>
</body>
</html>