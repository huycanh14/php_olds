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
	//$.get("b.php", tham_số_truyền, hành_động_gì_đó );
	$(document).ready(function(){

		//$.get("b.php(đường dẫn)", tham_số_truyền, hành_động_gì_đó );
		//  b.php?ho=TEONGUYEN
		$.get("b.php", {ho:"TEONGUYEN"}, function(data){
			$("#content").html(data);
		});
	});

</script>