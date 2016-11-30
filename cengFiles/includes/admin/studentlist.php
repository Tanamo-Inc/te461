<div class="row">
<br/>
</div>

<div class="row">
<center><h2><legend style="font-size: 25px;"><span class="fa fa-users"></span> LIST OF STUDENTS</legend></h2></center>
</div>

<div class="row" style="margin: 15px;">
	<div class="col-md-3">
		<center><a href="#uploadcsv" class="btn btn-xs btn-info" data-toggle="modal"><span class="glyphicon glyphicon-upload"></span> Upload Excel(CSV) Data</a></center>
	</div>
	<div class="col-md-3"> 
		<center><button class="btn btn-xs btn-warning" onclick="window.open('../../docs/TE-461-Upload.csv');"><span class="glyphicon glyphicon-download"></span> Download Sample Excel Upload File</button></center>
	</div>
	<div class="col-md-3"> 
		<center><button class="btn btn-xs btn-success" onclick="window.open('csv.php?studentlist');"><span class="glyphicon glyphicon-download"></span> Download List(Excel CSV)</button></center>
	</div>
	<div class="col-md-3"> 
		<center><button class="btn btn-xs btn-danger" onclick="deleteStudentDetails(0)"><span class="glyphicon glyphicon-remove"></span> Delete Student List</button></center>
	</div>

</div>

<div class="row">
	<br/>
</div>

<div class="row" id="displayRes">

</div>

<div class="row" style="margin: 15px;">
	<?php
		if(isset($_POST['uploadlist'])){
			//echo "working";
			$this->uploadStudentCSV();
		}elseif(isset($_POST['updateDetails'])){
			$this->updateDetailsAdmin($_POST['updateDetails']);
		}
	?>

			<?php $this->genStudentList(); ?>

</div>

<script type="text/javascript">
	$(function(){
		$('#studentListTable').DataTable({
			responsive: true
		});
		$('#studentList').addClass('adminActive');
	});
	function deleteStudentDetails(userid){
		var id=userid;
		//alert(id);
		var result=confirm('Are you sure you want to delete the details?');
		if(result){
			//alert(id);
			$.post('ajax.php',{'deletestudent':id},function(data){
				if(data==1){
					$('#displayRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Student Info deleted..</span></center>');
					window.location.assign('?studentList');
				}else{
					$('#displayRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center>');
					window.location.assign('?studentList');
				}
			});
		}else{
			$('#displayRes').html('<center><span class=\'alert alert-info\' role=\'alert\'>Process cancelled...</span></center>').fadeOut(5000);
					//window.location.assign('?studentList');
		}
		//$.post('')
	}
</script>