<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION['uName']=="") {
		Print '<script>window.location.assign("index.php"); </script>';
	}
?>
<html>
	<head>
		<title>Student Grade</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="..\css\style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body style="background-color: #FAF0E6">
		<br>
		<a href="index.php"><img src="..\images\logoutbtn.png" style="height: 50px; width: 50px;"></a>
		<center><h3>Student Grade</h3></center>
		<br>
		<?php
			include("connection.php");
			$sql = "SELECT id
					FROM users
					WHERE uName = '".$_SESSION['uName']."'";

			$res=$con->query($sql);
			if($res->num_rows>0) {
				if($row=$res->fetch_assoc()){
					$_SESSION['studId'] = $row['id'];
				}
			}

			$sqlSubj = "SELECT DISTINCT g.sectionID
					FROM grades g, gradeperc gc
					WHERE g.stud_id = '".$_SESSION['studId']."'
					AND gc.sectionID = g.sectionID";

			$resSubj=$con->query($sqlSubj);
			if($resSubj->num_rows>0) {
				echo "<center><select id='subject'>";
					echo "<option value='0'>--Choose course--</option>";
					while($row=$resSubj->fetch_assoc()){
						echo "<option value='".$row['sectionID']."'>".$row['sectionID']."</option>";
					}
				echo "</select></center>";
			}
		?>
		<br>
		<center>
			<select id="selectTerm" onchange="myFuncSelect()">
				<option value="0">--Choose Term--</option>
				<option value="1">Midterm</option>
				<option value="2">Final</option>
			</select>
		</center>
		<p id="disp"></p>
		<iframe src="" id="iFrameGrade" style="height: 100vh; width: 100%;"></iframe>
	</body>
</html>
<script>
	$(document).ready(function(){
		$("select").change(function(){
			var $sg = document.getElementById("selectTerm").value;
			var $iFrameDisp = document.getElementById("iFrameGrade");
			var $subj = document.getElementById("subject").value;

			if($subj=="0") {
				alert("Choose the course!");
			} else {
				if ($sg==1) {
					$("iframe").attr("src","studentViewMidterm.php?id="+$subj);
				} else if ($sg==2) {
					$("iframe").attr("src","studentViewFinal.php?id="+$subj);
				}
			}
		});
	});
</script>