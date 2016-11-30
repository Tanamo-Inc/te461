<?php 
	$details=$ceng->getStudentDetails($_SESSION['ceng']);	
?>
<div class="row well" style="margin-left: 5px; margin-right: 15px; margin-top: 15px;">
	<div class="list-group">
	            <a href="#" class="list-group-item active panel-title" style="background-color: #3a3a3a; border: 1px solid yellow">
	              <span class="glyphicon glyphicon-th"></span> User Panel
	            </a>
	            <a href="#" class="list-group-item tooltip-bottom" style="color: #000;"  title="Index Number"><span class="glyphicon glyphicon-record"></span> <?php echo $details[2]; ?></a>
	            <a href="#" class="list-group-item tooltip-bottom" style="color: #000;" title="Full Name"><span class="glyphicon glyphicon-user"></span> <?php echo $details[1]; ?></a>
	            <a href="#" class="list-group-item tootlip-bottom" style="color: #000;" title="Programme of Study"><span class="glyphicon glyphicon-folder-close"></span> <?php echo $details[6]; ?></a>
	            <a href="#" class="list-group-item tooltip-bottom" style="color: #000;" title="Course Code"><span class="glyphicon glyphicon-book"></span> TE 461</a>
	</div>
	<div class="list-group">
	            <a href="#" class="list-group-item active panel-title" style="background-color: #3a3a3a; border: 1px solid yellow">
	              <span class="glyphicon glyphicon-cog"></span> System Panel
	            </a>
	            <a href="#" class="list-group-item tooltip-bottom"  style="color: #000;" title="Last Log In"> <span class="glyphicon glyphicon-time"></span> <?php echo $ceng->getLastLogin($_SESSION['ceng']);?></a>
	            <a href="#" class="list-group-item tooltip-bottom" style="color: #000;" title="Current Time" id="currentTime"></a>
	            <a href="?logout" class="list-group-item tooltip-bottom" style="color: #000;" title="Log Out"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
	</div>
</div>
<script type="text/javascript">
		function checkTime(i) {
		    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		    return i;
        }
        //display time function
        setInterval(function(){
	   var today = new Date();
	    var h = today.getHours();
	    var m = today.getMinutes();
	    var s = today.getSeconds();
	    m = checkTime(m);
	    s = checkTime(s);
	    h=checkTime(h);

	    document.getElementById('currentTime').innerHTML= "<span class='glyphicon glyphicon-time'></span> <span>"+ h + ":" + m + ":" + s+"</span>";
	        },1);
</script>