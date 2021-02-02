<?php  
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


?>
<!DOCTYPE html>
<html>
<head>
	<title>Bài trắc nghiệm</title>
</head>
<body>
	<form action="" method="post">
		<?php for($i = 0; $i < count($questions); $i++) :?>
			<?php echo "Câu thứ " . ($i + 1) . " : " . $questions[$i]['question'] . '<br>' ;?>
			<?php for($j = 0; $j < count($options); $j++) :?>
				<?php if($options[$j]['question_id'] == $questions[$i]['id']) :?>
					<p>
						<input type="radio" name="<?php echo $questions[$i]['id'];?>" value = "A">
						<span>
							<?php echo 'A: ' . $options[$j]['options']['A'] ;?>
						</span>
					</p>

					<p>
						<input type="radio" name="<?php echo $questions[$i]['id'];?>" value = "B">
						<span>
							<?php echo 'B: ' . $options[$j]['options']['B'] ;?>
						</span>
					</p>

					<p>
						<input type="radio" name="<?php echo $questions[$i]['id'];?>" value = "C">
						<span>
							<?php echo 'C: ' . $options[$j]['options']['C'] ;?>
						</span>
					</p>

					<p>
						<input type="radio" name="<?php echo $questions[$i]['id'];?>" value = "D">
						<span>
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
$nonCheck = [];
$dung = [];
$sai = [];
if(isset($_POST['submit'])){
	$data = $_POST;
	unset($data['submit']);
	print_r($data);
	for($a = 0; $a < count($questions); $a++){
		if(!isset($data[$a+1])) {
			$nonCheck[] = "câu ".($a+1)." chưa chọn";
		} else{
			if($questions[$a] == $answers[$a]['question_id']){
				if($questions[$a+1]['id'] == $answers['option']){
					$dung[] = 'câu ' . ($a+1) . ' đúng';
				} else{
					$sai[] = 'câu ' . ($a+1) . ' sai';
				}
			}
		}

//(!isset($data[$answers[$b]['question_id']))
		
	}
	var_dump($nonCheck);
	var_dump($dung);
	var_dump($sai);
	print_r($dung);
	print_r($sai);
}
?>
