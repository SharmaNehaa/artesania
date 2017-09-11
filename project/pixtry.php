<!DOCTYPE html>
<html>
	<head>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script>
	function redirect_page(){
		if($("#pixlr").get(0).contentWindow.location=="http://localhost/xampp/project/home.php") {
			window.location.href ="home.php";
		}
		else {
			alert("You are going to:"+$("#pixlr").get(0).contentWindow.location);
		}
	}
	/*function redirect_page(){
		 //alert(read_url);
		 alert( $('pixlr').contents().get(0).location.href );
		 	//alert('url = ' + document.frames['pixlr'].location.href);
			//window.location.href ="home.php";
		
	}*/
	</script>
	<style>
		#pixlr {		
			width:1200px;
			height:1000px;		
		}
 	</style>
 		
	</head>
	<body>
	<iframe id="pixlr" name="pixlr" type="text/html" width="100%" height="100%" src="http://pixlr.com/editor?exit=http%3A%2F%2Flocalhost%2Fxampp%2Fproject%2Fhome.php?method=GET?target=uploadPixture.php" frameborder="0"  onLoad="redirect_page();">
	
	</iframe> 	
</body>
</html>
	
