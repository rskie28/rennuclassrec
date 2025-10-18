<?php
	session_start();
?>
<html>
	<head>
		<title>Section Selection</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="css\style.css">
	</head>
	<body style="background-color: #FAF0E6">
		<div class="container-sm">
			<br><br>
			<h3>Choose a Subject:</h3>
			<table class="table table-striped">
				<?php
					include("connection.php");

					$secSQL = "SELECT * FROM courses";

					$res=$con->query($secSQL);

					if ($res->num_rows>0) {
						while($row=$res->fetch_assoc()){
							echo "<tr>
									<td>".$row['sectionID']."</td>
									<td>".$row['course_code']."</td>
									<td>".$row['course_name']."</td>
									<td>".$row['section']."</td>
									<td><a href='sectionGradingMidterm.php?id=".$row['sectionID']."'>Midterm</a></td>
									<td><a href='sectionGradingFinal.php?id=".$row['sectionID']."'>Finals</a></td>
							</tr>";
						}
					}
				?>
			</table>
		</div>
	</body>
</html>