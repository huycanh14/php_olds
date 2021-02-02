<?php 
// Gọi các data:
		require('answers.php');
		require('options.php');
		require('questions.php');
	/**
		$_POST là một mảng, các phần tử các key : name , value : value
	*/
	// Lấy giá trị bài làm từ người dùng. In ra để kiểm tra 
	/*
	echo "<prev>";
		print_r($_POST);
	echo "</prev>";
	*/
	// xóa phần tử submit không cần thiết
	unset($_POST['submit']);
	// In lại để xem:
	/*
	echo "<prev>";
		print_r($_POST);
	echo "</prev>";
	*/
	// Xử lý
	$bai_lam = 0;
	$bai_lam = $_POST ;
	$point = 0;
	foreach ($answers as $listAnswers) {
		foreach ($bai_lam as $key => $value) {
			if ($key == $listAnswers['question_id']) {
				if ($value == $listAnswers['option']) {
					$point++;
				}
			}
		}
	}
	echo "Bạn làm đúng :" . $point . 'câu!';

?>
<a href="index.php"> Xem lại bài làm</a>