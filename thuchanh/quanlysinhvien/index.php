<?php  
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
require('connection.php');
$title = "Trang chủ";
include("header.php");
$error = [];
?>

<div class="content" style="padding-top: 20px;">
	<div class="container">
		<center>
			<table class="table" border="1px">
				<thead class="thead-dark">
			    	<tr>
			    		<th><h6>Danh sách</h6></th>
			    	</tr>
			  	</thead>
			  <tbody>
			    <tr>
			      <th scope="row"><a href="dslop.php" style="color: #d75335;text-decoration: none;"><i class="fas fa-eye"></i>Danh sách lớp</a></th>
			    </tr>
			    <tr>
			      <th scope="row"><a href="dssinhvien.php" style="color: #d75335;text-decoration: none;"><i class="fas fa-eye"></i>Danh sách sinh viên</a></th>
			    </tr>
			  </tbody>
			</table>
		</center>
	</div>
</div>

<?php 
	include("footer.php");
?>