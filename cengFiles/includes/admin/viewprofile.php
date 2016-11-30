<div class="row">
<br/><br/>
</div>
<?php $profile=$this->getAdminDetails($_SESSION['cengadmin']); ?>
<div class="row" style="margin: 15px;">
	<center><legend><span class="glyphicon glyphicon-lock"></span> Edit Account Details</legend></center>
</div>

<div class="row" id="displayRes"></div>

<div class="row">
<br/>
</div>
<?php $this->updateAdminProfile(); ?>
<div class="modal-dialog modal-sm">
	<div class="modal-content" style="width: 100%; border-radius: 25px; -moz-border-radius: 25px; -webkit-border-radius: 25px;">
		<div class="modal-header" style="background-color: #3a3a3a; color: #fff">
			<center><legend style="color: #fff;"><span class="glyphicon glyphicon-pencil"></span> Edit Account Details</legend></center>
		</div>
		<div class="modal-body">
			<div class="row well" style="margin: 3px;">
				<form method="post" action="?profile" class="form" enctype="multipart/form-data">
					<div class="form-group">
						<label for="dp">Display Picture:</label>
						<input type="file" name="dp" accept="image/*" class="form-control"/>
					</div>
					<div class="form-group">
						<label for="fullname">Full Name:</label>
						<input type="text" name="fullname" value="<?php echo $profile[1]; ?>" class="form-control" placeholder="Full Name" required/>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email" value="<?php echo $profile[2]; ?>" class="form-control" placeholder="Email Address" required/>
					</div>
					<div class="form-group">
						<input type="text" name="mobileNo" class="form-control" value="<?php echo $profile[3]; ?>" placeholder="Mobile Number" required/>
					</div>
					<div class="form-group">
						<center><button type="submit" name="updateUserProfile" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span> Update Profile</button></center>
					</div>
				</form>
			</div>
		</div>
		<div class="modal-footer">

		</div>
	</div>
</div>