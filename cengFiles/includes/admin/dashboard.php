<div class="row">
<br/>
</div>

<div class="row">
<center><h2><legend style="font-size: 25px;"><span class="fa fa-dashboard"></span> DASHBOARD</legend></h2></center>
</div>

<div class="row">
<div class="col-md-6">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header well" style="background-color: #3a3a3a; color: #fff;">
				<h5 style="font-size: 18px; height: 2px;"><center><span class="glyphicon glyphicon-th"></span> SESSION DETAILS</center></h5>
			</div>

			<div class="modal-body">
				<!-- last Login -->
				<div class="row" style="margin: 15px;">
					<div class="col-md-6">
						<div class="form-group">
					<label for="lastLogin"><span class="glyphicon glyphicon-time"></span> Last Login:</label>
					<input type="text" id="lastLogin" class="form-control" value="<?php 
						$result=[];
						$result=$this->getSession($_SESSION['cengadmin']);
						echo $result[1];
						?>" readonly/>
					</div>

					<div class="form-group">
					<label for="lastLoginip"><span class="glyphicon glyphicon-flash"></span> Last Login Address:</label>
					<input type="text" id="lastLoginip" class="form-control" value="<?php
						echo $result[0];
					?>" readonly/>
					</div>

					</div>

					<div class="col-md-6">
						<div class="form-group">
						<label for="lastLogin"><span class="glyphicon glyphicon-time"></span> Last Password Changed Date:</label>
						<input type="text" id="lastLogin" class="form-control" value="<?php 
							echo $this->getLastPassChng($_SESSION['cengadmin']);
						?>" readonly/>
						</div>
						
						<div class="form-group">
						<label for="currentTime1"><span class="glyphicon glyphicon-time"></span> Current Time:</label>
						<div id="currentTime" style="color: #000;"></div>
						</div>
					</div>
					
				</div><!--/last login -->

<!-- message number display -->
<div class="row" style="margin: 15px;">
 <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php
                          //           $this->getNumber('chat');
                                     ?></div>
                                    <div>Messages</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bell fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php //$this->getNumber('sysnotifications'); ?></div>
                                    <div>System Notifications</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>


			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
	</div>

<div class="col-md-1">
&nbsp;
</div>

<!-- implementing chat code -->
<div class="col-md-4 col-md-offset-1">
<?php include "livechat.php"; ?>
</div><!-- end of chat code -->

</div>
<script type="text/javascript">
	//display time function
	setInterval(function(){
   var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    h=checkTime(h);

    document.getElementById('currentTime').innerHTML= " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-size: 22px;'>"+ h + ":" + m + ":" + s+"</span>";
	},1);
</script>