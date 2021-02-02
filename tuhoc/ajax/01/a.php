<!DOCTYPE html>
<html>
<head>
	<title>Demo Ajax load</title>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<p>This is page A</p>
	<p>
		This is content page B
	</p>
	<div id="content">
		<!-- Content page B in here -->
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$("#content").load("b.php"); /*$("#content").html("b.php"); lay chuoi*/
	});

</script>