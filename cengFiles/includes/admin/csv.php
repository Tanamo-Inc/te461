<?php
require "../../../cengFiles/includes/functions.php";
$app = new Ceng();
if(isset($_SESSION['cengadmin'])){
	if(isset($_GET['studentlist'])){
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=TE-461_StudentList.csv');
		$app->genStudentListCsv();	
	}elseif(isset($_GET['submittedreports'])){
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=TE-461_SubmittedAssignment.csv');
		$app->genSubmittedReportsCsv();
	}elseif(isset($_GET['failedreports'])){
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=TE-461_FailedAssignment.csv');
		$app->genFailedReportsCsv();
	}elseif(isset($_GET['statistics'])){
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=TE-461_Statistics.csv');
		$app->genStatisticsCsv();
	}elseif(isset($_GET['credentials'])){
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=TE-461_LogIn_Credentials.csv');
		$app->genCredentialsCsv();
	}else{
		echo "<script>
				close();
			</script>";
	}
}else{
		echo "<script>
				close();
			</script>";
}
?>