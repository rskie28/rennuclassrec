<?php
	session_start();
?>
<html>
	<head>
		<title>Grades</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="..\css\style.css">
		<script src="..\js\jquery.js" type="text/javascript"></script>
	</head>
	<body style="background-color: #FAF0E6">
		<br>
		<div class="container-sm">
			<a href="teacherGrading.php"><img src="..\images\backbtn.png" style="height: 50px; width: 50px;"></a>
			<?php
				include("connection.php");

				$_SESSION['id'] = $_GET['id'];
				echo "<br><input type='text' name='txt_id' id='txt_id' value='".$_SESSION['id']."' hidden>";

				$sql = "SELECT * FROM courses c, gradeperc perc
						WHERE c.sectionID = '".$_SESSION['id']."'
						AND perc.sectionID = c.sectionID
						AND perc.term = 'M'";

				$res=$con->query($sql);

				if($res->num_rows>0) {
					if($row=$res->fetch_assoc()){
						echo "<h4><b>Section: </b>".$row['section']."</h4>";
						echo "<h4><b>Course Code: </b>".$row['course_code']."</h4>";
						echo "<h4><b>Course Name: </b>".$row['course_name']."</h4>";
						echo "<br><br>";
						echo "<table class='table table-striped'>
							<tr>
								<td>Seatwork</td>
								<td><form action='' method='POST'><input type='text' name='txt_sw' id='txt_sw' class='gradeTotal txtC' value='".$row['SWPerc']."'></td>
								<td>Exercise</td>
								<td><input type='text' name='txt_ex' id='txt_ex' class='gradeTotal txtC' value='".$row['EXPerc']."'></td>
								<td>Homework</td>
								<td><input type='text' name='txt_hw' id='txt_hw' class='gradeTotal txtC' value='".$row['HWPerc']."'></td>
								<td>Quiz</td>
								<td><input type='text' name='txt_qz' id='txt_qz' class='gradeTotal txtC' value='".$row['QZPerc']."'></td>
								<td>Other Activities</td>
								<td><input type='text' name='txt_oth' id='txt_oth' class='gradeTotal txtC' value='".$row['OTHPerc']."'></td>
								<td>Exam/Project</td>
								<td><input type='text' name='txt_pt' id='txt_pt' class='gradeTotal txtC' value='".$row['PTPerc']."'></td>
								<td><button name='btnUpdatePerc' id='btnUpdatePerc' class='btn btn-success'>Update Percentage</button></form></td>
							</tr>
						</table>";
					}
				}

				$sqlStuds = "SELECT * FROM gradeperc gp, grades g, actDetails ad
							WHERE gp.sectionID = '".$_SESSION['id']."'
							AND g.sectionID = gp.sectionID
							AND gp.sectionID = ad.sectionID
							AND gp.term = 'M'
							AND ad.term = 'M'";

				$resItems=$con->query($sqlStuds);
				echo "<center><h4>Total Items:</h4>";
				echo "<table class='table table-striped'>
					<tr>
						<th>Deliverable</th>
						<th>Total Items</th>
						<th>Details</th>
					</tr>
				";
				if($resItems->num_rows>0){
					if($row=$resItems->fetch_assoc()){
						echo "<form action='' method='POST'>
						<tr>
							<td>SW1</td>
							<td><input type='text' name='txt_sw1Total' id='txt_sw1Total' class='gradeTotal txtC' value='".$row['SW1Total']."'></td>
							<td><input type='text' name='txt_sw1deets' id='txt_sw1deets' class='txtDeets' value='".$row['SW1_deets']."'></td>
						</tr>
						<tr>
							<td>SW2</td>
							<td><input type='text' name='txt_sw2Total' id='txt_sw2Total' class='gradeTotal txtC' value='".$row['SW2Total']."'></td>
							<td><input type='text' name='txt_sw2deets' id='txt_sw2deets' class='txtDeets' value='".$row['SW2_deets']."'></td>
						</tr>
						<tr>
							<td>SW3</td>
							<td><input type='text' name='txt_sw3Total' id='txt_sw3Total' class='gradeTotal txtC' value='".$row['SW3Total']."'></td>
							<td><input type='text' name='txt_sw3deets' id='txt_sw3deets' class='txtDeets' value='".$row['SW3_deets']."'></td>
						</tr>
						<tr>
							<td>SW4</td>
							<td><input type='text' name='txt_sw4Total' id='txt_sw4Total' class='gradeTotal txtC' value='".$row['SW4Total']."'></td>
							<td><input type='text' name='txt_sw4deets' id='txt_sw4deets' class='txtDeets' value='".$row['SW4_deets']."'></td>
						</tr>
						<tr>
							<td>SW5</td>
							<td><input type='text' name='txt_sw5Total' id='txt_sw5Total' class='gradeTotal txtC' value='".$row['SW5Total']."'></td>
							<td><input type='text' name='txt_sw5deets' id='txt_sw5deets' class='txtDeets' value='".$row['SW5_deets']."'></td>
						</tr>
						<tr>
							<td>SW6</td>
							<td><input type='text' name='txt_sw6Total' id='txt_sw6Total' class='gradeTotal txtC' value='".$row['SW6Total']."'></td>
							<td><input type='text' name='txt_sw6deets' id='txt_sw6deets' class='txtDeets' value='".$row['SW6_deets']."'></td>
						</tr>
						<tr>
							<td>EX1</td>
							<td><input type='text' name='txt_ex1Total' id='txt_ex1Total' class='gradeTotal txtC' value='".$row['EX1Total']."'></td>
							<td><input type='text' name='txt_ex1deets' id='txt_ex1deets' class='txtDeets' value='".$row['EX1_deets']."'></td>
						</tr>
						<tr>
							<td>EX2</td>
							<td><input type='text' name='txt_ex2Total' id='txt_ex2Total' class='gradeTotal txtC' value='".$row['EX2Total']."'></td>
							<td><input type='text' name='txt_ex2deets' id='txt_ex2deets' class='txtDeets' value='".$row['EX2_deets']."'></td>
						</tr>
						<tr>
							<td>EX3</td>
							<td><input type='text' name='txt_ex3Total' id='txt_ex3Total' class='gradeTotal txtC' value='".$row['EX3Total']."'></td>
							<td><input type='text' name='txt_ex3deets' id='txt_ex3deets' class='txtDeets' value='".$row['EX3_deets']."'></td>
						</tr>
						<tr>
							<td>EX4</td>
							<td><input type='text' name='txt_ex4Total' id='txt_ex4Total' class='gradeTotal txtC' value='".$row['EX4Total']."'></td>
							<td><input type='text' name='txt_ex4deets' id='txt_ex4deets' class='txtDeets' value='".$row['EX4_deets']."'></td>
						</tr>
						<tr>
							<td>EX5</td>
							<td><input type='text' name='txt_ex5Total' id='txt_ex5Total' class='gradeTotal txtC' value='".$row['EX5Total']."'></td>
							<td><input type='text' name='txt_ex5deets' id='txt_ex5deets' class='txtDeets' value='".$row['EX5_deets']."'></td>
						</tr>
						<tr>
							<td>EX6</td>
							<td><input type='text' name='txt_ex6Total' id='txt_ex6Total' class='gradeTotal txtC' value='".$row['EX6Total']."'></td>
							<td><input type='text' name='txt_ex6deets' id='txt_ex6deets' class='txtDeets' value='".$row['EX6_deets']."'></td>
						</tr>
						<tr>
							<td>HW1</td>
							<td><input type='text' name='txt_hw1Total' id='txt_hw1Total' class='gradeTotal txtC' value='".$row['HW1Total']."'></td>
							<td><input type='text' name='txt_hw1deets' id='txt_hw1deets' class='txtDeets' value='".$row['HW1_deets']."'></td>
						</tr>
						<tr>
							<td>HW2</td>
							<td><input type='text' name='txt_hw2Total' id='txt_hw2Total' class='gradeTotal txtC' value='".$row['HW2Total']."'></td>
							<td><input type='text' name='txt_hw2deets' id='txt_hw2deets' class='txtDeets' value='".$row['HW2_deets']."'></td>
						</tr>
						<tr>
							<td>HW3</td>
							<td><input type='text' name='txt_hw3Total' id='txt_hw3Total' class='gradeTotal txtC' value='".$row['HW3Total']."'></td>
							<td><input type='text' name='txt_hw3deets' id='txt_hw3deets' class='txtDeets' value='".$row['HW3_deets']."'></td>
						</tr>
						<tr>
							<td>HW4</td>
							<td><input type='text' name='txt_hw4Total' id='txt_hw4Total' class='gradeTotal txtC' value='".$row['HW4Total']."'></td>
							<td><input type='text' name='txt_hw4deets' id='txt_hw4deets' class='txtDeets' value='".$row['HW4_deets']."'></td>
						</tr>
						<tr>
							<td>HW5</td>
							<td><input type='text' name='txt_hw5Total' id='txt_hw5Total' class='gradeTotal txtC' value='".$row['HW5Total']."'></td>
							<td><input type='text' name='txt_hw5deets' id='txt_hw5deets' class='txtDeets' value='".$row['HW5_deets']."'></td>
						</tr>
						<tr>
							<td>HW6</td>
							<td><input type='text' name='txt_hw6Total' id='txt_hw6Total' class='gradeTotal txtC' value='".$row['HW6Total']."'></td>
							<td><input type='text' name='txt_hw6deets' id='txt_hw6deets' class='txtDeets' value='".$row['HW6_deets']."'></td>
						</tr>
						<tr>
							<td>QZ1</td>
							<td><input type='text' name='txt_qz1Total' id='txt_qz1Total' class='gradeTotal txtC' value='".$row['QZ1Total']."'></td>
							<td><input type='text' name='txt_qz1deets' id='txt_qz1deets' class='txtDeets' value='".$row['QZ1_deets']."'></td>
						</tr>
						<tr>
							<td>QZ2</td>
							<td><input type='text' name='txt_qz2Total' id='txt_qz2Total' class='gradeTotal txtC' value='".$row['QZ2Total']."'></td>
							<td><input type='text' name='txt_qz2deets' id='txt_qz2deets' class='txtDeets' value='".$row['QZ2_deets']."'></td>
						</tr>
						<tr>
							<td>QZ3</td>
							<td><input type='text' name='txt_qz3Total' id='txt_qz3Total' class='gradeTotal txtC' value='".$row['QZ3Total']."'></td>
							<td><input type='text' name='txt_qz3deets' id='txt_qz3deets' class='txtDeets' value='".$row['QZ3_deets']."'></td>
						</tr>
						<tr>
							<td>QZ4</td>
							<td><input type='text' name='txt_qz4Total' id='txt_qz4Total' class='gradeTotal txtC' value='".$row['QZ4Total']."'></td>
							<td><input type='text' name='txt_qz4deets' id='txt_qz4deets' class='txtDeets' value='".$row['QZ4_deets']."'></td>
						</tr>
						<tr>
							<td>QZ5</td>
							<td><input type='text' name='txt_qz5Total' id='txt_qz5Total' class='gradeTotal txtC' value='".$row['QZ5Total']."'></td>
							<td><input type='text' name='txt_qz5deets' id='txt_qz5deets' class='txtDeets' value='".$row['QZ5_deets']."'></td>
						</tr>
						<tr>
							<td>QZ6</td>
							<td><input type='text' name='txt_qz6Total' id='txt_qz6Total' class='gradeTotal txtC' value='".$row['QZ6Total']."'></td>
							<td><input type='text' name='txt_qz6deets' id='txt_qz6deets' class='txtDeets' value='".$row['QZ6_deets']."'></td>
						</tr>
						<tr>
							<td>OTH1</td>
							<td><input type='text' name='txt_oth1Total' id='txt_oth1Total' class='gradeTotal txtC' value='".$row['OTH1Total']."'></td>
							<td><input type='text' name='txt_oth1deets' id='txt_oth1deets' class='txtDeets' value='".$row['OTH1_deets']."'></td>
						</tr>
						<tr>
							<td>OTH2</td>
							<td><input type='text' name='txt_oth2Total' id='txt_oth2Total' class='gradeTotal txtC' value='".$row['OTH2Total']."'></td>
							<td><input type='text' name='txt_oth2deets' id='txt_oth2deets' class='txtDeets' value='".$row['OTH2_deets']."'></td>
						</tr>
						<tr>
							<td>OTH3</td>
							<td><input type='text' name='txt_oth3Total' id='txt_oth3Total' class='gradeTotal txtC' value='".$row['OTH3Total']."'></td>
							<td><input type='text' name='txt_oth3deets' id='txt_oth3deets' class='txtDeets' value='".$row['OTH3_deets']."'></td>
						</tr>
						<tr>
							<td>OTH4</td>
							<td><input type='text' name='txt_oth4Total' id='txt_oth4Total' class='gradeTotal txtC' value='".$row['OTH4Total']."'></td>
							<td><input type='text' name='txt_oth4deets' id='txt_oth4deets' class='txtDeets' value='".$row['OTH4_deets']."'></td>
						</tr>
						<tr>
							<td>OTH5</td>
							<td><input type='text' name='txt_oth5Total' id='txt_oth5Total' class='gradeTotal txtC' value='".$row['OTH5Total']."'></td>
							<td><input type='text' name='txt_oth5deets' id='txt_oth5deets' class='txtDeets' value='".$row['OTH5_deets']."'></td>
						</tr>
						<tr>
							<td>OTH6</td>
							<td><input type='text' name='txt_oth6Total' id='txt_oth6Total' class='gradeTotal txtC' value='".$row['OTH6Total']."'></td>
							<td><input type='text' name='txt_oth6deets' id='txt_oth6deets' class='txtDeets' value='".$row['OTH6_deets']."'></td>
						</tr>
						<tr>
							<td>OTH7</td>
							<td><input type='text' name='txt_oth7Total' id='txt_oth7Total' class='gradeTotal txtC' value='".$row['OTH7Total']."'></td>
							<td><input type='text' name='txt_oth7deets' id='txt_oth7deets' class='txtDeets' value='".$row['OTH7_deets']."'></td>
						</tr>
						<tr>
							<td>OTH8</td>
							<td><input type='text' name='txt_oth8Total' id='txt_oth8Total' class='gradeTotal txtC' value='".$row['OTH8Total']."'></td>
							<td><input type='text' name='txt_oth8deets' id='txt_oth8deets' class='txtDeets' value='".$row['OTH8_deets']."'></td>
						</tr>
						<tr>
							<td>PT1</td>
							<td><input type='text' name='txt_pt1Total' id='txt_pt1Total' class='gradeTotal txtC' value='".$row['PT1Total']."'></td>
							<td><input type='text' name='txt_pt1deets' id='txt_pt1deets' class='txtDeets' value='".$row['PT1_deets']."'></td>
						</tr>
						<tr>
							<td>PT2</td>
							<td><input type='text' name='txt_pt2Total' id='txt_pt2Total' class='gradeTotal txtC' value='".$row['PT2Total']."'></td>
							<td><input type='text' name='txt_pt2deets' id='txt_pt2deets' class='txtDeets' value='".$row['PT2_deets']."'></td>
						</tr>";
					}
				}
				echo "</table>";
				echo "<button class='btn btn-success' name='btnUpdateItemInfo' id='btnUpdateItemInfo'>Update Total</button></center></form>";

				/*echo "<h4>Scores:</h4>";
				echo "<table class='table table-striped tblGrades'>
					<tr>
						<td>Student ID</td>
						<td>Name</td>
						<td>SW1</td>
						<td>SW2</td>
						<td>SW3</td>
						<td>SW4</td>
						<td>SW5</td>
						<td>SW6</td>
						<td>EX1</td>
						<td>EX2</td>
						<td>EX3</td>
						<td>EX4</td>
						<td>EX5</td>
						<td>EX6</td>
						<td>HW1</td>
						<td>HW2</td>
						<td>HW3</td>
						<td>HW4</td>
						<td>HW5</td>
						<td>HW6</td>
						<td>QZ1</td>
						<td>QZ2</td>
						<td>QZ3</td>
						<td>QZ4</td>
						<td>QZ5</td>
						<td>QZ6</td>
						<td>OTH1</td>
						<td>OTH2</td>
						<td>OTH3</td>
						<td>OTH4</td>
						<td>OTH5</td>
						<td>OTH6</td>
						<td>OTH7</td>
						<td>OTH8</td>
						<td>PT1</td>
						<td>PT2</td>
					</tr>
				";

				$sqlStuds = "SELECT * FROM stud_info si, grades g
							WHERE si.stud_id = g.stud_id
							AND g.sectionID = '".$_SESSION['id']."'
							ORDER BY si.stud_lName
				";
				$resStuds=$con->query($sqlStuds);
				if($resStuds->num_rows>0){
					while($row=$resStuds->fetch_assoc()){
						echo "<tr>
							<td><input type='text' name='txt_id' id='txt_id' value='".$row['stud_id']."' style='border: none; width: 90px;' disabled/></td>
							<td class='tdName'><input type='text' name='txt_name' id='txt_name' value='".$row['stud_lName'].", ".$row['stud_gName']." ".$row['stud_mName']."' style='border: none; width: 200px;' disabled/></td>
							<td><input type='text' name='txt_sw1' id='txt_sw1' class='gradeTotal txtC' value='".$row['SW1']."'></td>
							<td><input type='text' name='txt_sw2' id='txt_sw2' class='gradeTotal txtC' value='".$row['SW2']."'></td>
							<td><input type='text' name='txt_sw3' id='txt_sw3' class='gradeTotal txtC' value='".$row['SW3']."'></td>
							<td><input type='text' name='txt_sw4' id='txt_sw4' class='gradeTotal txtC' value='".$row['SW4']."'></td>
							<td><input type='text' name='txt_sw5' id='txt_sw5' class='gradeTotal txtC' value='".$row['SW5']."'></td>
							<td><input type='text' name='txt_sw6' id='txt_sw6' class='gradeTotal txtC' value='".$row['SW6']."'></td>
							<td><input type='text' name='txt_ex1' id='txt_ex1' class='gradeTotal txtC' value='".$row['EX1']."'></td>
							<td><input type='text' name='txt_ex2' id='txt_ex2' class='gradeTotal txtC' value='".$row['EX2']."'></td>
							<td><input type='text' name='txt_ex3' id='txt_ex3' class='gradeTotal txtC' value='".$row['EX3']."'></td>
							<td><input type='text' name='txt_ex4' id='txt_ex4' class='gradeTotal txtC' value='".$row['EX4']."'></td>
							<td><input type='text' name='txt_ex5' id='txt_ex5' class='gradeTotal txtC' value='".$row['EX5']."'></td>
							<td><input type='text' name='txt_ex6' id='txt_ex6' class='gradeTotal txtC' value='".$row['EX6']."'></td>
							<td><input type='text' name='txt_hw1' id='txt_hw1' class='gradeTotal txtC' value='".$row['HW1']."'></td>
							<td><input type='text' name='txt_hw2' id='txt_hw2' class='gradeTotal txtC' value='".$row['HW2']."'></td>
							<td><input type='text' name='txt_hw3' id='txt_hw3' class='gradeTotal txtC' value='".$row['HW3']."'></td>
							<td><input type='text' name='txt_hw4' id='txt_hw4' class='gradeTotal txtC' value='".$row['HW4']."'></td>
							<td><input type='text' name='txt_hw5' id='txt_hw5' class='gradeTotal txtC' value='".$row['HW5']."'></td>
							<td><input type='text' name='txt_hw6' id='txt_hw6' class='gradeTotal txtC' value='".$row['HW6']."'></td>
							<td><input type='text' name='txt_qz1' id='txt_qz1' class='gradeTotal txtC' value='".$row['QZ1']."'></td>
							<td><input type='text' name='txt_qz2' id='txt_qz2' class='gradeTotal txtC' value='".$row['QZ2']."'></td>
							<td><input type='text' name='txt_qz3' id='txt_qz3' class='gradeTotal txtC' value='".$row['QZ3']."'></td>
							<td><input type='text' name='txt_qz4' id='txt_qz4' class='gradeTotal txtC' value='".$row['QZ4']."'></td>
							<td><input type='text' name='txt_qz5' id='txt_qz5' class='gradeTotal txtC' value='".$row['QZ5']."'></td>
							<td><input type='text' name='txt_qz6' id='txt_qz6' class='gradeTotal txtC' value='".$row['QZ6']."'></td>
							<td><input type='text' name='txt_oth1' id='txt_oth1' class='gradeTotal txtC' value='".$row['OTH1']."'></td>
							<td><input type='text' name='txt_oth2' id='txt_oth2' class='gradeTotal txtC' value='".$row['OTH2']."'></td>
							<td><input type='text' name='txt_oth3' id='txt_oth3' class='gradeTotal txtC' value='".$row['OTH3']."'></td>
							<td><input type='text' name='txt_oth4' id='txt_oth4' class='gradeTotal txtC' value='".$row['OTH4']."'></td>
							<td><input type='text' name='txt_oth5' id='txt_oth5' class='gradeTotal txtC' value='".$row['OTH5']."'></td>
							<td><input type='text' name='txt_oth6' id='txt_oth6' class='gradeTotal txtC' value='".$row['OTH6']."'></td>
							<td><input type='text' name='txt_oth7' id='txt_oth7' class='gradeTotal txtC' value='".$row['OTH7']."'></td>
							<td><input type='text' name='txt_oth8' id='txt_oth8' class='gradeTotal txtC' value='".$row['OTH8']."'></td>
							<td><input type='text' name='txt_pt1' id='txt_pt1' class='gradeTotal txtC' value='".$row['PT1']."'></td>
							<td><input type='text' name='txt_pt2' id='txt_pt2' class='gradeTotal txtC' value='".$row['PT2']."'></td>
						</tr>";

					}
				}
				echo "</table>";
				echo "<center><button class='btn btn-info'>Save</button></center>";
				*/
			?>
		</div>
	</body>
