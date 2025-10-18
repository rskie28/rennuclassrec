<?php
	session_start();
?>
<html>
	<head>
		<title>CLASS RECORD NI MAMA NIYO</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="css\style.css">
	</head>
	<body style="background-color: #FAF0E6">
		<div class="container-sm">
			<br><br>
			<center>
				<br>
				<h1 style="font-family: Arial Black; color: #0072bc;">
					CLASS RECORD NI MAMA NIYO
				</h1>
					
				<br>
				<div class="container w3-hover-green" style="background-color: #4EA46E; border-radius: 25px; max-width: 40%; display: block;">
					<br><br>
					<form name="loginForm" action="#" method="POST" onSubmit="return formValidation();return false;">
						<center>
							<input type="text" placeholder="Input Student Number" name="txtUser" required="required" class="form-control w3-hover-light-gray" style="border-radius: 25px; height: 50px; width: 100%;">
							<br>
							<input type="password" placeholder="Input Password" name="txtPass" required="required" class="form-control w3-hover-light-gray" style="border-radius: 25px; height: 50px; width: 100%;">
							<br>
							<input type="submit" value="Log In" name="btnLogIn" class="btn btn-primary" style="border-radius: 25px; width: 60%; height: 50px; font-size: 1vw;">
						</center>
						<br>
					</form>
				</div>
			</center>
		</div>
	</body>
</html>
<?php
	include("connection.php");

	if (isset($_POST['btnLogIn'])) {

		$username = $_POST['txtUser'];
		$password = $_POST['txtPass'];
		
		$sql = "SELECT * FROM users WHERE uName = '$username' AND pWord = '$password'";

		$res=$con->query($sql);

		if ($res->num_rows>0) {
			$_SESSION['uName'] = $username;
			$_SESSION['pWord'] = $password;

			$row=$res->fetch_assoc();

			Print '<script>alert("Login Successful!"); </script>';

			if ($row['type'] == 0) {
				Print '<script>window.location.assign("teacherGrading.php"); </script>';
			}
			else if ($row['type'] == 1) {
				Print '<script>window.location.assign("studentView.php"); </script>';
			}
		} 
		else {
			Print '<script>alert("Incorrect Username or Password!"); </script>';
		}
	}
?>