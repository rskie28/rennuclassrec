<!DOCTYPE html>
<?php
	session_start();
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
		<div class="container-sm">
			<?php
				include("connection.php");
				$section = $_GET['id'];

				$sql = "SELECT * FROM users u, stud_info si, grades g, courses c, gradeperc gc, actdetails ad
						WHERE u.uName = '".$_SESSION['uName']."'
						AND u.id = si.stud_id
						AND si.stud_id = g.stud_id
						AND g.sectionID = '$section'
						AND c.sectionID = '$section'
						AND gc.sectionID = '$section'
						AND g.term = 'M'
						AND g.term = gc.term
						AND ad.sectionID = '$section'
						AND ad.term = 'M'
				";

				$res=$con->query($sql);

				if ($res->num_rows>0) {
					if($row=$res->fetch_assoc()){
						echo "<h4>Student Name: <b>".$row['stud_lName'].", ".$row['stud_gName']." ".$row['stud_mName']."</b></h4>";
						echo "<h4>Section: <b>".$row['section']."</b></h4>";
						echo "<h4>Course: <b>".$row['course_name']."</b></h4>";
						//echo "<h4>Grading Percentage:</h4>";

						//computing total percentages
						/*$totalPerc = $row['SWPerc'] + $row['EXPerc'] + $row['HWPerc'] + $row['QZPerc'] + $row['OTHPerc'] + $row['PTPerc'];*/

						//computing total items
						$totalSWI = $row['SW1Total'] + $row['SW2Total'] + $row['SW3Total'] + $row['SW4Total'] + $row['SW5Total'] + $row['SW6Total'];
						$totalEXI = $row['EX1Total'] + $row['EX2Total'] + $row['EX3Total'] + $row['EX4Total'] + $row['EX5Total'] + $row['EX6Total'];
						$totalHWI = $row['HW1Total'] + $row['HW2Total'] + $row['HW3Total'] + $row['HW4Total'] + $row['HW5Total'] + $row['HW6Total'];
						$totalQZI = $row['QZ1Total'] + $row['QZ2Total'] + $row['QZ3Total'] + $row['QZ4Total'] + $row['QZ5Total'] + $row['QZ6Total'];
						$totalOTHI = $row['OTH1Total'] + $row['OTH2Total'] + $row['OTH3Total'] + $row['OTH4Total'] + $row['OTH5Total'] + $row['OTH6Total'] + $row['OTH7Total'] + $row['OTH8Total'];
						$totalPTI = $row['PT1Total'] + $row['PT2Total'];

						//computing total scores
						$totalSWS = $row['SW1'] + $row['SW2'] + $row['SW3'] + $row['SW4'] + $row['SW5'] + $row['SW6'];
						$totalEXS = $row['EX1'] + $row['EX2'] + $row['EX3'] + $row['EX4'] + $row['EX5'] + $row['EX6'];
						$totalHWS = $row['HW1'] + $row['HW2'] + $row['HW3'] + $row['HW4'] + $row['HW5'] + $row['HW6'];
						$totalQZS = $row['QZ1'] + $row['QZ2'] + $row['QZ3'] + $row['QZ4'] + $row['QZ5'] + $row['QZ6'];
						$totalOTHS = $row['OTH1'] + $row['OTH2'] + $row['OTH3'] + $row['OTH4'] + $row['OTH5'] + $row['OTH6'] + $row['OTH7'] + $row['OTH8'];
						$totalPTS = $row['PT1'] + $row['PT2'];

						//computing total scores * percentage in decimal
						if ($totalSWI!=0 OR $totalSWS!=0) {
							$totalSWP = ($totalSWS / $totalSWI) * ($row['SWPerc'] / 100);
						} else {
							$totalSWP = 0;
						}
						if ($totalEXI!=0 OR $totalEXS!=0) {
							$totalEXP = ($totalEXS / $totalEXI) * ($row['EXPerc'] / 100);
						} else {
							$totalEXP = 0;
						}
						if ($totalHWI!=0 OR $totalHWS!=0) {
							$totalHWP = ($totalHWS / $totalHWI) * ($row['HWPerc'] / 100);
						} else {
							$totalHWP = 0;
						}
						if ($totalQZI!=0 OR $totalQZS!=0) {
							$totalQZP = ($totalQZS / $totalQZI) * ($row['QZPerc'] / 100);
						} else {
							$totalQZP = 0;
						}
						if ($totalOTHI!=0 OR $totalOTHS!=0) {
							$totalOTHP = ($totalOTHS / $totalOTHI) * ($row['OTHPerc'] / 100);
						} else {
							$totalOTHP = 0;
						}
						if ($totalPTI!=0 OR $totalPTS!=0) {
							$totalPTP = ($totalPTS / $totalPTI) * ($row['PTPerc'] / 100);
						} else {
							$totalPTP = 0;
						}

						//adding all grades in decimal
						$totalGradeDec = $totalSWP + $totalEXP + $totalHWP + $totalQZP + $totalOTHP + $totalPTP;

						//decimal to perc
						$totalGradePerc = $totalGradeDec * 100;

						/*echo "<table class='table table-striped'>
							<tr>
								<td>Seatwork: <b>".$row['SWPerc']."%</b></td>
								<td>Exercises: <b>".$row['EXPerc']."%</b></td>
								<td>Homework: <b>".$row['HWPerc']."%</b></td>
								<td>Quizzes: <b>".$row['QZPerc']."%</b></td>
								<td>Other Activities: <b>".$row['OTHPerc']."%</b></td>
								<td>Exam/Final Project: <b>".$row['PTPerc']."%</b></td>
								<td>Total: <b>".$totalPerc."%</b></td>
							</tr>
						</table>";*/

						echo "<h4>Raw Scores:</h4>";
						echo "<table class='table table-striped tblGrades'>
							<tr>
								<th class='bRight' colspan = '4'>Seatwork (".$row['SWPerc']."%)</th>
								<th class='bRight' colspan = '4'>Exercises (".$row['EXPerc']."%)</th>
								<th class='bRight' colspan = '4'>Homework (".$row['HWPerc']."%)</th>
								<th class='bRight' colspan = '4'>Quizzes (".$row['QZPerc']."%)</th>
								<th class='bRight' colspan = '4'>Other Activities (".$row['OTHPerc']."%)</th>
								<th class='bRight' colspan = '4'>Exam/Final Project (".$row['PTPerc']."%)</th>
							</tr>
							<tr>
								<th>Item</th>
								<th>Total Item</th>
								<th>Score</th>
								<th class='bRight'>Details</th>
								<th>Item</th>
								<th>Total Item</th>
								<th>Score</th>
								<th class='bRight'>Details</th>
								<th>Item</th>
								<th>Total Item</th>
								<th>Score</th>
								<th class='bRight'>Details</th>
								<th>Item</th>
								<th>Total Item</th>
								<th>Score</th>
								<th class='bRight'>Details</th>
								<th>Item</th>
								<th>Total Item</th>
								<th>Score</th>
								<th class='bRight'>Details</th>
								<th>Item</th>
								<th>Total Item</th>
								<th>Score</th>
								<th class='bRight'>Details</th>
							</tr>
							<tr>
								<td>SW1</td><td>".$row['SW1Total']."</td><td>".$row['SW1']."</td><td class='bRight'>".$row['SW1_deets']."</td>
								<td>EX1</td><td>".$row['EX1Total']."</td><td>".$row['EX1']."</td><td class='bRight'>".$row['EX1_deets']."</td>
								<td>HW1</td><td>".$row['HW1Total']."</td><td>".$row['HW1']."</td><td class='bRight'>".$row['HW1_deets']."</td>
								<td>QZ1</td><td>".$row['QZ1Total']."</td><td>".$row['QZ1']."</td><td class='bRight'>".$row['QZ1_deets']."</td>
								<td>OTH1</td><td>".$row['OTH1Total']."</td><td>".$row['OTH1']."</td><td class='bRight'>".$row['OTH1_deets']."</td>
								<td>PT1</td><td>".$row['PT1Total']."</td><td>".$row['PT1']."
								</td><td class='bRight'>".$row['PT1_deets']."</td>
							</tr>
							<tr>
								<td>SW2</td><td>".$row['SW2Total']."</td><td>".$row['SW2']."</td><td class='bRight'>".$row['SW2_deets']."</td>
								<td>EX2</td><td>".$row['EX2Total']."</td><td>".$row['EX2']."</td><td class='bRight'>".$row['EX2_deets']."</td>
								<td>HW2</td><td>".$row['HW2Total']."</td><td>".$row['HW2']."</td><td class='bRight'>".$row['HW2_deets']."</td>
								<td>QZ2</td><td>".$row['QZ2Total']."</td><td>".$row['QZ2']."</td><td class='bRight'>".$row['QZ2_deets']."</td>
								<td>OTH2</td><td>".$row['OTH2Total']."</td><td>".$row['OTH2']."</td><td class='bRight'>".$row['OTH2_deets']."</td>
								<td>PT2</td><td>".$row['PT2Total']."</td><td>".$row['PT2']."
								</td><td class='bRight'>".$row['PT2_deets']."</td>
							</tr>
							<tr>
								<td>SW3</td><td>".$row['SW3Total']."</td><td>".$row['SW3']."</td><td class='bRight'>".$row['SW3_deets']."</td>
								<td>EX3</td><td>".$row['EX3Total']."</td><td>".$row['EX3']."</td><td class='bRight'>".$row['EX3_deets']."</td>
								<td>HW3</td><td>".$row['HW3Total']."</td><td>".$row['HW3']."</td><td class='bRight'>".$row['HW3_deets']."</td>
								<td>QZ3</td><td>".$row['QZ3Total']."</td><td>".$row['QZ3']."</td><td class='bRight'>".$row['QZ3_deets']."</td>
								<td>OTH3</td><td>".$row['OTH3Total']."</td><td>".$row['OTH3']."</td><td class='bRight'>".$row['OTH3_deets']."</td>
								<td></td><td></td><td></td><td class='bRight'></td>
							</tr>
							<tr>
								<td>SW4</td><td>".$row['SW4Total']."</td><td>".$row['SW4']."</td><td class='bRight'>".$row['SW4_deets']."</td>
								<td>EX4</td><td>".$row['EX4Total']."</td><td>".$row['EX4']."</td><td class='bRight'>".$row['EX4_deets']."</td>
								<td>HW4</td><td>".$row['HW4Total']."</td><td>".$row['HW4']."</td><td class='bRight'>".$row['HW4_deets']."</td>
								<td>QZ4</td><td>".$row['QZ4Total']."</td><td>".$row['QZ4']."</td><td class='bRight'>".$row['QZ4_deets']."</td>
								<td>OTH4</td><td>".$row['OTH4Total']."</td><td>".$row['OTH4']."</td><td class='bRight'>".$row['OTH4_deets']."</td>
								<td></td><td></td><td></td><td class='bRight'></td>
							</tr>
							<tr>
								<td>SW5</td><td>".$row['SW5Total']."</td><td>".$row['SW5']."</td><td class='bRight'>".$row['SW5_deets']."</td>
								<td>EX5</td><td>".$row['EX5Total']."</td><td>".$row['EX5']."</td><td class='bRight'>".$row['EX5_deets']."</td>
								<td>HW5</td><td>".$row['HW5Total']."</td><td>".$row['HW5']."</td><td class='bRight'>".$row['HW5_deets']."</td>
								<td>QZ5</td><td>".$row['QZ5Total']."</td><td>".$row['QZ5']."</td><td class='bRight'>".$row['QZ5_deets']."</td>
								<td>OTH5</td><td>".$row['OTH5Total']."</td><td>".$row['OTH5']."</td><td class='bRight'>".$row['OTH5_deets']."</td>
								<td></td><td></td><td></td><td class='bRight'></td>
							</tr>
							<tr>
								<td>SW6</td><td>".$row['SW6Total']."</td><td>".$row['SW6']."</td><td class='bRight'>".$row['SW6_deets']."</td>
								<td>EX6</td><td>".$row['EX6Total']."</td><td>".$row['EX6']."</td><td class='bRight'>".$row['EX6_deets']."</td>
								<td>HW6</td><td>".$row['HW6Total']."</td><td>".$row['HW6']."</td><td class='bRight'>".$row['HW6_deets']."</td>
								<td>QZ6</td><td>".$row['QZ6Total']."</td><td>".$row['QZ6']."</td><td class='bRight'>".$row['QZ6_deets']."</td>
								<td>OTH6</td><td>".$row['OTH6Total']."</td><td>".$row['OTH6']."</td><td class='bRight'>".$row['OTH6_deets']."</td>
								<td></td><td></td><td></td><td class='bRight'></td>
							</tr>
							<tr>
								<td></td><td></td><td></td><td class='bRight'></td>
								<td></td><td></td><td></td><td class='bRight'></td>
								<td></td><td></td><td></td><td class='bRight'></td>
								<td></td><td></td><td></td><td class='bRight'></td>
								<td>OTH7</td><td>".$row['OTH7Total']."</td><td>".$row['OTH7']."</td><td class='bRight'>".$row['OTH7_deets']."</td>
								<td></td><td></td><td></td><td class='bRight'></td>
							</tr>
							<tr>
								<td></td><td></td><td></td><td class='bRight'></td>
								<td></td><td></td><td></td><td class='bRight'></td>
								<td></td><td></td><td></td><td class='bRight'></td>
								<td></td><td></td><td></td><td class='bRight'></td>
								<td>OTH8</td><td>".$row['OTH8Total']."</td><td>".$row['OTH8']."</td><td class='bRight'>".$row['OTH8_deets']."</td>
								<td></td><td></td><td></td><td class='bRight'></td>
							</tr>
							<tr>
								<td class='tdStyle'>Total</td>
								<td class='tdStyle'>".$totalSWI."</td>
								<td class='tdStyle'>".$totalSWS."</td>
								<td class='tdStyle bRight'>-</td>
								<td class='tdStyle'>Total</td>
								<td class='tdStyle'>".$totalEXI."</td>
								<td class='tdStyle'>".$totalEXS."</td>
								<td class='tdStyle bRight'>-</td>
								<td class='tdStyle'>Total</td>
								<td class='tdStyle'>".$totalHWI."</td>
								<td class='tdStyle'>".$totalHWS."</td>
								<td class='tdStyle bRight'>-</td>
								<td class='tdStyle'>Total</td>
								<td class='tdStyle'>".$totalQZI."</td>
								<td class='tdStyle'>".$totalQZS."</td>
								<td class='tdStyle bRight'>-</td>
								<td class='tdStyle'>Total</td>
								<td class='tdStyle'>".$totalOTHI."</td>
								<td class='tdStyle'>".$totalOTHS."</td>
								<td class='tdStyle bRight'>-</td>
								<td class='tdStyle'>Total</td>
								<td class='tdStyle'>".$totalPTI."</td>
								<td class='tdStyle'>".$totalPTS."</td>
								<td class='tdStyle bRight'>-</td>
							</tr>
						<table>";

						echo "<center><h4>Computation:</h4>";
						echo "<table class='table table-striped tblCompGrade'>
							<tr>
								<th>Item</th>
								<th>Decimal</th>
								<th>Percentage</th>
							</tr>
							<tr>
								<td>Seatwork:</td><td>".sprintf('%.2f', $totalSWP)."</td><td>".sprintf('%.2f', $totalSWP*100)."</td>
							</tr>
							<tr>
								<td>Exercises:</td><td>".sprintf('%.2f', $totalEXP)."</td><td>".sprintf('%.2f', $totalEXP*100)."</td>
							</tr>
							<tr>
								<td>Homework:</td><td>".sprintf('%.2f', $totalHWP)."</td><td>".sprintf('%.2f', $totalHWP*100)."</td>
							</tr>
							<tr>
								<td>Quizzes:</td><td>".sprintf('%.2f', $totalQZP)."</td><td>".sprintf('%.2f', $totalQZP*100)."</td>
							</tr>
							<tr>
								<td>Other Activities:</td><td>".sprintf('%.2f', $totalOTHP)."</td><td>".sprintf('%.2f', $totalOTHP*100)."</td>
							</tr>
							<tr>
								<td>Exam/Final Project:</td><td>".sprintf('%.2f', $totalPTP)."</td><td>".sprintf('%.2f', $totalPTP*100)."</td>
							</tr>
							<tr>
								<td class='tdInComputedGrade'>Total:</td><td>".sprintf('%.2f', $totalGradeDec)."</td><td>".sprintf('%.2f', $totalGradePerc)."</td>
							</tr>
						</table>";
						echo "<input type='text' id='midGrade' value='".$totalGradePerc."' hidden>";
						echo "<center>";
							if ($totalGradePerc <= 69.49) {
								echo "<h1 style='color: red'>Midterm Grade: <b>R</b></h1>";
							} else if ($totalGradePerc >= 69.50 AND $totalGradePerc <= 74.49) {
								echo "<h1 style='color: green'>Midterm Grade: <b>1.0</b></h1>";
							} else if ($totalGradePerc >= 74.50 AND $totalGradePerc <= 78.49) {
								echo "<h1 style='color: green'>Midterm Grade: <b>1.5</b></h1>";
							} else if ($totalGradePerc >= 78.50 AND $totalGradePerc <= 82.49) {
								echo "<h1 style='color: green'>Midterm Grade: <b>2.0</b></h1>";
							} else if ($totalGradePerc >= 82.50 AND $totalGradePerc <= 86.49) {
								echo "<h1 style='color: green'>Midterm Grade: <b>2.5</b></h1>";
							} else if ($totalGradePerc >= 86.50 AND $totalGradePerc <= 90.49) {
								echo "<h1 style='color: green'>Midterm Grade: <b>3.0</b></h1>";
							} else if ($totalGradePerc >= 90.50 AND $totalGradePerc <= 94.49) {
								echo "<h1 style='color: green'>Midterm Grade: <b>3.5</b></h1>";
							} else if ($totalGradePerc >= 94.50 AND $totalGradePerc <= 100) {
								echo "<h1 style='color: green'>Midterm Grade: <b>4.0</b></h1>";
							}
						echo "</center>";
					}	
				}
			?>
			<center>
				<form action="#" method="POST">
					Target Subject Grade: <select name="targetSG" id="targetSG" onchange="myFunc()">
						<option value="1.0">1.0</option>
						<option value="1.5">1.5</option>
						<option value="2.0">2.0</option>
						<option value="2.5">2.5</option>
						<option value="3.0">3.0</option>
						<option value="3.5">3.5</option>
						<option value="4.0">4.0</option>
					</select>
				</form>
				<h3 id="targetFTG" style="color: red"></h3>
			</center>
		</div>
	</body>
