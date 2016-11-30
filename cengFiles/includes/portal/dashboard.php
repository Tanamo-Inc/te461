<?php 
	$details=$this->getStudentDetails($_SESSION['ceng']);	
?>
<div class="row" style="margin: 15px;">
	<center><legend><span class="glyphicon glyphicon-dashboard"></span> DashBoard</legend></center>
</div>

<div class="row" style="margin: 15px;">
	<div class="col-md-3">
		<center><a href="#uploadfile" data-toggle="modal" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Upload Assignment</a></center>
	</div>
	<div class="col-md-3">
		<center><a href="#livechat" data-toggle="modal" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-comment"></span> Forum</a></center>
	</div>
	<div class="col-md-3">
		<center><a href="#edituserdetails" data-toggle="modal" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit User Details</a></center>
	</div>
	<div class="col-md-3">
		<center><a href="#chngpwd" data-toggle="modal" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-lock"></span>Change Password</a></center>
	</div>
</div>

<div class="row" style="margin: 15px;">
	<br/><br/>
</div>

<div class="row" style="margin: 15px;" id="displayRes">
<?php 
	if(isset($_POST['uploadProject'])){
		$this->uploadStudentFile();
	}elseif(isset($_POST['updateDetails'])){
		$this->updateDetails($_SESSION['ceng']);
	}elseif(isset($_POST['chngpwdBtn'])){
		$this->chngStdPwd($_SESSION['ceng'],$_POST['password1'],$_POST['password2']);
	}
?>
</div>

<div class="row" style="margin: 15px;">
	<table class="table table-striped table-condensed table-bordered table-hover">
		<thead>
			<tr><th><center>Assignment</center></th><th><center>File Name</center></th><th><center>Date Submitted</center></th><th><center></center></th></tr>
		</thead>
		<tbody>
			<tr><td><?php echo $details[7]; ?></td><?php echo $this->getUploadedFile($_SESSION['ceng']);?></tr>
		</tbody>
	</table>
</div>

<!-- modals -->
<div id="uploadfile" class="modal fade">
	<div class="modal-dialog modal-sm">	
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3a3a3a; color: #fff;">
				<center><h3 class="panel-title"><span class="glyphicon glyphicon-upload"></span> Upload Project File</h3></center>
			</div>
			<div class="modal-body">
				<center>
					<form  class="form" method="post" action="?dashboard" enctype="multipart/form-data">
					<legend style="font-size: 15px;"><center><span style="color: red;">*Upload only <u>.docx|.doc|.pdf</u> file</span></center></legend>
						<div class="form-group">
							<input type="file" name="studentProjectUpload" class="form-control" placeholder="Upload Project File" accept=".pdf|*.doc|*.docx" required/>
						</div>
						<div class="form-group">
							<center><button type="submit" name="uploadProject" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-upload"></span> Upload</button></center>
						</div>
					</form>
				</center>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<div id="chngpwd" class="modal fade">
	<div class="modal-dialog modal-sm">	
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3a3a3a; color: #fff;">
				<center><h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Change Password</h3></center>
			</div>
			<div class="modal-body">
				<center>
					<form  class="form" method="post" action="?dashboard">
					<legend style="font-size: 15px;"><center><span style="color: red;">***</span></center></legend>
						 <div class="form-group input-group input-group-md">
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-lock"></span>
                                 </span>
                                    <input class="form-control" id="password" placeholder="Old Password" name="password1" type="password" required>
                         </div>
                         <div class="form-group input-group input-group-md">
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-lock"></span>
                                 </span>
                                    <input class="form-control" id="password" placeholder="New Password" name="password2" type="password" required>
                         </div>
                         <div class="form-group">
                         	<center><button type="submit" name="chngpwdBtn" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span> Update Password</button></center>
                         </div>
					</form>
				</center>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>

<div id="edituserdetails" class="modal fade">	
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3a3a3a; color: #fff;">
				<center><h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span> Edit User Details</h3></center>
			</div>
			<div class="modal-body">
				<form class="form" method="post" action="?dashboard">
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
							<center><button type="submit" name="updateDetails" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span> Update Details</button></center>
					</div>
				</form>
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<!-- livechat modal -->
<div id="livechat" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #3a3a3a; color: #fff;">
				<center><h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Forum</h3></center>
			</div>
			<div class="modal-body">
				<div class="chat-panel panel panel-default">
				    <div class="panel-heading" style="background-color: #3a3a3a; color: #fff;">
				            <i class="fa fa-comments fa-fw"></i>
				                            Chat Forum
				                <div class="btn-group pull-right">
				                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
				                                    <i class="fa fa-chevron-down"></i>
				                        </button>
				                </div>
				     </div>
				    <!-- /.panel-heading -->
				    <div class="panel-body" id="chatList">
				                            
				    </div>
				    <!-- /.panel-body -->
				    <div class="panel-footer">
				        <div class="input-group">
				                <input id="adminname" type="hidden" value="<?php echo $_SESSION['ceng']; ?>"/>
				                <input id="messagen" type="text" class="form-control input-sm" placeholder="Type your message here..." value=" "/>
				                <span class="input-group-btn">
				                    <button class="btn btn-warning btn-sm" id="sendMsg">
				                       Send
				                    </button>
				                </span>
				        </div>
				    </div>
				    <!-- /.panel-footer -->
			</div>
<!-- /.panel .chat-panel -->
			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>
<!-- end of livechat -->
<!-- end of modals -->
<script type="text/javascript">
    $(function(){
    //implementing sendmessage in chat
    $('#sendMsg').click(function(){
        var x=$('#messagen').val();
        var user=$('#adminname').val();
        $.post('cms/includes/ajax.php',{'user':user,'msg':x},function(data){
            if(data==1){
                //document.getElementById('messagen').setAttribute('value',' ');
                //console.log(data);
                $('#messagen').val(" ");
            }
        });
    });

    //retrieving data from chat
    setInterval(function(){
        $.post('cms/includes/ajax.php',{'getchats2':'y'},function(data){
            if(data){
                $('#chatList').html(data);
                //document.getElementById('chatList').innerHTML=data;
                //console.log(data);
            }else{

            }
        });

    },1000);

    });
</script>
<style type="text/css">
.chat-panel .panel-body {
    height: 250px;
    overflow-y: scroll;
}

.panel-body {
    padding: 5px;
}
</style>