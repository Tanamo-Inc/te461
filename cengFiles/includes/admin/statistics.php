<div class="row">
	<br/>
</div>
<div class="row" style="margin: 15px;">
	<center><legend><span class="glyphicon glyphicon-stats"></span> Statistics</legend></center>
</div>

<div class="row">
	<br/>
</div>
<?php $data=$this->getSatisticsData('all'); ?>
<div class="row">
	<div class="col-md-4">
		<center><button  class="btn btn-primary btn-xs" style="border-radius: 25px; -moz-border-radius: 25px; -webkit-border-radius: 25px;"><span class="glyphicon glyphicon-user"></span> Total Number <span class="badge"><?php echo $data[1]; ?></span></button></center>
	</div>
	<div class="col-md-4">
		<center><button  class="btn btn-success btn-xs" style="border-radius: 25px; -moz-border-radius: 25px; -webkit-border-radius: 25px;"><span class="glyphicon glyphicon-user"></span> Submitted Reports <span class="badge"><?php echo $data[0]; ?></span></button></center>
	</div>
	<div class="col-md-4">
		<center><button  class="btn btn-warning btn-xs" style="border-radius: 25px; -moz-border-radius: 25px; -webkit-border-radius: 25px;"><span class="glyphicon glyphicon-user"></span> Remainder <span class="badge"><?php echo $data[2]; ?></span></button></center>
	</div>
</div>
<div class="row" style="margin: 15px;"><br/></div>
<div class="row" style="margin: 15px;">
	<!-- <div class="col-md-3">
		<center><a href="#uploadcsv" class="btn btn-xs btn-info" data-toggle="modal"><span class="glyphicon glyphicon-upload"></span> Upload Excel(CSV) Data</a></center>
	</div> -->
	<!-- <div class="col-md-4"> -->
		<center><button class="btn btn-xs btn-info" style="border-radius: 25px; -moz-border-radius: 25px; -webkit-border-radius: 25px; font-weight: bold;" onclick="window.open('csv.php?statistics');"><span class="glyphicon glyphicon-download"></span> Download Statistics(Excel CSV)</button></center>
<!-- 	</div>
<div class="col-md-4">
	<center><button class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-download"></span> Download List(PDF)</button></center>
</div>
<div class="col-md-4">
	<center><button class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-print"></span> Print List</button></center>
</div> -->
</div>
<div class="row" style="margin: 15px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3a3a3a; color: #fff;">
				<center><h3 class="panel-title"><span class="glyphicon glyphicon-stats"></span> TE 461 Statistics</legend></center>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-condensed table-hover" id="statistics">
					<thead>
						<tr><th><center>Programme</center></th><th><center>No. of Students</center></th><th><center>Submitted Reports</center></th><th><center>Remainder</center></th></tr>
					</thead>
					<tbody>
						<?php $this->genStatistics(); ?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#statistics').DataTable({
		responsive: true
	});
</script>