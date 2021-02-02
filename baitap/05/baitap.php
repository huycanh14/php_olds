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

//ket qua nhap
$kqnhap = [];
if(isset($_POST['submit'])){
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bài trắc nghiệm</title>
</head>
<body>
	<!--<?php 
		//require('answers.php');
		//require('options.php');
		//require('questions.php');
	 ?>-->
	 <div class="message">
	 	<p>
	 		<?php 
	 			if (isset($error)) {
	 				echo "OK";
	 			}
	 		 ?>
	 	</p>
	 </div>
	 <form method="POST" action="result.php">
		<div class="container">
			<?php 
				foreach ($questions as $listQuestions) :
			 ?>
			<div class="items">
				<div class="id_question">
					<span>
						<?php 
							echo $listQuestions['id'] . '.';
						 ?>
					</span>
				</div>
				<div class="content">
					<div class="question">
						<p>
							<?php 
								echo $listQuestions['question'];
							 ?>
						</p>
					</div>
					<?php 
						foreach ($options as $listOptions) :
					 ?>
					<div class="mega_choice">
							<?php if($listQuestions['id'] == $listOptions['question_id']): ?>
						<div class="a">
							<input type="radio" name="<?php echo $listQuestions['id']; ?>" value="A">A.
							<span>
								<?php 
									echo $listOptions['options']['A'];
								 ?>
							</span>
						</div>
						<div class="b">
							<input type="radio" name="<?php echo $listQuestions['id']; ?>" value="B">B.
							<span>
								<?php 
									echo $listOptions['options']['B'];
								 ?>
							</span>
						</div>
						<div class="c">
							<input type="radio" name="<?php echo $listQuestions['id']; ?>" value="C">C.
							<span>
								<?php 
									echo $listOptions['options']['C'];
								 ?>
							</span>
						</div>
						<div class="d">
							<input type="radio" name="<?php echo $listQuestions['id']; ?>" value="D">D.
							<span>
								<?php 
									echo $listOptions['options']['D'];
								 ?>
							</span>
						</div>
							<?php endif ?>
					</div>
					<?php 
						endforeach;
					 ?>
				</div>
			</div>
			<?php 
				endforeach;
			 ?>
			 <div class="nop_bai">
			 	<input type="submit" name="submit">
			 </div>
		</div>
	</form>
	<?php 
		// In kết quả
		$error = '';
		if (isset($_POST['submit'])) {
			//Kiểm tra xem đã làm đủ các câu hỏi chưa ?
			if (count($_POST) != 8 ) {
				$error = 'Bạn chưa hoàn thành hết bài thi.';
				echo $error;
			} 
			
		}

	 ?>

</body>
</html>