</html>
<?php
	include("connection.php");

	if (isset($_POST['btnUpdatePerc'])) {
		$sw = $_POST['txt_sw'];
		$ex = $_POST['txt_ex'];
		$hw = $_POST['txt_hw'];
		$qz = $_POST['txt_qz'];
		$oth = $_POST['txt_oth'];
		$pt = $_POST['txt_pt'];

		$sqlUpdatePerc = "UPDATE gradeperc SET SWPerc = ".$sw.", EXPerc = ".$ex.", HWPerc = ".$hw.", QZPerc = ".$qz.", OTHPerc = ".$oth.", PTPerc = ".$pt." WHERE sectionID = '".$_SESSION['id']."' AND term = 'M'";

		if(($sw+$ex+$hw+$qz+$oth+$pt != 100)) {
			Print '<script>alert("Total percentage not equal to 100!"); </script>';
		} else {
			if($con->query($sqlUpdatePerc)==TRUE) {
				Print '<script>alert("Percentages updated!"); </script>';
				Print '<script>window.location.assign("sectionGradingMidterm.php?id='.$_SESSION['id'].'"); </script>';
			} else {
				Print '<script>alert("Percentages NOT UPDATED!"); </script>';
			}
		}
	}

	if (isset($_POST['btnUpdateItemInfo'])) {
		$sw1t = $_POST['txt_sw1Total'];
		$sw2t = $_POST['txt_sw2Total'];
		$sw3t = $_POST['txt_sw3Total'];
		$sw4t = $_POST['txt_sw4Total'];
		$sw5t = $_POST['txt_sw5Total'];
		$sw6t = $_POST['txt_sw6Total'];
		$ex1t = $_POST['txt_ex1Total'];
		$ex2t = $_POST['txt_ex2Total'];
		$ex3t = $_POST['txt_ex3Total'];
		$ex4t = $_POST['txt_ex4Total'];
		$ex5t = $_POST['txt_ex5Total'];
		$ex6t = $_POST['txt_ex6Total'];
		$hw1t = $_POST['txt_hw1Total'];
		$hw2t = $_POST['txt_hw2Total'];
		$hw3t = $_POST['txt_hw3Total'];
		$hw4t = $_POST['txt_hw4Total'];
		$hw5t = $_POST['txt_hw5Total'];
		$hw6t = $_POST['txt_hw6Total'];
		$qz1t = $_POST['txt_qz1Total'];
		$qz2t = $_POST['txt_qz2Total'];
		$qz3t = $_POST['txt_qz3Total'];
		$qz4t = $_POST['txt_qz4Total'];
		$qz5t = $_POST['txt_qz5Total'];
		$qz6t = $_POST['txt_qz6Total'];
		$oth1t = $_POST['txt_oth1Total'];
		$oth2t = $_POST['txt_oth2Total'];
		$oth3t = $_POST['txt_oth3Total'];
		$oth4t = $_POST['txt_oth4Total'];
		$oth5t = $_POST['txt_oth5Total'];
		$oth6t = $_POST['txt_oth6Total'];
		$oth7t = $_POST['txt_oth7Total'];
		$oth8t = $_POST['txt_oth8Total'];
		$pt1t = $_POST['txt_pt1Total'];
		$pt2t = $_POST['txt_pt2Total'];
		$sw1d = $_POST['txt_sw1deets'];
		$sw2d = $_POST['txt_sw2deets'];
		$sw3d = $_POST['txt_sw3deets'];
		$sw4d = $_POST['txt_sw4deets'];
		$sw5d = $_POST['txt_sw5deets'];
		$sw6d = $_POST['txt_sw6deets'];
		$ex1d = $_POST['txt_ex1deets'];
		$ex2d = $_POST['txt_ex2deets'];
		$ex3d = $_POST['txt_ex3deets'];
		$ex4d = $_POST['txt_ex4deets'];
		$ex5d = $_POST['txt_ex5deets'];
		$ex6d = $_POST['txt_ex6deets'];
		$hw1d = $_POST['txt_hw1deets'];
		$hw2d = $_POST['txt_hw2deets'];
		$hw3d = $_POST['txt_hw3deets'];
		$hw4d = $_POST['txt_hw4deets'];
		$hw5d = $_POST['txt_hw5deets'];
		$hw6d = $_POST['txt_hw6deets'];
		$qz1d = $_POST['txt_qz1deets'];
		$qz2d = $_POST['txt_qz2deets'];
		$qz3d = $_POST['txt_qz3deets'];
		$qz4d = $_POST['txt_qz4deets'];
		$qz5d = $_POST['txt_qz5deets'];
		$qz6d = $_POST['txt_qz6deets'];
		$oth1d = $_POST['txt_oth1deets'];
		$oth2d = $_POST['txt_oth2deets'];
		$oth3d = $_POST['txt_oth3deets'];
		$oth4d = $_POST['txt_oth4deets'];
		$oth5d = $_POST['txt_oth5deets'];
		$oth6d = $_POST['txt_oth6deets'];
		$oth7d = $_POST['txt_oth7deets'];
		$oth8d = $_POST['txt_oth8deets'];
		$pt1d = $_POST['txt_pt1deets'];
		$pt2d = $_POST['txt_pt2deets'];

		echo "nyaw";

		$sqlUpdateTotal = "UPDATE gradePerc gp, actdetails ad SET 
			gp.SW1Total = ".$sw1t.", gp.SW2Total = ".$sw2t.", gp.SW3Total = ".$sw3t.", gp.SW4Total = ".$sw4t.", gp.SW5Total = ".$sw5t.", gp.SW6Total = ".$sw6t.",
			gp.EX1Total = ".$ex1t.", gp.EX2Total = ".$ex2t.", gp.EX3Total = ".$ex3t.", gp.EX4Total = ".$ex4t.", gp.EX5Total = ".$ex5t.", gp.EX6Total = ".$ex6t.",
			gp.HW1Total = ".$hw1t.", gp.HW2Total = ".$hw2t.", gp.HW3Total = ".$hw3t.", gp.HW4Total = ".$hw4t.", gp.HW5Total = ".$hw5t.", gp.HW6Total = ".$hw6t.",
			gp.QZ1Total = ".$qz1t.", gp.QZ2Total = ".$qz2t.", gp.QZ3Total = ".$qz3t.", gp.QZ4Total = ".$qz4t.", gp.QZ5Total = ".$qz5t.", gp.QZ6Total = ".$qz6t.",
			gp.OTH1Total = ".$oth1t.", gp.OTH2Total = ".$oth2t.", gp.OTH3Total = ".$oth3t.", gp.OTH4Total = ".$oth4t.", gp.OTH5Total = ".$oth5t.", gp.OTH6Total = ".$oth6t.", gp.OTH7Total = ".$oth7t.", gp.OTH8Total = ".$oth8t.",
			gp.PT1Total = ".$pt1t.", gp.PT2Total = ".$pt2t.",
			ad.SW1_deets = '".$sw1d."', ad.SW2_deets = '".$sw2d."',
				ad.SW3_deets = '".$sw3d."', ad.SW4_deets = '".$sw4d."',
				ad.SW5_deets = '".$sw5d."', ad.SW6_deets = '".$sw6d."',
			ad.EX1_deets = '".$ex1d."', ad.EX2_deets = '".$ex2d."',
				ad.EX3_deets = '".$ex3d."', ad.EX4_deets = '".$ex4d."',
				ad.EX5_deets = '".$ex5d."', ad.EX6_deets = '".$ex6d."',
			ad.HW1_deets = '".$hw1d."', ad.HW2_deets = '".$hw2d."',
				ad.HW3_deets = '".$hw3d."', ad.HW4_deets = '".$hw4d."',
				ad.HW5_deets = '".$hw5d."', ad.HW6_deets = '".$hw6d."',
			ad.QZ1_deets = '".$qz1d."', ad.QZ2_deets = '".$qz2d."',
				ad.QZ3_deets = '".$qz3d."', ad.QZ4_deets = '".$qz4d."',
				ad.QZ5_deets = '".$qz5d."', ad.QZ6_deets = '".$qz6d."',
			ad.OTH1_deets = '".$oth1d."', ad.OTH2_deets = '".$oth2d."',
				ad.OTH3_deets = '".$oth3d."', ad.OTH4_deets = '".$oth4d."',
				ad.OTH5_deets = '".$oth5d."', ad.OTH6_deets = '".$oth6d."',
				ad.OTH7_deets = '".$oth7d."', ad.OTH8_deets = '".$oth8d."',
			ad.PT1_deets = '".$pt1d."', ad.PT2_deets = '".$pt2d."'
			WHERE gp.sectionID = '".$_SESSION['id']."'
				AND ad.sectionID = '".$_SESSION['id']."'
				AND gp.term = 'M'
				AND ad.term = 'M'
		";

		if($con->query($sqlUpdateTotal)==TRUE) {
			Print '<script>alert("Item updated!"); </script>';
			Print '<script>window.location.assign("sectionGradingMidterm.php?id='.$_SESSION['id'].'"); </script>';
		} else {
			Print '<script>alert("Item NOT UPDATED!"); </script>';
		}
	}
?>