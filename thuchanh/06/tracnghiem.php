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
// $arrayQuestionId = [];
// for($i = 0; $i < count())
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bài tập trắc nghiệm</title>
</head>
<body>
	<h1>Trắc nghiệm</h1>
	<form action="" method="post">
		<?php
			//thuat toan
			for($i = 0; $i < 8; $i++){ //i: số câu
				echo "Câu thứ " . ($i + 1 ) . " : " . $questions[$i]['question'] . '<br>';
				for($j = 0; $j < 8; $j++){ //j: số đáp án
					if($options[$j]['question_id'] == $questions[$i]['id']){
						echo '<input type="radio" name = <?php echo $questios[$i]['id'];?>  value = "A" >' . 'A: ' . $options[$j]['options']['A'] . '<br>';
						echo '<input type="radio" name = <?php echo $questios[$i]['id'];?>   value = "B" >' . 'B: ' . $options[$j]['options']['B'] . '<br>';
			        	echo '<input type="radio" name = <?php echo $questios[$i]['id'];?>   value = "C" >' . 'C: ' . $options[$j]['options']['C'] . '<br>';
			        	echo '<input type="radio" name = <?php echo $questios[$i]['id'];?>   value = "D" >' . 'D: ' . $options[$j]['options']['D'] . '<br>';
			        	echo '<br>';
					}
				}
			} 
		;?>
		<input type="submit" name="submit" value="Kiểm tra đáp án">	
	</form>
</body>
</html>
<?php 
	$nonCheck = [];
	if(isset($_POST['submit'])){
		$data = $_POSST;
		unset($data['submit']);
		for($a = 0; $a < count($data); $a++){
			for($b = 0; $b < count($answers); $b++){
				//Tim nhung cau khong duoc chon
				echo $dat['q_' . $a];
			}
		}
}
?>