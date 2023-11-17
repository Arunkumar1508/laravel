<?php
session_start();
echo ' <h1>Welcome  :' . $_SESSION['name'] . '</h1>';
?>
<?php

$students = ' [
		{
			"name": "Car",
			"id": "1",
			"image":"./img/download.jpg",
			"price":1000
			
		},
		{
			"name": "Bike",
			"id": "2",
			"image":"./img/download (1).jpg",
			"price":2000
		},
		{
			"name": "Watch",
			"id": "3",
			"image":"./img/download (5).jpg",
			"price":3000
		},
		{
			"name": "Teddy",
			"id": "4",
			"image":"./img/download (3).jpg",
			"price":4000
		},
		{
			"name": "Flight",
			"id": "5",
			"image":"./img/download (4).jpg",
			"price":5000
		}
	]';


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>task php</title>
		<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/bootstrap-5.3.0-dist/css/bootstrap.min.css">
</head>

<body class="gh">
	<button class='btn btn-primary mt-2 '>
		<a href="index.php" class="text-light ">Back</a>
	</button>
	<div class="container">
		<div class="row">
			<?php


			if (!isset($_SESSION['name'])) {
				header('location:login.php');
			}
			$json = json_decode($students, true);

			foreach ($json as $key => $value): ?>



				<div class='col-md-4 mt-3 p-2'>
					<div class='card' style='width: 15rem;'>
						<img class='card-img-top' src='<?php echo $value['image'] ?>' width='150px' height='200px'>
						<div class='card-body'>
							<p>
								<?php echo $value['price'] ?>
							</p>
							<!-- <input type='number'><br> -->
							<form method='post'>
								<button type='submit' name='id' class='btn btn-primary mt-3'
									value="<?php echo $value['id'] ?>">Add</button>
							</form>
						</div>
					</div>
				</div>

			<?php endforeach; ?>
			<?php




			if (isset($_POST['submit'])) {

				$id = $_POST['submit'];

				echo $id;

			}
			?>
		</div>

		<div class='class1  '>
			<button class='btn btn-info'>
				<a href="cart.php" class="text-light">Add to cart</a>
			</button>

		</div>
	</div>
</body>
</html>

<?php 
// if(!isset($_POST['id'])){
// 	echo "card not added";
// }else{}

$ids=$_POST['id'];

if(!isset($_SESSION['card'])){
	$_SESSION['card']=[];
}
foreach($json as $val){
	if($val['id']==$ids){
		$_SESSION['card'][$ids]=$val;
	}
}
echo"<pre>";
// print_r($_SESSION['card']);
// session_destroy();

$encode=json_encode($_SESSION['card']);

$conn=mysqli_connect('localhost','root','','crud');
if(!$conn){
	echo"connection error".mysqli_connect_error();
}else{
	echo"connected sucessfully";
}
$username=$_SESSION['name'];
print_r($username);
  

// $sql="SELECT * FROM student WHERE name='$username'";
// $last=mysqli_query($conn,$sql);
// if($last==false){
// 	echo"user not in".$conn->error;
//  }else{

//  }


// else{
// 	$new=mysqli_fetch_assoc($last);
// 	print_r($new['card']);

// 	$value=$new['card'];
// 	print_r($value);
// 	if($value){
// 		$way=json_decode($_SESSION['card'],true);
// 		print_r($way);
// 		foreach($_SESSION['card'] as $val){
// 			array_push($way,$val);
// 		}
// 		$hlo=$json_encode($way,true);
// 		print_r($hlo);
// 		$update="UPDATE student  set card='$hlo' WHERE name='$username'";
// 		if($conn->query($update)==true){
// 			echo"update successfully";
// 		}else{
// 			echo"update failed";
// 		}
// 	}
// }





?>