<?php  

/*session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
}*/

//Dap an
$answers = [
	['question_id' => 1, 'option' => 'C'],
	['question_id' => 2, 'option' => 'A'],
	['question_id' => 3, 'option' => 'C'],
	['question_id' => 4, 'option' => 'B'],
	['question_id' => 5, 'option' => 'C'],
	['question_id' => 6, 'option' => 'C'],
	['question_id' => 7, 'option' => 'D'],
	['question_id' => 8, 'option' => 'D']
];

	//Cac cau hoi
$questions = [
	[
		'id' => 1,
		'question' => 'Có một đàn vịt, cho biết 1 con đi trước thì có 2 con đi sau, 1 con đi sau thì có 2 con đi trước, 1 con đi giữa thì có 2 con đi 2 bên. Hỏi đàn vịt đó có mấy con?'
	],
	[
		'id' => 2,
		'question' => 'Làm thế nào để qua được câu này?'
	],
	[
		'id' => 3,
		'question' => 'Sở thú bị cháy, con gì chạy ra đầu tiên?'
	],
	[
		'id' => 4,
		'question' => 'Bệnh gì bác sỹ bó tay?'
	],
	[
		'id' => 5,
		'question' => 'Ở Việt Nam, rồng bay ở đâu và đáp ở đâu?'
	],
	[
		'id' => 6,
		'question' => 'Tay cầm cục thịt nắn nắn, tay vỗ mông là đang làm gì?'
	],
	[
		'id' => 7,
		'question' => 'Con gấu trúc ao ước gì mà không bao giờ được?'
	],
	[
		'id' => 8,
		'question' => 'Có 1 đàn chim đậu trên cành, người thợ săn bắn cái rằm. Hỏi chết mấy con?'
	]
];

	//Cac phuong an tra loi
$options = [
	[
		'question_id' => 6,
		'options' => ['A' => 'Nướng thịt', 'B' => 'Thái Thịt', 'C' => 'Cho con Bú', 'D' => 'Đấu vật'] 
	],
	[
		'question_id' => 1,
		'options' => ['A' => 1, 'B' => 2, 'C' => 3, 'D' => 4] 
	],       
	[
		'question_id' => 2,
		'options' => ['A' => 'Bỏ cuộc', 'B' => 'Cho tôi qua đi mà', 'C' => 'Không thể qua', 'D' => 'Câu này khó quá'] 
	],
	[
		'question_id' => 3,
		'options' => ['A' => 'Con chim', 'B' => 'Con rắn', 'C' => 'Con người','D' => 'Con tê giác'] 
	],
	[
		'question_id' => 4,
		'options' => ['A' => 'HIV', 'B' => 'Gãy tay', 'C' => 'Siđa', 'D' => 'Bệnh sĩ'] 
	],
	[
		'question_id' => 5,
		'options' => ['A' => 'Hà Nội và Long An', 'B' => 'Hà nội và Quảng Ninh', 'C' => 'Thăng Long và Hạ long', 'D' => 'Quảng Ninh và Long An'] 
	],
	[
		'question_id' => 7,
		'options' => ['A' => 'Ăn Kẹo', 'B' => 'Uống cocacola', 'C' => 'Đá bóng', 'D' => 'Chụp hình'] 
	],
	[
		'question_id' => 8,
		'options' => ['A' => 1,'B' => 2,'C' => 14,'D' => 15] 
	]
];
  $userDo = " checked = 'checked'   ";
  $dungStyle = " style='color:blue;' ";
  $saiStyle = " style='color:red;' ";

?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.header{
			padding-right: 200px;
		}
	</style>
	<title>Bài trắc nghiệm</title>
