<?php 
/*
	* Input: 	Nhập 1 mảng số bất kì
	* Process:	$mang = explode(',', $_POST['mang'])
				for($i = 0; $i < count($mang); $i++){
					$so = (float)$mang[$i];
					//số lẻ
					if($so % 2 != 0){
						echo $so . ' ' ;
						$tongle = $tongle + 1;
					}
					//số chẵn
					if($so % 2 == 0){
						echo $so . ' ' ;
						$tongchan = $tongchan + 1;
					}
					//số nguyên tố
					if($so == 2){
						echo '2 ';
					}
					if($so >= 2){
						for($a = 2; $a <= $so - 1; $a++){
							$nt = $so % $a;
							if($nt == 0){
								break;
							}else{
								echo $so . ' ';
								break;
							}
						}
					}
					//không phải số nguyên tố
					if($so >= 2){
						for($a = 2; $a <= $so - 1; $a++){
							$nt = $so % $a;
							if($nt == 0){
								echo $so . ' ';
								break;
							}else{
								break;
							}
						}
					}
				}
	* Output:	In số chẵn, số lẻ, số nguyên tố, số không phải số nguyên tố
*/
$error = [];
$mang  = $so = null;
$tongle = $sole = null;
$tongchan = $sochan = null;
$nt = null;
if(isset($_POST['submit'])){
	if(!(isset($_POST['mang'])) || $_POST['mang'] == ''){
		$error [] = 'Vui lòng nhập mảng';
	}

	if(count($error) == 0){
		$mang = explode(',', $_POST['mang']);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bai 10</title>
</head>
<body>
	<?php if (count($error) > 0) :?>
		<div class="messages">
			<?php for ($i = 0; $i < count($error); $i++) :?>
				<p><?php echo $error[$i];?></p>
			<?php endfor;?>
		</div>
	<?php endif;?>
	
	<form action="" method="post">
		<h3>
			Nhập 1 mảng số ví dụ như: 1, 2, 3, 4, 5,...
		</h3>
		<p>
			<input type="text" name="mang" placeholder="Nhập mảng a,b,c,d,e,f">
			<input type="submit" name="submit" value="Tìm kiếm">
		</p>

		<!--Các số lẻ-->
		<?php echo 'Các số lẻ là: '; ?>
		<?php for($i = 0; $i < count($mang); $i++) :?>
			<?php 
			$so = (float)$mang[$i];
			if($so % 2 != 0){
				echo $so . ' ' ;
				$tongle = $tongle + 1;
			}
			?>
		<?php endfor ;?>
		<?php echo '. ' ?>
		<?php echo 'Có ' . $tongle . ' số lẻ' . '<br>'; ?>


		<!--Các số chẵn-->
		<?php echo 'Các số chẵn là: '; ?>
		<?php for($i = 0; $i < count($mang); $i++) :?>
			<?php 
			$so = (float)$mang[$i];
			if($so % 2 == 0){
				echo $so . ' ' ;
				$tongchan = $tongchan + 1;
			}
			?>
		<?php endfor ;?>
		<?php echo '. ' ?>
		<?php echo 'Có ' . $tongchan . ' số chẵn' .'<br>'; ?>

		<!--Số nguyên tố-->
		<?php echo 'Các số nguyên tố: ' ;?>
		<?php for($i = 0; $i < count($mang); $i++) :?>
			<?php 
			$so = (float)$mang[$i];
			if($so == 2){
				echo '2 ';
			}
			if($so >= 2){
				for($a = 2; $a <= $so - 1; $a++){
					$nt = $so % $a;
					if($nt == 0){
						break;
					}else{
						echo $so . ' ';
						break;
					}
				}
			}
			?>
		<?php endfor ;?>
		<?php echo '<br>' ?>

		<!--Số không phải nguyên tố-->
		<?php echo 'Các không phải là số nguyên tố: ' ;?>
		<?php for($i = 0; $i < count($mang); $i++) :?>
			<?php 
			$so = (float)$mang[$i];
			if($so >= 2){
				for($a = 2; $a <= $so - 1; $a++){
					$nt = $so % $a;
					if($nt == 0){
						echo $so . ' ';
						break;
					}else{
						break;
					}
				}
			}
			?>
		<?php endfor ;?>
		<?php echo '<br>' ?>
	</form>
</body>
</html>