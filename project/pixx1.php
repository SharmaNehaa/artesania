<!DOCTYPE html>
<html>
	<head>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script>
	function redirect_page(read_url){
		 alert(read_url);
		
			window.location.href ="home.php";
		
	}
	</script>
	<style>
		#pixlr {		
			width:1200px;
			height:1000px;		
		}
 	</style>
 		
	</head>
	<body>
	<input type="button" value="Load new document" onclick="redirect_page(window.location.href)">

	</body>
</html>
	