</html>
<script>
	function myFunc() {
		var sg = document.getElementById("targetSG").value;
		var mg = document.getElementById("midGrade").value;
		let ftg = 0;
		if (sg == "1.0") {
  			ftg = (2 * 69.5) - mg;
  		} else if (sg == "1.5") {
  			ftg = (2 * 74.5) - mg;
  		} else if (sg == "2.0") {
  			ftg = (2 * 78.5) - mg;
  		} else if (sg == "2.5") {
  			ftg = (2 * 82.5) - mg;
  		} else if (sg == "3.0") {
  			ftg = (2 * 86.5) - mg;
  		} else if (sg == "3.5") {
  			ftg = (2 * 90.5) - mg;
  		} else if (sg == "4.0") {
  			ftg = (2 * 94.5) - mg;
  		}

  		let fftg = ftg.toFixed(2);

  		var fixedMsg = "Your Final Term Grade should be ";
  		var dispMsg = "";
  		if (fftg <=100) {
	  		if (fftg < 69.5) {
	  			dispMsg = fixedMsg.concat("R or ",fftg," to be specific.");
	  		} else if (fftg > 69.4 && fftg < 74.5) {
	  			dispMsg = fixedMsg.concat("1.0 or ",fftg," to be specific.");
	  		} else if (fftg > 74.4 && fftg < 78.5) {
	  			dispMsg = fixedMsg.concat("1.5 or ",fftg," to be specific.");
	  		} else if (fftg > 78.4 && fftg < 82.5) {
	  			dispMsg = fixedMsg.concat("2.0 or ",fftg," to be specific.");
	  		} else if (fftg > 82.4 && fftg < 86.5) {
	  			dispMsg = fixedMsg.concat("2.5 or ",fftg," to be specific.");
	  		}  else if (fftg > 86.4 && fftg < 90.5) {
	  			dispMsg = fixedMsg.concat("3.0 or ",fftg," to be specific.");
	  		} else if (fftg > 90.4 && fftg < 94.5) {
	  			dispMsg = fixedMsg.concat("3.5 or ",fftg," to be specific.");
	  		} else if (fftg > 94.4 && fftg <= 100) {
	  			dispMsg = fixedMsg.concat("4.0 or ",fftg," to be specific.");
	  		}
	  	} else {
	  		dispMsg = "You can NO LONGER get the target Subject Grade. Please try a lower target Subject Grade.";
	  	}

  		document.getElementById("targetFTG").innerHTML = dispMsg;
	}
</script>