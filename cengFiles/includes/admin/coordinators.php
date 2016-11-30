<div class="row">
	<br/>
</div>

<div class="row">
	<center><h2><legend style="font-size: 25px;"><span class="fa fa-users"></span> Coordinators</legend></h2></center>
</div>

<div class="row" style="margin: 15px;">
	<center><button type="button" class="btn btn-xs btn-info" onclick="window.open('csv.php?credentials');"><span class="glyphicon glyphicon-download"></span> Download Log In Credentials(CSV)</button></center>
</div>

<div class="row" style="margin: 15px;" id="displayRes"></div>

<div class="row" style="margin: 15px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3a3a3a; color: #fff;">
				<center><h3 class="panel-title"><span class="glyphicon glyphicon-th"></span> Access Control for Coordinators</h3></center>
			</div>
			<div class="modal-body">
				<div class="row" style="margin: 5px;">
					<div class="col-md-6">
						<center><a href="#addCoordinator" class="btn btn-xs btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Add Coordinator</a></center>
					</div>
					<div class="col-md-6">
						<center><a href="#addACLCoordinator" class="btn btn-xs btn-warning" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Add Access Control</a></center>
					</div>
				</div><br/>
				<div class="row" style="margin: 5px;">
					<?php 
						if(isset($_POST['addcoord'])){
							$this->addCoordinator();
						}elseif(isset($_POST['addacl'])){
							$this->addAcl();
						}elseif(isset($_POST['delete'])){
							$this->delCoordinator();
						}else{
							$this->getACL(); 	
						}
					?>
				</div>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#acllist').DataTable({
		responsive: true
	});
</script>