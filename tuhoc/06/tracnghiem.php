<!DOCTYPE html>
<html>
<head>
	<title>Trắc nghiệm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	
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
			'question_id' => 6,
			'options' => ['A' => 'Nướng thịt', 'B' => 'Thái Thịt', 'C' => 'Cho con Bú', 'D' => 'Đấu vật'] 
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
	<img src='<?php echo $_GET["image"] ?>'>
	<a href="logout.php" style="color: red; font-size: 20px; padding-left: 500px;">Thoat</a>
	<div class="question">
		<span>Câu <?php echo $questions[0]["id"]; ?>:</span>
		<span><?php echo $questions[0]["question"]; ?></span>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[0]['id']; ?>" id="A<?php echo $questions[0]['id']; ?>"><span id="textA<?php echo $questions[0]['id']; ?>">A: <?php echo $options[0]['options']['A']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[0]['id']; ?>" id="B<?php echo $questions[0]['id']; ?>"><span id="textB<?php echo $questions[0]['id']; ?>">B: <?php echo $options[0]['options']['B']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[0]['id']; ?>" id="C<?php echo $questions[0]['id']; ?>"><span id="textC<?php echo $questions[0]['id']; ?>">C: <?php echo $options[0]['options']['C']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[0]['id']; ?>" id="D<?php echo $questions[0]['id']; ?>"><span id="textD<?php echo $questions[0]['id']; ?>">D: <?php echo $options[0]['options']['D']; ?></span>
		</div>
	</div>
	<div class="xemketqua">
		<button class="btn btn-success" onclick="check<?php echo $questions[0]['id']; ?>();">Xem kết quả</button>
		<hr>
	</div>

	<div class="question">
		<span>Câu <?php echo $questions[1]["id"]; ?>:</span>
		<span><?php echo $questions[1]["question"]; ?></span>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[1]['id']; ?>" id="A<?php echo $questions[1]['id']; ?>"><span id="textA<?php echo $questions[1]['id']; ?>">A: <?php echo $options[1]['options']['A']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[1]['id']; ?>" id="B<?php echo $questions[1]['id']; ?>"><span id="textB<?php echo $questions[1]['id']; ?>">B: <?php echo $options[1]['options']['B']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[1]['id']; ?>" id="C<?php echo $questions[1]['id']; ?>"><span id="textC<?php echo $questions[1]['id']; ?>">C: <?php echo $options[1]['options']['C']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[1]['id']; ?>" id="D<?php echo $questions[1]['id']; ?>"><span id="textD<?php echo $questions[1]['id']; ?>">D: <?php echo $options[1]['options']['D']; ?></span>
		</div>
	</div>
	<div class="xemketqua">
		<button class="btn btn-success" onclick="check<?php echo $questions[1]['id']; ?>();">Xem kết quả</button>
		<hr>
	</div>

	<div class="question">
		<span>Câu <?php echo $questions[2]["id"]; ?>:</span>
		<span><?php echo $questions[2]["question"]; ?></span>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[2]['id']; ?>" id="A<?php echo $questions[2]['id']; ?>"><span id="textA<?php echo $questions[2]['id']; ?>">A: <?php echo $options[2]['options']['A']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[2]['id']; ?>" id="B<?php echo $questions[2]['id']; ?>"><span id="textB<?php echo $questions[2]['id']; ?>">B: <?php echo $options[2]['options']['B']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[2]['id']; ?>" id="C<?php echo $questions[2]['id']; ?>"><span id="textC<?php echo $questions[2]['id']; ?>">C: <?php echo $options[2]['options']['C']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[2]['id']; ?>" id="D<?php echo $questions[2]['id']; ?>"><span id="textD<?php echo $questions[2]['id']; ?>">D: <?php echo $options[2]['options']['D']; ?></span>
		</div>
	</div>
	<div class="xemketqua">
		<button class="btn btn-success" onclick="check<?php echo $questions[2]['id']; ?>();">Xem kết quả</button>
		<hr>
	</div>

	<div class="question">
		<span>Câu <?php echo $questions[3]["id"]; ?>:</span>
		<span><?php echo $questions[3]["question"]; ?></span>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[3]['id']; ?>" id="A<?php echo $questions[3]['id']; ?>"><span id="textA<?php echo $questions[3]['id']; ?>">A: <?php echo $options[3]['options']['A']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[3]['id']; ?>" id="B<?php echo $questions[3]['id']; ?>"><span id="textB<?php echo $questions[3]['id']; ?>">B: <?php echo $options[3]['options']['B']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[3]['id']; ?>" id="C<?php echo $questions[3]['id']; ?>"><span id="textC<?php echo $questions[3]['id']; ?>">C: <?php echo $options[3]['options']['C']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[3]['id']; ?>" id="D<?php echo $questions[3]['id']; ?>"><span id="textD<?php echo $questions[3]['id']; ?>">D: <?php echo $options[3]['options']['D']; ?></span>
		</div>
	</div>
	<div class="xemketqua">
		<button class="btn btn-success" onclick="check<?php echo $questions[3]['id']; ?>();">Xem kết quả</button>
		<hr>
	</div>

	<div class="question">
		<span>Câu <?php echo $questions[4]["id"]; ?>:</span>
		<span><?php echo $questions[4]["question"]; ?></span>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[4]['id']; ?>" id="A<?php echo $questions[4]['id']; ?>"><span id="textA<?php echo $questions[4]['id']; ?>">A: <?php echo $options[4]['options']['A']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[4]['id']; ?>" id="B<?php echo $questions[4]['id']; ?>"><span id="textB<?php echo $questions[4]['id']; ?>">B: <?php echo $options[4]['options']['B']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[4]['id']; ?>" id="C<?php echo $questions[4]['id']; ?>"><span id="textC<?php echo $questions[4]['id']; ?>">C: <?php echo $options[4]['options']['C']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[4]['id']; ?>" id="D<?php echo $questions[4]['id']; ?>"><span id="textD<?php echo $questions[4]['id']; ?>">D: <?php echo $options[4]['options']['D']; ?></span>
		</div>
	</div>
	<div class="xemketqua">
		<button class="btn btn-success" onclick="check<?php echo $questions[4]['id']; ?>();">Xem kết quả</button>
		<hr>
	</div>

	<div class="question">
		<span>Câu <?php echo $questions[5]["id"]; ?>:</span>
		<span><?php echo $questions[5]["question"]; ?></span>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[5]['id']; ?>" id="A<?php echo $questions[5]['id']; ?>"><span id="textA<?php echo $questions[5]['id']; ?>">A: <?php echo $options[5]['options']['A']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[5]['id']; ?>" id="B<?php echo $questions[5]['id']; ?>"><span id="textB<?php echo $questions[5]['id']; ?>">B: <?php echo $options[5]['options']['B']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[5]['id']; ?>" id="C<?php echo $questions[5]['id']; ?>"><span id="textC<?php echo $questions[5]['id']; ?>">C: <?php echo $options[5]['options']['C']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[5]['id']; ?>" id="D<?php echo $questions[5]['id']; ?>"><span id="textD<?php echo $questions[5]['id']; ?>">D: <?php echo $options[5]['options']['D']; ?></span>
		</div>
	</div>
	<div class="xemketqua">
		<button class="btn btn-success" onclick="check<?php echo $questions[5]['id']; ?>();">Xem kết quả</button>
		<hr>
	</div>

	<div class="question">
		<span>Câu <?php echo $questions[6]["id"]; ?>:</span>
		<span><?php echo $questions[6]["question"]; ?></span>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[6]['id']; ?>" id="A<?php echo $questions[6]['id']; ?>"><span id="textA<?php echo $questions[6]['id']; ?>">A: <?php echo $options[6]['options']['A']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[6]['id']; ?>" id="B<?php echo $questions[6]['id']; ?>"><span id="textB<?php echo $questions[6]['id']; ?>">B: <?php echo $options[6]['options']['B']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[6]['id']; ?>" id="C<?php echo $questions[6]['id']; ?>"><span id="textC<?php echo $questions[6]['id']; ?>">C: <?php echo $options[6]['options']['C']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[6]['id']; ?>" id="D<?php echo $questions[6]['id']; ?>"><span id="textD<?php echo $questions[6]['id']; ?>">D: <?php echo $options[6]['options']['D']; ?></span>
		</div>
	</div>
	<div class="xemketqua">
		<button class="btn btn-success" onclick="check<?php echo $questions[6]['id']; ?>();">Xem kết quả</button>
		<hr>
	</div>

	<div class="question">
		<span>Câu <?php echo $questions[7]["id"]; ?>:</span>
		<span><?php echo $questions[7]["question"]; ?></span>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[7]['id']; ?>" id="A<?php echo $questions[7]['id']; ?>"><span id="textA<?php echo $questions[7]['id']; ?>">A: <?php echo $options[7]['options']['A']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[7]['id']; ?>" id="B<?php echo $questions[7]['id']; ?>"><span id="textB<?php echo $questions[7]['id']; ?>">B: <?php echo $options[7]['options']['B']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[7]['id']; ?>" id="C<?php echo $questions[7]['id']; ?>"><span id="textC<?php echo $questions[7]['id']; ?>">C: <?php echo $options[7]['options']['C']; ?></span>
		</div>
		<div class="col-sm-6">
			<input type="radio" name="A<?php echo $questions[7]['id']; ?>" id="D<?php echo $questions[7]['id']; ?>"><span id="textD<?php echo $questions[7]['id']; ?>">D: <?php echo $options[7]['options']['D']; ?></span>
		</div>
	</div>
	<div class="xemketqua">
		<button class="btn btn-success" onclick="check<?php echo $questions[7]['id']; ?>();">Xem kết quả</button>
		<hr>
	</div>

	
	<script type="text/javascript">
		<?php 
			for($i = 0;$i<=7;$i++)
			{
				if($i==1){
					echo "function check".$questions[$i]['id']."(){
			if(document.getElementById('A".$questions[$i]['id']."').checked){
				document.getElementById('textA". $questions[$i]['id']."').style.color = 'blue';
			}
			else{
				document.getElementById('textA". $questions[$i]['id']."').style.color = 'blue';
				if(document.getElementById('B". $questions[$i]['id']."').checked){
					document.getElementById('textB". $questions[$i]['id']."').style.color = 'red';
				}
				if(document.getElementById('C". $questions[$i]['id']."').checked){
					document.getElementById('textC". $questions[$i]['id']."').style.color = 'red';
				}
				if(document.getElementById('D". $questions[$i]['id']."').checked){
					document.getElementById('textD". $questions[$i]['id']."').style.color = 'red';
				}
				
			}
		}";
				}
				else if($i==0 || $i==2 || $i==4 || $i==5){
					echo "function check".$questions[$i]['id']."(){
			if(document.getElementById('C".$questions[$i]['id']."').checked){
				document.getElementById('textC". $questions[$i]['id']."').style.color = 'blue';
			}
			else{
				document.getElementById('textC". $questions[$i]['id']."').style.color = 'blue';
				if(document.getElementById('B". $questions[$i]['id']."').checked){
					document.getElementById('textB". $questions[$i]['id']."').style.color = 'red';
				}
				if(document.getElementById('A". $questions[$i]['id']."').checked){
					document.getElementById('textA". $questions[$i]['id']."').style.color = 'red';
				}
				if(document.getElementById('D". $questions[$i]['id']."').checked){
					document.getElementById('textD". $questions[$i]['id']."').style.color = 'red';
				}
				
			}
		}";
				}
				else if($i == 3){
					echo "function check".$questions[$i]['id']."(){
			if(document.getElementById('B".$questions[$i]['id']."').checked){
				document.getElementById('textB". $questions[$i]['id']."').style.color = 'blue';
			}
			else{
				document.getElementById('textB". $questions[$i]['id']."').style.color = 'blue';
				if(document.getElementById('A". $questions[$i]['id']."').checked){
					document.getElementById('textA". $questions[$i]['id']."').style.color = 'red';
				}
				if(document.getElementById('C". $questions[$i]['id']."').checked){
					document.getElementById('textC". $questions[$i]['id']."').style.color = 'red';
				}
				if(document.getElementById('D". $questions[$i]['id']."').checked){
					document.getElementById('textD". $questions[$i]['id']."').style.color = 'red';
				}
				
			}
		}";
				}
				else{
					echo "function check".$questions[$i]['id']."(){
			if(document.getElementById('D".$questions[$i]['id']."').checked){
				document.getElementById('textD". $questions[$i]['id']."').style.color = 'blue';
			}
			else{
				document.getElementById('textD". $questions[$i]['id']."').style.color = 'blue';
				if(document.getElementById('B". $questions[$i]['id']."').checked){
					document.getElementById('textB". $questions[$i]['id']."').style.color = 'red';
				}
				if(document.getElementById('C". $questions[$i]['id']."').checked){
					document.getElementById('textC". $questions[$i]['id']."').style.color = 'red';
				}
				if(document.getElementById('A". $questions[$i]['id']."').checked){
					document.getElementById('textA". $questions[$i]['id']."').style.color = 'red';
				}
				
			}
		}";
				}
			}
		 ?>
		function check(){
			if(document.getElementById('A<?php echo $questions[0]['id']; ?>').checked){
				document.getElementById('textA<?php echo $questions[0]['id']; ?>').style.color = 'blue';
			}
			else{
				document.getElementById('textA<?php echo $questions[0]['id']; ?>').style.color = 'blue';
				if(document.getElementById('B<?php echo $questions[0]['id']; ?>').checked){
					document.getElementById('textB<?php echo $questions[0]['id']; ?>').style.color = 'red';
				}
				else if(document.getElementById('C<?php echo $questions[0]['id']; ?>').checked){
					document.getElementById('textC<?php echo $questions[0]['id']; ?>').style.color = 'red';
				}
				else if(document.getElementById('D<?php echo $questions[0]['id']; ?>').checked){
					document.getElementById('textD<?php echo $questions[0]['id']; ?>').style.color = 'red';
				}
			}
		}
	</script>
	

</body>
</html>
