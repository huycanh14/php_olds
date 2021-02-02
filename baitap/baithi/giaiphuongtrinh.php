<?php  
session_start();
$errors = [];
if (isset($_POST['submit'])){
	$number_a = $_POST['number_a'];
	$number_b = $_POST['number_b'];
	$number_c = $_POST['number_c'];
	// function{
		if (!is_numeric($number_a)){
			$errors[] = " a phải là số";
		}
		if (!is_numeric($number_b)){
			$errors[] = " b phải là số";
		}
	// }
		if (!is_numeric($number_c)){
			$errors[] = " c phải là số";
		} else{
			$_SESSION['ketqua'] = ['number_a' => $number_a, 'number_b' => $number_b, 'number_c' => $number_c];
			header('location: ketqua.php');
		}
	// }
	// }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Giải phương trình</title>
</head>
<body>
	<div class="content">
		<h2>Giải phương trình bậc 2: ax <sup>2</sup> + bx + c</h2>

		<form action="" method="post">
			<p>
				Nhập a:
				<input type="text" name="number_a" id="number_a" placeholder="a" value="<?php if (isset($_POST['number_a'])) echo $_POST['number_a'] ?>">
			</p>

			<p>
				Nhập b:
				<input type="text" name="number_b" id="number_b" placeholder="b" value="<?php if (isset($_POST['number_b'])) echo $_POST['number_b'] ?>">
			</p>

			<p>
				Nhập c:
				<input type="text" name="number_c" id="number_c" placeholder="c" value="<?php if (isset($_POST['number_c'])) echo $_POST['number_c'] ?>">
			</p>
			
			 <input type="submit" name="submit" onclick="tinh_toan();" value="Tính">
		</form>
	</div>
</body>
</html>
<script type="text/javascript">
	function tinh_toan()
	{
		var number_a = document.getElementById("number_a").value ;
			if(number_a == ""){
				alert("Bạn chưa nhập a");
				document.getElementById("number_a").select();
				return false;
			}
			if (isNaN(number_a)) {
				alert("a không là số");
				return false;
			}
		var number_b = document.getElementById("number_b").value ;
			if(number_b == ""){
				alert("Bạn chưa nhập b");
				document.getElementById("number_b").select();
				return false;
			}
			if (isNaN(number_b)) {
				alert("b không là số");
				return false;
			}
		var number_c = document.getElementById("number_c").value ;
			if(number_c == ""){
				alert("Bạn chưa nhập c");
				document.getElementById("number_c").select();
				return false;
			}
			if (isNaN(number_c)) {
				alert("c không là số");
				return false;
			}
			
	}
</script>