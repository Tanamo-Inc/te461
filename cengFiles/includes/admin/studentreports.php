<div class="row">
	<br/>
</div>
<div class="row" style="margin: 15px;">
	<center><legend><span class="glyphicon glyphicon-save"></span> Submitted Reports</legend></center>
</div>

<!-- providing download options -->
<div class="row" style="margin: 15px;">
	<div class="col-md-6">
		<center><button class="btn btn-xs btn-success" onclick="window.open('csv.php?submittedreports');"><span class="glyphicon glyphicon-download"></span> Download List-Submitted(Excel CSV)</button></center>
	</div>
	<div class="col-md-6">
	<center><button class="btn btn-xs btn-danger" onclick="window.open('csv.php?failedreports');"><span class="glyphicon glyphicon-download"></span> Download List-Failed(Excel CSV)</button></center>
	</div>
</div>
<div class="row" style="margin: 15px;"><br/></div>
<!-- end of download options -->

<div class="row" style="margin: 15px;">
	<table class="table table-striped table-condensed table-bordered table-hover" id="studentreports">
		<thead>
			<tr><th><center>No.</center></th><th><center>Index Number</center></th><th><center>Programme of Study</center></th><th><center>Project Topic</center></th><th><center>File Name</center></th><th><center>Date Submitted</center></th><th><center></center></th></tr>
		</thead>
		<tbody>
			<?php $this->genStudentReportList(); ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
	$(function(){
		$('#studentreports').DataTable({
			responsive: true
		});
	});
</script>