<?php 
	$details=$this->getStudentDetails($_POST['edit']);	
?>
<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3a3a3a; color: #fff;">
				<center><h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span> Edit User Details</h3></center>
			</div>
			<div class="modal-body">
				<form class="form" method="post" action="?studentList">
					<div class="row well" style="margin: 15px;">
						<div class="col-md-6">
							<div class="form-group">
								<label for="indexnumber">Index Number:</label>
								<input type="text" id="indexnumber" name="indexnumber" class="form-control" value="<?php echo $details[2]; ?>" placeholder="Index Number" required autofocus/>
							</div>
							<div class="form-group">
								<label for="fullname">Full Name:</label>
								<input id="fullname" name="fullname" type="text" class="form-control" value="<?php echo $details[1]; ?>" placeholder="Full Name" required/>
							</div>
							<div class="form-group">
								<label for="mobileNo">Mobile Number:</label>
								<input id="mobileNo" name="mobileNo" type="text" class="form-control" value="<?php echo $details[3]; ?>" placeholder="Index Number"/>
							</div>
							<div class="form-group">
								<label for="emailAddr">Email Address:</label>
								<input id="emailAddr" name="emailAddr" type="text" class="form-control" value="<?php echo $details[4]; ?>" placeholder="Email Address"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="address">Address:</label>
								<textarea id="address" name="address" type="text" class="form-control" placeholder="Address"><?php echo $details[5]; ?></textarea>
							</div>
							<div class="form-group">
								<label for="progstudy">Programme of Study:</label>
								<select id="progstudy" name="progstudy" type="text" class="form-control">
									<option value="<?php echo $details[6]; ?>"><?php echo $details[6]; ?>
									</option>
									<?php $this->getDepartments(); ?>
								</select>
							</div>
							<div class="form-group">
								<label for="projectTopic">Project Topic:</label>
								<textarea id="projectTopic" name="projectTopic" type="text" class="form-control" placeholder="Project Topic"><?php echo $details[7]; ?></textarea>
							</div>
						</div>
					</div>
					<!--submit button -->
					<div class="row" style="margin: 15px;">
						<div class="col-md-6">
							<center><button type="submit" name="updateDetails" value="<?php echo $details[2]; ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span> Update Details</button></center>
						</div>
						<div class="col-md-6">
							<center><a href="?studentList" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Close</a></center>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">

			</div>
		</div>
</div>