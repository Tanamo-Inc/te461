<div class="row">
<br/><br/>
</div>

<div class="row" style="margin: 15px;">
	<center><legend><span class="glyphicon glyphicon-lock"></span> Change Password</legend></center>
</div>


<div class="row" id="displayRes"></div>

<div class="row">
<br/>
</div>
<?php $this->updateAdminPass(); ?>
<div class="modal-dialog modal-sm">
	<div class="modal-content" style="width: 100%; border-radius: 25px; -moz-border-radius: 25px; -webkit-border-radius: 25px;">
		<div class="modal-header" style="background-color: #3a3a3a; color: #fff">
			<center><legend style="color: #fff;"><span class="glyphicon glyphicon-lock"></span></legend></center>
		</div>
		<div class="modal-body">
			<div class="row well" style="margin: 3px;">
				<form method="post" action="?chngpwd" class="form">
					<input type="hidden" name="oldusername" class="form-control" placeholder="User Name" value="<?php echo $this->sanitize($_SESSION['cengadmin']); ?>" readonly/>
					<div class="form-group">
						<input type="hidden" name="username" class="form-control" placeholder="User Name" value="<?php echo $this->sanitize($_SESSION['cengadmin']); ?>" required readonly/>
					</div>
					<div class="form-group">
						<input type="password" name="oldpwd" class="form-control" placeholder="Old Password" required/>
					</div>
					<div class="form-group">
						<input type="password" name="newpwd" class="form-control" placeholder="New Password" required/>
					</div>
					<div class="form-group">
						<input type="password" name="newpwd1" class="form-control" placeholder="Confirm New Password" required/>
					</div>
					<div class="form-group">
						<center><button type="submit" name="updateUserPass" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span> Update Password</button></center>
					</div>
				</form>
			</div>
		</div>
		<div class="modal-footer">

		</div>
	</div>
</div>