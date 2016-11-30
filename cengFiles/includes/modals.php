<!--add acl cordinator -->
<div id="addACLCoordinator" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3a3a3a; color: #fff;">
				<center><h3 class="panel-title"><span class="glyphicon glyphicon-eye-open"></span> Access Control</h3></center>
			</div>
			<div class="modal-body">
				<form method="post" action="?coordinators" class="form well">
					<div class="form-group">
						<label for="username">Coordinator:</label>
						<select name="username" id="username" class="form-control" required autofocus>
							<?php $ceng->getCoordList(); ?>
						</select>
					</div>
					<div class="form-group">
						<label for="dept">Department:</label>
						<select name="dept" id="dept" class="form-control" required>
							<?php $ceng->getDepartmentList(); ?>
						</select>
					</div>
					<div class="form-group">
						<center><button type="submit" name="addacl" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> Add Access Control</button></center>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!--add cordinator -->
<div id="addCoordinator" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3a3a3a; color: #fff;">
				<center><h3 class="panel-title"><span class="glyphicon glyphicon-plus"></span> Add Course Coordinator</h3></center>
			</div>
			<div class="modal-body">
				<form method="post" action="?coordinators" class="form well">
					<div class="form-group">
						<label for="username">Username:</label>
						<input type="text" class="form-control" name="username" placeholder="Username" required autofocus/>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" name="password" placeholder="Password" required/>
					</div>
					<div class="form-group">
						<center><button type="submit" name="addcoord" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> Add Coordinator</button></center>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- uploading csv code -->
<div id="uploadcsv" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3a3a3a; color: #fff;">
				<center><h3 class="panel-title"><span class="glyphicon glyphicon-upload"></span> Upload Student List</h3></center>
			</div>
			<div class="modal-body">
				<center>
					<form  class="form" method="post" action="?studentList" enctype="multipart/form-data">
					<legend style="font-size: 15px;"><center><span style="color: red;">*Upload only a <u>CSV</u> file</span></center></legend>
						<div class="form-group">
							<input type="file" name="studentlistUpload" class="form-control" placeholder="Upload Student List" accept=".csv" required/>
						</div>
						<div class="form-group">
							<center><button type="submit" name="uploadlist" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Upload</button></center>
						</div>
					</form>
				</center>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>