</head>
<body>
	<div class="header">
		<marquee >
			<h1>Trắc nghiệm &emsp; &emsp; &emsp; Trắc nghiệm  &emsp; &emsp; &emsp; Trắc nghiệm  &emsp; &emsp; &emsp; Trắc nghiệm  &emsp; &emsp; &emsp; Trắc nghiệm
			</h1>
		</marquee>
	</div>

	<img src='<?php echo $_GET["image"] ?>'>
	
	<form action="" method="post">
		<?php for($i = 0; $i < count($questions); $i++) :?>
			<?php echo "Câu thứ " . ($i + 1) . " : " . $questions[$i]['question'] . '<br>' ;?>
			<?php for($j = 0; $j < count($options); $j++) :?>
				<?php if($options[$j]['question_id'] == $questions[$i]['id']) :?>
					<p>
						<input type="radio" name="<?php echo $questions[$i]['id'];?>" value = "1" 
							<?php 
								if (isset($_POST['submit'])) {
									if (isset($_POST[$questions[$i]['id']]) && $_POST[$questions[$i]['id']] ==1) {
										/*nếu là chữ thì đưa vào dấu ngoặc kép
										vd:$_POST[$questions[$i]['id']] ==1 cũng được viết thành $_POST[$questions[$i]['id']] =="A" nếu value = "A" 
										*/
										echo $userDo;
									}
								}

							 ?>


						>
						<span 
							<?php 
								if (isset($_POST['submit'])) {
									if ($answers[$i]['option'] =='A' ) {
										echo $dungStyle;
									} 
									if (isset($_POST[$questions[$i]['id']]) && $_POST[$questions[$i]['id']] ==1) {
										if ($questions[$i]['id']== 'A' ) {
											if($answers[$i]['option'] =='A'){
												echo $dungStyle;
											} else{
												echo $saiStyle;
											}
										}else{
											echo $saiStyle;
										}
										
									}
								}

							 ?>

						>
							<?php echo 'A: ' . $options[$j]['options']['A'] ;?>
						</span>
					</p>

					<p>
						<input type="radio" name="<?php echo $questions[$i]['id'];?>" value = "2"
							<?php 
								if (isset($_POST['submit'])) {
									if (isset($_POST[$questions[$i]['id']]) && $_POST[$questions[$i]['id']] ==2) {
										echo $userDo;
									}
								}

							 ?>

						>
						<span 
							<?php 
								if (isset($_POST['submit'])) {
									if ($answers[$i]['option'] =='B' ) {
										echo $dungStyle;
									} 
									if (isset($_POST[$questions[$i]['id']]) && $_POST[$questions[$i]['id']] ==2) {
										if ($questions[$i]['id']== 'B' ) {
											if($answers[$i]['option'] =='B'){
												echo $dungStyle;
											} else{
												echo $saiStyle;
											}
										}else{
											echo $saiStyle;
										}
										
									}
								}

							 ?>

						 >
							<?php echo 'B: ' . $options[$j]['options']['B'] ;?>
						</span>
					</p>

					<p>
						<input type="radio" name="<?php echo $questions[$i]['id'];?>" value = "3"
						<?php 
								if (isset($_POST['submit'])) {
									if (isset($_POST[$questions[$i]['id']]) && $_POST[$questions[$i]['id']] ==3) {
										echo $userDo;
									}
								}

							 ?>
						>
						<span 
							<?php 
								if (isset($_POST['submit'])) {
									if ($answers[$i]['option'] =='C' ) {
										echo $dungStyle;
									} 
									if (isset($_POST[$questions[$i]['id']]) && $_POST[$questions[$i]['id']] ==3) {
										if ($questions[$i]['id']== 'C' ) {
											if($answers[$i]['option'] =='C'){
												echo $dungStyle;
											} else{
												echo $saiStyle;
											}
										}else{
											echo $saiStyle;
										}
										
									}
								}

							 ?>

						>
							<?php echo 'C: ' . $options[$j]['options']['C'] ;?>
						</span>
					</p>

					<p>
						<input type="radio" name="<?php echo $questions[$i]['id'];?>" value = "4"
						<?php 
								if (isset($_POST['submit'])) {
									if (isset($_POST[$questions[$i]['id']]) && $_POST[$questions[$i]['id']] ==4) {
										echo $userDo;
									}
									if (isset($_POST[$questions[$i]['id']])) {
										if ($questions[$i]['id']== 'D' ) {
											if($answers[$i]['option'] =='D'){
												echo $dungStyle;
											} else{
												echo $saiStyle;
											}
										}else{
											echo $saiStyle;
										}
										
									}
								}

							 ?>


						>
						<span
							<?php 
								if (isset($_POST['submit'])) {
									if ($answers[$i]['option'] =='D' ) {
										echo $dungStyle;
									} 
									if (isset($_POST[$questions[$i]['id']]) && $_POST[$questions[$i]['id']] ==4) {
										if ($questions[$i]['id']== 'D' ) {
											echo $dungStyle;
										} else {
											echo $saiStyle;
										}
									}
								}

							 ?>

						 >
							<?php echo 'D: ' . $options[$j]['options']['D'] ;?>
						</span>
					</p>
				<?php endif ;?>
			<?php endfor ;?>
		<?php endfor ;?>

		<input type="submit" name="submit" value="Kiểm tra đáp án">	
	</form>
</body>
</html>
<?php  

// lưu đúng, sai, no check vào 1 mảng kết quả
$ketqua = [];

if(isset($_POST['submit'])){
	$data = $_POST;
	unset($data['submit']);

	// vòng lặp này để duyệt trong mảng $data
	for($a = 0; $a < count($questions); $a++){

		if(!isset($data[$a+1])) {
			$ketqua[] = "Câu ".($a+1)." Chưa Chọn";
			echo "Câu ".($a+1)." Chưa Chọn <br>";
		} else{

			// vòng lặp này để duyệt trong mảng $answers
			for ($b=0; $b < count($answers); $b++) { 

			// so sánh id
				if($a+1 == $answers[$b]['question_id']){

					// so sánh lựa chọn và đáp án đúng
					if($data[$a+1] == $answers[$b]['option']){
						$ketqua[] = "Câu ".($a+1)." đúng";
						echo "Câu ".($a+1)." đúng<br>";
					} else {
						echo "Câu ".($a+1)." sai<br>";
					}
				}
			}
		}
	}
	
}
?>
