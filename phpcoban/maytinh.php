<?php
$errors = "";
$result = "";
$pheptinh = 'nhan';
if (isset($_POST['submit'])) {
	$number_a = $_POST['number_a'];
	$number_b = $_POST['number_b'];
	if ($number_a == "" || $number_b == "") {
		$errors = "Không được để trống và phải nhập số";
	} else {
		$result = 0;
		$pheptinh = $_POST['pheptinh'];
		switch ($pheptinh) {
		case "cong":
			$result = $number_a + $number_b;
			break;
		case "tru":
			$result = $number_a - $number_b;
			break;
		case "nhan":
			$result = $number_a * $number_b;
			break;
		default:
			$result = $number_a / $number_b;
			break;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <div class="message" align="center">
    <!-- Thông báo lỗi  -->
    <?php if ($errors != ""): ?>
      <p class="errors" style="color: red;"><?php echo $errors; ?></p>
      <?php
endif;
?>
  </div>
  <form action="" method="post">
    <table border="1" width="50%" align="center" cellpadding="20">
    	<td colspan="2" align="center" style="background-color: grey;color: white">Máy tính cá nhân đơn giản</td>
    	<tr>
    		<td>Nhập số thứ nhất</td>
    		<td>
    			<input type="number" name="number_a"  size="10" value="<?php if (isset($_POST['number_a'])) {
	echo $_POST['number_a'];
}
?>">
       </td>
     </tr>
     <tr>
      <td>Nhập số thứ hai</td>
      <td>
       <input type="number" name="number_b"  size="10" value="<?php if (isset($_POST['number_b'])) {
	echo $_POST['number_b'];
}
?>">
     </td>
   </tr>
   <tr>
    <td>Phép tính</td>
    <td>
     <input type="radio" name="pheptinh" value="cong" <?php
if ($pheptinh == 'cong') {
	echo "checked = 'checked' ";
}
?>>Cộng
     <input type="radio" name="pheptinh" value="tru" <?php
if ($pheptinh == 'tru') {
	echo "checked = 'checked' ";
}
?>>Trừ
     <input type="radio" name="pheptinh" value="nhan" <?php
if ($pheptinh == 'nhan') {
	echo "checked = 'checked' ";
}
?>>Nhân
     <input type="radio" name="pheptinh" value="chia" <?php
if ($pheptinh == 'chia') {
	echo "checked = 'checked' ";
}
?>>Chia
   </td>
 </tr>
 <tr>
  <td>
   <input type="submit" name="submit" value="Tính toán">
 </td>
 <td>
   <input type="text" name="toan_tu" readonly value="<?php echo $result; ?>">
 </td>
</tr>
</table>
</form>
</body>
</html>
