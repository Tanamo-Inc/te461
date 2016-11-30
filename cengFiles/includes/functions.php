<?php 
require "dbconfig.php"; 
define('ENC_KEY', 'luxferro@#777777');
	//coe class
	class Ceng{
		

		function __construct(){
			mysql_connect(HOST,USERNAME,PASSWORD);
			mysql_select_db(DB_NAME);
		}


 //encryption/decryption algorithm
        function encrypt_decrypt($action,$string){
                $output=false;
                $encrypt_method = "AES-256-CBC";
        $secret_key = "luxferro@#777";
        $secret_iv = "luxferro@#777";
        
        // hash  
        $key = hash('sha256', $secret_key);
    
        // iv - encrypt method AES-256-CBC 16 bytes
            $iv = substr(hash('sha256', $secret_iv), 0, 16);

            if( $action == 'encrypt' ) {
                $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                $output = base64_encode($output);
            }    
            else if( $action == 'decrypt' ){
                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
            }

            return $output;
        }
//end of encryption/decryption algorithm


//#####################generating csv files .......#########################
		function genStudentListCsv(){
			$handle=fopen("php://output", "w");
			fputcsv($handle, array("Index Number","Programme of Study","Project Topic","Date Submitted"));
			//access control list
				if($_SESSION['cengadmin']=='jayluxferro' || $_SESSION['cengadmin']=='jjkponyo.soe'){
					$sql="select indexnumber, programme, topic,date from studentlist order by programme";
				}else{
					$username=$_SESSION['cengadmin'];
					$query="select dept from acl where username='$username'";
					$result=mysql_query($query);
					$data=null;
					$num=mysql_num_rows($result);
					$count=1;
					while($row=mysql_fetch_array($result)){
						$dept=$this->getDepartments2(intval($row['dept']));
						if($count==$num){
							$data.=" programme like '".$dept."' ";
						}else{
							$data.=" programme like '".$dept."' or ";
						}
						
						$count++;
					}
					$sql="select indexnumber, programme, topic,date from studentlist where ".$data. " order by programme";
				}

			$rows=mysql_query($sql);
			while($row=mysql_fetch_assoc($rows)){
				fputcsv($handle, $row);
			}
			fclose($handle);
		}

		function genSubmittedReportsCsv(){
			$handle=fopen("php://output", "w");
			fputcsv($handle, array("Index Number","Programme of Study","Project Topic","File Name","Date Submitted"));



			$sql="select username,filename,date from files order by date";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result)){

				$details=$this->getStudentDetails($row['username']);

				//access control list
				if($_SESSION['cengadmin']=='jayluxferro' || $_SESSION['cengadmin']=='jjkponyo.soe'){
					
				}else{
					$username=$_SESSION['cengadmin'];
					$query="select dept from acl where username='$username'";
					$result1=mysql_query($query);
					$data=[];
					$num=mysql_num_rows($result1);
					$count1=0;
					while($row1=mysql_fetch_array($result1)){
						$dept=$this->getDepartments2(intval($row1['dept']));
						$data[$count1]=$dept;						
						$count1++;
					}
					if(!in_array($details[6], $data)){
						continue;
					}
				}

				
				$requiredData=[];
				$requiredData[0]=$row['username'];
				$requiredData[1]=$details[6];
				$requiredData[2]=$details[7];
				$requiredData[3]=$row['filename'];
				$requiredData[4]=$row['date'];
				fputcsv($handle, $requiredData);
			}
			fclose($handle);
		}

		function genFailedReportsCsv(){
			$handle=fopen("php://output", "w");
			fputcsv($handle, array("Index Number","Full Name", "Programme of Study"));



			$sql="select username from files order by date";
			$result=mysql_query($sql);
			$submitted=array();
			$count=0;
			while($row=mysql_fetch_array($result)){
				$submitted[$count]=$row['username'];
				$count++;
			}



			//searching through all the list
			$query="select indexnumber from studentlist";
			$result=mysql_query($query);
			$failed=array();
			$count=0;
			while($row=mysql_fetch_array($result)){
				if(in_array($row['indexnumber'], $submitted)){
					continue;
				}else{
					$failed[$count]=$row['indexnumber'];
				}
				$count++;
			}



			for($i=0; $i< sizeof($failed); $i++){

				$details=$this->getStudentDetails($failed[$i]);

				//access control list
				if($_SESSION['cengadmin']=='jayluxferro' || $_SESSION['cengadmin']=='jjkponyo.soe'){
					
				}else{
					$username=$_SESSION['cengadmin'];
					$query="select dept from acl where username='$username'";
					$result1=mysql_query($query);
					$data=[];
					$num=mysql_num_rows($result1);
					$count1=0;
					while($row1=mysql_fetch_array($result1)){
						$dept=$this->getDepartments2(intval($row1['dept']));
						$data[$count1]=$dept;						
						$count1++;
					}
					if(!in_array($details[6], $data)){
						continue;
					}
				}

				
				$requiredData=[];
				$requiredData[0]=$failed[$i];
				$requiredData[1]=$details[1];
				$requiredData[2]=$details[6];
				fputcsv($handle, $requiredData);
			}
			fclose($handle);
		}

		function genStatisticsCsv(){
			$handle=fopen("php://output", "w");
			fputcsv($handle, array("Programme","Number of Students","Submitted Reports","Remainder"));
			$sql="select name from departments where name='Telecommunication Engineering' order by name";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result)){
				$statistics=$this->getSatisticsData($row['name']);

				if($_SESSION['cengadmin']=='jayluxferro' || $_SESSION['cengadmin']=='jjkponyo.soe'){
					
				}else{
					$username=$_SESSION['cengadmin'];
					$query="select dept from acl where username='$username'";
					$result1=mysql_query($query);
					$data=[];
					$num=mysql_num_rows($result1);
					$count1=0;
					while($row1=mysql_fetch_array($result1)){
						$dept=$this->getDepartments2(intval($row1['dept']));
						$data[$count1]=$dept;						
						$count1++;
					}
					if(!in_array($row['name'], $data)){
						continue;
					}
				}
				$requiredData=[];
				$requiredData[0]=$row['name'];
				$requiredData[1]=$statistics[1];
				$requiredData[2]=$statistics[0];
				$requiredData[3]=$statistics[2];
				fputcsv($handle, $requiredData);
			}
			fclose($handle);
		}

		function genCredentialsCsv(){
			$handle=fopen("php://output", "w");
			fputcsv($handle, array("No.","Username","Password","Department"));
			$sql="select * from acl";
			$result=mysql_query($sql);
			$count=1;
			while($row=mysql_fetch_array($result)){
				//$statistics=$this->getSatisticsData($row['name']);
				$requiredData=[];
				$requiredData[0]=$count;
				$requiredData[1]=$row['username'];
				$requiredData[2]=$this->encrypt_decrypt('decrypt',$row['pass']);
				$requiredData[3]=$this->getDepartments2($row['dept']);
				fputcsv($handle, $requiredData);
				$count++;
			}
			fclose($handle);
		}

//##########################################################################

		function updateDetailsAdmin($username){
			$oldusername=$this->sanitize($username);
			$fullname=$this->sanitize($_POST['fullname']);
			$indexnumber=$this->sanitize($_POST['indexnumber']);
			$mobileNo=$this->sanitize($_POST['mobileNo']);
			$email=$this->sanitize($_POST['emailAddr']);
			$address=$this->sanitize($_POST['address']);
			$programme=$this->sanitize($_POST['progstudy']);
			$topic=$this->sanitize($_POST['projectTopic']);
			$sql="update studentlist set fullname='$fullname',indexnumber='$indexnumber',mobileNo='$mobileNo',email='$email',address='$address',programme='$programme',topic='$topic' where indexnumber='$oldusername'";
			$results=mysql_query($sql);
			if($results){
				$this->updateOtherDetailsAdmin('files',$oldusername,$indexnumber);
				$this->updateOtherDetails('lastlogin',$oldusername,$indexnumber);
				$this->updateOtherDetails('lastpasschng',$oldusername,$indexnumber);
				$this->updateOtherDetails('lastupdatedetails',$oldusername,$indexnumber);
				$this->updateOtherDetails('realtimechat',$oldusername,$indexnumber);
				//$_SESSION['ceng']=$indexnumber;
				echo "<script>$('#displayRes').html('<center><span class=\'alert alert-success\'>Processing Complete!!!</span></center>').fadeOut(5000); window.location.assign('?studentList');</script>";
			}else{
				echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\'>Process failed..Try again!!!</span></center>').fadeOut(5000);window.location.assign('?studentList');</script>";
				
			}
		}

		function checkIfLoggedIn(){
			if(isset($_SESSION['ceng']) && $_SESSION['ceng']!=null){
				echo "<script>window.location.assign('index.php');</script>";
			}
		}

		function checkIfLoggedIn2(){
			if(!isset($_SESSION['ceng']) || $_SESSION['ceng'] == null){
				echo "<script>window.location.assign('login.php');</script>";
			}
		}

		function checkIfAdminLoggedIn(){
			if(isset($_SESSION['cengadmin'])){
				echo "<script>window.location.assign('index.php');</script>";
			}
		}

		function checkIfAdminLoggedIn2(){
			if(!isset($_SESSION['cengadmin'])){
				echo "<script>window.location.assign('login.php');</script>";
			}
		}

		function sanitize($data){
			return htmlentities(mysql_real_escape_string(trim($data)));
		}

		function curDate(){
			return date('Y-m-d h:i:s');
		}

		//get admin details
		function getAdminDetails($username){
			$username=$this->sanitize($username);
			$query="select * from logindetails where username='$username' limit 1";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);
			return $result;
		}

		//change student password
		function chngStdPwd($username,$oldpwd,$newpwd){
			$username=$this->sanitize($username);
			$oldpwd=$this->encrypt_decrypt("encrypt",$this->sanitize($oldpwd));
			$newpwd=$this->encrypt_decrypt("encrypt",$this->sanitize($newpwd));
			//validating password
			$query="select count(*) from studentlist where indexnumber='$username' and password='$oldpwd'";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);
			if($result[0] >=1){
				//user found
				//updating password
				$query="update studentlist set password='$newpwd' where indexnumber='$username'";
				if(mysql_query($query)){
					unset($_SESSION['ceng']);
					echo "<script>$('#displayRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Process complete..</span></center>').fadeOut(5000); window.location.assign('?logout'); </script>";
				}else{
					echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center>').fadeOut(5000); window.location.assign('?dashboard'); </script>";
				}
			}else{
				echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center>').fadeOut(5000); window.location.assign('?dashboard'); </script>";
			}
		}

		//updating lastlogin
		function updatelastlogin($username){
			$cDate=$this->curDate();
			$username=$this->sanitize($username);
			$ip=$_SERVER['REMOTE_ADDR'];
			$sql="insert into lastlogin(username,ip,date) values('$username','$ip','$cDate')";
			mysql_query($sql);
		}

		//verify admin password
		function verifyAdmin(){
			if(isset($_POST['username']) && isset($_POST['password'])){
				$username=$this->sanitize(strtolower($_POST['username']));
				$password=$this->sanitize(strtolower($_POST['password']));
				$password=sha1($password);
				$query="select * from login where username='$username' and password='$password'";
				$result=mysql_query($query);
				$num=mysql_num_rows($result);
				if($num >=1){
						$_SESSION['cengadmin']=$username;
						$this->updatelastlogin($username);
						echo "<script>$('#displayRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Log In successful..</span></center>').fadeOut(5000); window.location.assign('index.php'); </script>";
				}else{
					echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Log In failed..Try again!!!</span></center>').fadeOut(5000); </script>";
				}
			}	
		}

		//getting latest message 
		function getMessages(){

		}

		function systemAlerts(){

		}

		//update Admin profile
		function updateAdminProfile(){
			if(isset($_POST['updateUserProfile'])){
				$username=$this->sanitize($_SESSION['cengadmin']);
				$fullname=$this->sanitize($_POST['fullname']);
				$email=$this->sanitize($_POST['email']);
				$mobileNo=$this->sanitize($_POST['mobileNo']);
				if(is_uploaded_file($_FILES['dp']['tmp_name'])){
					$ext=explode(".", $_FILES['dp']['name']);
					$ext=end($ext);
					$accepted=['png','PNG','jpg','jpeg','JPG','JPEG'];
					if(!in_array($ext, $accepted)){
						echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\'>Please upload png/jpg image!!!</span></center>').fadeOut(5000);window.location.assign('?profile');</script>";
					}else{
						//image accepted
						$query="select dp from logindetails where username='$username' limit 1";
						$result=mysql_query($query);
						$result=mysql_fetch_row($result);
						if($result[0]==null){
							$imgName=$username.".".$ext;
						}else{
							$imgName=$result[0];
						}

						//acquired image name
						if(move_uploaded_file($_FILES['dp']['tmp_name'], "dp/".$imgName)){
							$query="update logindetails set fullname='$fullname', email='$email', mobileNo='$mobileNo',dp='$imgName' where username='$username'";
							$result=mysql_query($query);
							if($result){
								echo "<script>$('#displayRes').html('<center><span class=\'alert alert-success\'>Profile Updated..!!!</span></center>').fadeOut(5000);window.location.assign('?profile');</script>";
							}else{
								echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\'>Process failed..!!!</span></center>').fadeOut(5000);window.location.assign('?profile');</script>";
							}
						}else{
							echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\'>Image Upload failed...Try again!!</span></center>').fadeOut(5000);window.location.assign('?profile');</script>";
						}

					}
				}else{
							$query="update logindetails set fullname='$fullname',email='$email', mobileNo='$mobileNo' where username='$username'";
							$result=mysql_query($query);
							if($result){
								echo "<script>$('#displayRes').html('<center><span class=\'alert alert-success\'>Profile Updated..!!!</span></center>').fadeOut(5000);window.location.assign('?profile');</script>";
							}else{
								echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\'>Process failed..!!!</span></center>').fadeOut(5000);window.location.assign('?profile');</script>";
							}
				}
			}
		}

		function loadContentAdmin(){
			if(isset($_GET['logout'])){
				include "admin/dashboard.php";
				unset($_SESSION['cengadmin']);
				echo "<script>window.location.assign('login.php');</script>";
			}elseif(isset($_GET['studentList'])){
				include "admin/studentlist.php"; 
			}elseif(isset($_GET['dashboard'])){
				include "admin/dashboard.php"; 
			}elseif(isset($_GET['studentReports'])){
				include "admin/studentreports.php"; 
			}elseif(isset($_GET['statistics'])){
				include "admin/statistics.php";
			}elseif(isset($_GET['profile'])){
				include "admin/viewprofile.php";
			}elseif(isset($_GET['chngpwd'])){
				include "admin/chngpwd.php";
			}elseif(isset($_GET['coordinators'])){
				if($_SESSION['cengadmin'] =='jayluxferro' || $_SESSION['cengadmin'] =='jjkponyo.soe'){
					include "admin/coordinators.php";
				}else{
					include "admin/dashboard.php";
				}
			}else{
				include "admin/dashboard.php"; 
			}
		}

		function addCoordinator(){
			$username=$this->sanitize($_POST['username']);
			$password=$this->sanitize($_POST['password']);
			$password1=sha1($password);
			$password2=$this->encrypt_decrypt('encrypt',$password);
			$query="select count(*) from login where username='$username' and password='$password'";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);
			if($result[0]>=1){
				//user already exists
				echo "<script>
						$('#displayRes').html('<center><span class=\'alert alert-sm alert-danger\'>User already exists</span></center>').fadeOut(10000);
						window.location.assign('?coordinators');
					</script>";
			}else{
				//performing queries
				$query="insert into login values('$username','$password1')";
				mysql_query($query);

				$query="insert into logindetails(username) values('$username')";
				mysql_query($query);

				//performing second query
				$query="insert into acl(username,pass) values('$username','$password2')";
				mysql_query($query);

				echo "<script>
						$('#displayRes').html('<center><span class=\'alert alert-sm alert-success\'>Coordinator Added</span></center>').fadeOut(10000);
						window.location.assign('?coordinators');
					</script>";
			}
		}

		function addAcl(){
			$username=$this->sanitize($_POST['username']);
			$deptid=$this->sanitize($_POST['dept']);

			//checking if has null dept
			$query="select count(*) from acl where dept=0 and username='$username'";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);
			if($result[0] >=1){
				//found so update
				$query="update acl set dept=$deptid where username='$username' and dept=0";
			}else{
				//insert direct
				//getting password
				$query="select pass from acl where username='$username' limit 1";
				$result=mysql_query($query);
				$result=mysql_fetch_row($result);
				$pass=$result[0];
				$query="insert into acl(username,dept,pass) values('$username',$deptid,'$pass')";
			}
			$result=mysql_query($query);
			if($result){
				echo "<script>
						$('#displayRes').html('<center><span class=\'alert alert-sm alert-success\'>Access Control Added</span></center>').fadeOut(10000);
						window.location.assign('?coordinators');
					</script>";
			}else{
				echo "<script>
						$('#displayRes').html('<center><span class=\'alert alert-sm alert-danger\'>Process failed.</span></center>').fadeOut(10000);
						window.location.assign('?coordinators');
					</script>";
			}
		}

		function delCoordinator(){
			$id=$this->sanitize($_POST['delete']);
			//checking if it's the last acl list
			$query="select username from acl where id=$id limit 1";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);
			$username=$result[0];

			$query="select count(*) from acl where username='$username'";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);
			if($result[0] ==1){
				//last username found; delete from acl and login
				$query="delete from acl where username='$username'";
				mysql_query($query);
				$query="delete from login where username='$username'";
				mysql_query($query);

				$query="delete from logindetails where username='$username'";
				mysql_query($query);
			}else{
				//delete only based on id
				$query="delete from acl where id=$id";
				mysql_query($query);
			}
			echo "<script>
					$('#displayRes').html('<center><span class=\'alert alert-sm alert-success\'>Process successful...</span></center>').fadeOut(10000);
						window.location.assign('?coordinators');
				</script>";
		}

		function getDepartmentList(){
			$query="select * from departments";
			$result=mysql_query($query);
			while($row=mysql_fetch_array($result)){
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
		}

		function getCoordList(){
			$query="select * from acl";
			$result=mysql_query($query);
			while($row=mysql_fetch_array($result)){
				echo "<option value='".$row['username']."'>".$row['username']."</option>";
			}
		}

		//get acl list
		function getACL(){
			$query="select * from acl order by username desc";
			$result=mysql_query($query);
			echo "<table class='table table-bordered table-stripped table-condensed' id='acllist'>";
			echo "<thead>
						<tr><th><center>No.</center></th><th><center>Username</center></th><th><center>Password</center></th><th><center>Department</center></th><th></th></tr>
					</thead>";
					echo "<tbody>";
					$count=1;
			while($row=mysql_fetch_array($result)){
				if($row['dept']==0){
					$row['dept']=' ';
				}
				$dept=$this->getDepartments2(intval($row['dept']));
				$password=$this->encrypt_decrypt('decrypt',$row['pass']);
				echo "<tr><td>".$count."</td><td>".$row['username']."</td><td>".$password."</td><td>".$dept."</td><td><center><form method='post' action='?coordinators' class='form'><button type='submit' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 50px; -moz-border-radius: 50px; -webkit-border-radius: 50px;' name='delete' value='".$row['id']."'><span class='glyphicon glyphicon-remove'></button></form></center></td></tr>";
				$count++;
			}
			echo "</tbody>";
			echo "</table>";
		}

		//update Admin password
		function updateAdminPass(){
			if(isset($_POST['updateUserPass'])){
				$oldusername=$this->sanitize($_POST['oldusername']);
				$username=$this->sanitize($_POST['username']);
				$oldpwd=$this->sanitize($_POST['oldpwd']);
				$oldpwd=sha1($oldpwd);
				$newpwd=$this->sanitize($_POST['newpwd']);
				$newpwd1=$this->sanitize($_POST['newpwd1']);
				$pass=$this->sanitize($_POST['newpwd']);
				$pass=$this->encrypt_decrypt('encrypt',$pass);
				$password=sha1($newpwd);
				if($newpwd==$newpwd1){

					//checking if user with password exists
					$query="select count(*) from login where username='$oldusername' and password='$oldpwd'";
					$result=mysql_query($query);
					$result=mysql_fetch_row($result);
					if($result[0] >= 1){
						$query1="update acl set pass='$pass' where username='$oldusername'";
						mysql_query($query1);
						$query="update login set username='$username',password='$password' where username='$oldusername'";
						$result=mysql_query($query);
						if($result){
							echo "<script>$('#displayRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Password updated successfully..</span></center>').fadeOut(5000); window.location.assign('?logout');</script>";
						}else{
							echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again..</span></center>').fadeOut(5000); window.location.assign('?chngpwd');</script>";
						}
					}else{
						echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again..</span></center>').fadeOut(5000); window.location.assign('?chngpwd');</script>";
					}

					
				}else{
					echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Password don\'t much..</span></center>').fadeOut(5000); window.location.assign('?chngpwd');</script>";
				}
			}
		}

		//session details
		function getSession($username){
			$username=$this->sanitize($username);
			$sql="select ip,date from lastlogin where username='$username' order by date desc limit 2";
			$result=mysql_query($sql);
			$result1=[];
			while($row=mysql_fetch_array($result)){
				$result1[0]=$row['ip'];
				$result1[1]=$row['date'];
			}
			return $result1;
		}

		function getLastPassChng($username){
			$username=$this->sanitize($username);
			$sql="select date from lastpasschng where username='$username' limit 1";
			$result=mysql_query($sql);
			$result=mysql_fetch_row($result);
			return $result[0];
		}

		function getChatList2(){
			$sql="select * from realtimechat order by date desc";
			$result=mysql_query($sql);
			$data="<ul class='chat' style='list-style: none; display: inline;'>";         
			$count=0;
			
			while($row=mysql_fetch_array($result)){
				//checking if user is admin and display his name
				$admin=$row['username'];
				$query1="select count(*) from login where username='$admin'";
				$result1=mysql_query($query1);
				$result1=mysql_fetch_row($result1);
				if($result1[0] >=1){
					$query2="select fullname from logindetails where username='$admin' limit 1";
					$result2=mysql_query($query2);
					$result2=mysql_fetch_row($result2);
					$admin=$result2[0];
				}
				if($count%2==0){		
				                        $data.="<li style='flush: left;'>";
				                        $data.="<span class='chat-img pull-left'>";
				                        $data.="<img src='images/dp.png' style='height: 50px; width: 50px;' class='img-circle'>";
				                        $data.="</span>";
				                        $data.="<div class='chat-body clearfix'>";
				                        $data.="<div style='background-color: #fff;'>";
				                        $data.="<strong class='primary-font'>".$admin."</strong>";
				                        $data.="<small class='pull-right text-muted'>";
				                        $data.="<i class='fa fa-clock-o fa-fw'></i> ".$row['date']. "</small>";
				                        $data.="</div>";
				                        $data.="<p>".$row['message']."</p>";
				                        $data.="</div></li>";
				                        $data.="<li><hr/></li>";

				   }else{
				                		
				                        $data.="<li class='right clearfix'>";
				                        $data.="<span class='chat-img pull-right'>";
				                        $data.="<img src='images/dp.png' style='height: 50px; width: 50px;' class='img-circle'>";
				                        $data.="</span>";
				                        $data.="<div class='chat-body clearfix'>";
				                        $data.="<div style='background-color: #fff;'>";
				                        $data.="<small class='text-muted'>";
				                        $data.="<i class='fa fa-clock-o fa-fw'></i> ".$row['date']. "</small>";
				                        $data.="<strong class='pull-right primary-font'>".$admin."</strong>";
				                        $data.="</div>";
				                        $data.="<p>".$row['message']."</p>";
				                        $data.="</div></li>";
				                        $data.="<li><hr/></li>";
				                }

                $count++;
        	}

        		$data.="</ul>";
        		echo $data;
		}



		function getChatList(){
			$sql="select * from realtimechat order by date desc";
			$result=mysql_query($sql);
			$data="<ul class='chat'>";                    
			$count=0;
			
			while($row=mysql_fetch_array($result)){
				$admin=$row['username'];
				$query1="select count(*) from login where username='$admin'";
				$result1=mysql_query($query1);
				$result1=mysql_fetch_row($result1);
				if($result1[0] >=1){
					$query2="select fullname from logindetails where username='$admin' limit 1";
					$result2=mysql_query($query2);
					$result2=mysql_fetch_row($result2);
					$row['username']=$result2[0];
				}
				if($count%2==0){
				                        $data.="<li class='left clearfix'>";
				                        $data.="<span class='chat-img pull-left'>";
				                        $data.="<img src='images/dp.png' style='height: 50px; width: 50px;' class='img-circle'>";
				                        $data.="</span>";
				                        $data.="<div class='chat-body clearfix'>";
				                        $data.="<div class='header'>";
				                        $data.="<strong class='primary-font'>".$row['username']."</strong>";
				                        $data.="<small class='pull-right text-muted'>";
				                        $data.="<i class='fa fa-clock-o fa-fw'></i> ".$row['date']. "</small>";
				                        $data.="</div>";
				                        $data.="<p>".$row['message']."</p>";
				                        $data.="</div></li>";

				                }else{
				                        $data.="<li class='right clearfix'>";
				                        $data.="<span class='chat-img pull-right'>";
				                        $data.="<img src='images/dp.png' style='height: 50px; width: 50px;' class='img-circle'>";
				                        $data.="</span>";
				                        $data.="<div class='chat-body clearfix'>";
				                        $data.="<div class='header'>";
				                        $data.="<small class='text-muted'>";
				                        $data.="<i class='fa fa-clock-o fa-fw'></i> ".$row['date']. "</small>";
				                        $data.="<strong class='pull-right primary-font'>".$row['username']."</strong>";
				                        $data.="</div>";
				                        $data.="<p>".$row['message']."</p>";
				                        $data.="</div></li>";
				                }

                $count++;
        	}
        		$data.="</ul>";
        		echo $data;
		}

		function addChat($user,$msg){
			$username=$this->sanitize($user);
	       	$message=$this->sanitize($msg);
	        $cd=$this->curDate();
	        $sql="insert into realtimechat values('$username','$message','$cd')";
	       	$result=mysql_query($sql);
	        if($result){
	        	echo 1;
	        }else{
	        	echo 0;
	        }
		}

		//upload student list -csv
		function uploadStudentCSV(){
			if(is_uploaded_file($_FILES['studentlistUpload']['tmp_name'])){
				//checking file extension
				$ext=explode(".", $_FILES['studentlistUpload']['name']);
				$ext=end($ext);
				if($ext !='csv'){
					echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\'>Please upload csv file!!!</span></center>').fadeOut(5000);</script>";
				}else{
					//reading file and uploading to database
				    $handle = fopen($_FILES['studentlistUpload']['tmp_name'], "r");
				
					$count=1;
					$counter=1;
				    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				    		if($counter==1){
				    			//not considering the first row
				    			$counter++;
				    			continue;
				    		}
				    		$data[0]=$this->sanitize($data[0]);
				    		$data[1]=$this->sanitize(ucwords(strtolower($data[1])));
				    		$data[2]=$this->sanitize(ucwords($data[2]));
				    		$data[3]=$this->sanitize($data[3]);
				    		$data[4]=$this->sanitize(strtolower($data[4]));
				    		$data[5]=$this->sanitize(ucwords(strtolower($data[5])));
				    		$data[6]=$this->sanitize(ucwords(strtolower($data[6])));
				    		$data[7]=$this->sanitize(ucwords(strtolower($data[7])));
				    		//setting default password
				    		$defaultpwd=$this->encrypt_decrypt("encrypt",$data[2]);

				    		//adding intelligence for  duplicate 
				    		$query1="select * from studentlist where indexnumber='$data[2]' limit 1";
				    		$result1=mysql_query($query1);
				    		$num1=mysql_num_rows($result1);
				    		$result1=mysql_fetch_row($result1);
				    		if($num1 >= 1){
				    			//there exist a student with that id
				    			//checking time stamp difference 
				    			$dbindex=$result1[2];
				    			if($result1[2] < $data[2]){
				    				//update info
				    				$query2="update studentlist set fullname='$data[1]',mobileNo='$data[3]',email='$data[4]',address='$data[5]',programme='$data[6]',topic='$data[7]',date='$data[0]' where indexnumber='$data[2]'";
				    				mysql_query($query2);
				    				
				    			}
				    		}else{
				    			echo "<script>$('#displayRes').html('<center><span class=\'rotMe alert alert-success\'>Processing data..Please wait!!</span></center>');</script>";
				    			$query="insert into studentlist(fullname,indexnumber,mobileNo,email,address,programme,topic,date,password) values('$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[0]','$defaultpwd')";

        						//$percent=intval($count)/10;
        						mysql_query($query);
        						$count++;
				    		}		
				    		$counter++;
    				}
				    fclose($handle);
				    echo "<script>$('#displayRes').html('<center><span class=\'alert alert-success\'>Processing Complete!!!...<b>".$count."</b> Records Added!!!</span></center>').fadeOut(5000); window.location.assign('?studentList');</script>";
				}
			}else{
				echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\'>Process failed..Try again!!!</span></center>').fadeOut(5000);</script>";
			}
		}


		//generating student list
		function genStudentList(){
			if(isset($_POST['view'])){
				include "admin/studentview.php";
			}elseif(isset($_POST['edit'])){
				include "admin/studentedit.php";
			}else{

				//access control list
				if($_SESSION['cengadmin']=='jayluxferro' || $_SESSION['cengadmin']=='jjkponyo.soe'){
					$sql="select id,indexnumber,programme,topic,date from studentlist order by programme";
				}else{
					$username=$_SESSION['cengadmin'];
					$query="select dept from acl where username='$username'";
					$result=mysql_query($query);
					$data=null;
					$num=mysql_num_rows($result);
					$count=1;
					while($row=mysql_fetch_array($result)){
						$dept=$this->getDepartments2(intval($row['dept']));
						if($count==$num){
							$data.=" programme like '".$dept."' ";
						}else{
							$data.=" programme like '".$dept."' or ";
						}
						
						$count++;
					}
					$sql="select id,indexnumber,programme,topic,date from studentlist where ".$data. " order by programme";
				}
				$result=mysql_query($sql);
				$count=1;
				echo "<table class='table table-bordered table-stripped table-hover table-condensed table-responsive' id='studentListTable'>
					<thead>
						<tr><th><center>No.</center></th><th><center>Index Number</center></th><th><center>Programme</center></th><th><center>Topic</center></th><th><center>Submission Date</center></th><th></th><th></th><th></th></tr>
					</thead>
					<tbody>";
				while($row=mysql_fetch_array($result)){
					echo "<tr><td>".$count."</td><td>".$row['indexnumber']."</td><td>".$row['programme']."</td><td>".$row['topic']."</td><td>".$row['date']."</td><td><center><form method='post' action='#'><button type='submit' class='btn btn-xs btn-info tooltip-bottom' name='view' value='".$row['indexnumber']."' title='View Details' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;'><span class='glyphicon glyphicon-eye-open'></span></button></form></center></td><td><form method='post' action='#'><button type='submit' class='btn btn-xs btn-success tooltip-bottom' name='edit' value='".$row['indexnumber']."' title='Edit Details' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;'><span class='glyphicon glyphicon-edit'></span></button></form></td><td><button type='button' class='btn btn-xs btn-danger tooltip-bottom' name='delete' value='".$row['id']."' title='Delete Details' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;' onclick=\"deleteStudentDetails(this.value);\"><span class='glyphicon glyphicon-remove'></span></button></td></tr>";
					$count++;
				}
				echo "</tbody>
					  </table>";
			}
		}

		function deleteStudentDetails($stdid){
			$id=$this->sanitize($stdid);
			if($id==0){
				$query="delete from studentlist";
			}else{
				$query="delete from studentlist where id=$id";
			}
			$result=mysql_query($query);
			if($result){
				echo 1;
			}else{
				echo 0;
			}
		}



		//verify student
		function verifyStudent(){
			if(isset($_POST['username']) && isset($_POST['password'])){
				$indexnumber=$this->sanitize($_POST['username']);
				$password=$this->encrypt_decrypt("encrypt",$this->sanitize($_POST['password']));
				$sql="select * from studentlist where indexnumber='$indexnumber' and password='$password'";
				$result=mysql_query($sql);
				$num=mysql_num_rows($result);
				if($num >= 1){
					$_SESSION['ceng']=$indexnumber;
					$this->updatelastlogin($indexnumber);
					echo "<script>$('#displayRes').html('<center><span class=\'alert alert-success\'>Log In successful...</span></center>').fadeOut(5000); window.location.assign('index.php');</script>";
				}else{
					echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\'>Log In failed...Try again!!!</span></center>').fadeOut(5000);</script>";
				}
			}
		}

		//load portal
		function loadPortalContent(){
			if(isset($_GET['logout'])){
				unset($_SESSION['ceng']);
				echo "<script>window.location.assign('login.php');</script>";
			}elseif(isset($_GET['dashboard'])){
				include "portal/dashboard.php";
			}else{
				include "portal/dashboard.php";
			}
		}

		//getting last login
		function getLastLogin($username){
			$username=$this->sanitize($username);
			$sql="select date from lastlogin where username='$username' order by date desc limit 2";
			$result=mysql_query($sql);
			$count=0;
			$lastlogin=null;
			while($row=mysql_fetch_array($result)){
				$lastlogin=$row['date'];
				if($count==1){
					break;
				}
				$count++;
			}
			return $lastlogin;
		}


		//get user panel details
		function getStudentDetails($username){
			$username=$this->sanitize($username);
			$sql="select * from studentlist where indexnumber='$username' limit 1";
			$result=mysql_query($sql);
			$result=mysql_fetch_row($result);
			return $result;
		}

		//get uploaded file
		function getUploadedFile($username){
			$username=$this->sanitize($username);
			$sql="select filename,date from files where username='$username' order by date desc limit 1";
			$result=mysql_query($sql);
			$result=mysql_fetch_row($result);

			if($result[0] == null){
				return "<td><span style='color: red;' class='blink'><center>---</center></span></td><td><span style='color: red;' class='blink'><center>---</center></span></td><td><button type='button' class='btn btn-xs btn-info title-bottom' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;' title='View File' disabled><span class='glyphicon glyphicon-eye-open'></span></button></td>";
			}else{
				return "<td>".$result[0]."</td><td>".$result[1]."</td><td><button type='button' class='btn btn-xs btn-info title-bottom' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;' title='View File' onclick=\"window.open('docs/".$result[0]."')\"><span class='glyphicon glyphicon-eye-open'></span></button></td>";
			}
		}

		//unlinking previous file
		function deletePreviousFile($username){
			$username=$this->sanitize($username);
			$sql="select filename from files where username='$username' limit 1";
			$result=mysql_query($sql);
			$result=mysql_fetch_row($result);
			unlink("docs/".$result[0]);
		}

		//upload student project file
		function  uploadStudentFile(){
			if(is_uploaded_file($_FILES['studentProjectUpload']['tmp_name'])){
				//checking file extension
				$ext=explode(".", $_FILES['studentProjectUpload']['name']);
				$ext=end($ext);
				$accepted=['pdf','PDF','docx','doc'];
				if(!in_array($ext, $accepted)){
					echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\'>Please upload pdf/doc/docx file!!!</span></center>').fadeOut(5000);window.location.assign('?dashboard');</script>";
				}else{
					echo "<script>$('#displayRes').html('<center><span class=\'alert alert-success blink\'>Processing...</span></center>').fadeOut(5000); window.location.assign('?dashboard');</script>";
					$username=$_SESSION['ceng'];
					$newFName=$username.".".$ext;
					//unlink previous file
					$this->deletePreviousFile($username);
					if(move_uploaded_file($_FILES['studentProjectUpload']['tmp_name'], "docs/".$newFName)){
						//checking if user has already uploaded a file
						$sql="select * from files where username='$username' order by date limit 1";
						$result=mysql_query($sql);
						$count=mysql_num_rows($result);
						$cDate=$this->curDate();

						//getting student details
						$stddetails=$this->getStudentDetails($username);
						$department=$this->sanitize($stddetails[6]);
						if($count >=1){//user has uploaded a file
							$sql="update files set filename='$newFName',date='$cDate',department='$department' where username='$username'";
						}else{
							$sql="insert into files values('$username','$newFName','$cDate','$department')";
						}
							mysql_query($sql);
							echo "<script>$('#displayRes').html('<center><span class=\'alert alert-success\'>Processing Complete!!!</span></center>').fadeOut(5000); window.location.assign('?dashboard');</script>";
					}else{
						echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\'>Process failed..Try again!!!</span></center>').fadeOut(5000);</script>";
					}
				   
				}
			}else{
				echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\'>Process failed..Try again!!!</span></center>').fadeOut(5000);</script>";
			}
		}

		//generate department list
		function getDepartments(){
			$sql="select name from departments";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result)){
				echo "<option value='".$row['name']."'>".$row['name']."</option>";
			}
		}

		//generate department list
		function getDepartments2($id){
			$id=$this->sanitize($id);
			$sql="select name from departments where id=$id limit 1";
			$result=mysql_query($sql);
			$result=mysql_fetch_row($result);
			return $result[0];
		}

		//last update user details
		function lastupdatedetails($username){
			$cDate=$this->curDate();
			$indexnumber=$this->sanitize($username);
			$sql="insert into lastupdatedetails values('$indexnumber','$cDate')";
			mysql_query($sql);
		}

		//update files
		function updateOtherDetailsAdmin($tablename,$oldusername,$username){
			if($tablename=='files'){
				$query="select filename from files where username='$oldusername'";
				$result=mysql_query($query);
				$num=mysql_num_rows($result);
				if($num > 0){
					$result=mysql_fetch_row($result);
					$filename=$result[0];
					$ext=explode(".", $filename);
					$ext=end($ext);
					$newFName=$username.".".$ext;
					rename("../../docs/".$filename, "../../docs/".$newFName);
					$query="update files set username='$username',filename='$newFName' where username='$oldusername'";
					mysql_query($query);
				}
				
			}else{
				$query="update {$tablename} set username='$username' where username='$oldusername'";
				mysql_query($query);
			}
		}
		function updateOtherDetails($tablename,$oldusername,$username){
			if($tablename=='files'){
				$query="select filename from files where username='$oldusername'";
				$result=mysql_query($query);
				$num=mysql_num_rows($result);
				if($num > 0){
					$result=mysql_fetch_row($result);
					$filename=$result[0];
					$ext=explode(".", $filename);
					$ext=end($ext);
					$newFName=$username.".".$ext;
					rename("docs/".$filename, "docs/".$newFName);
					$query="update files set username='$username',filename='$newFName' where username='$oldusername'";
					mysql_query($query);
				}
				
			}else{
				$query="update {$tablename} set username='$username' where username='$oldusername'";
				mysql_query($query);
			}
		}


		function updateDetails($username){
			$oldusername=$this->sanitize($username);
			$fullname=$this->sanitize($_POST['fullname']);
			$indexnumber=$this->sanitize($_POST['indexnumber']);
			$mobileNo=$this->sanitize($_POST['mobileNo']);
			$email=$this->sanitize($_POST['emailAddr']);
			$address=$this->sanitize($_POST['address']);
			$programme=$this->sanitize($_POST['progstudy']);
			$topic=$this->sanitize($_POST['projectTopic']);
			$sql="update studentlist set fullname='$fullname',indexnumber='$indexnumber',mobileNo='$mobileNo',email='$email',address='$address',programme='$programme',topic='$topic' where indexnumber='$oldusername'";
			$results=mysql_query($sql);
			if($results){
				$this->updateOtherDetails('files',$oldusername,$indexnumber);
				$this->updateOtherDetails('lastlogin',$oldusername,$indexnumber);
				$this->updateOtherDetails('lastpasschng',$oldusername,$indexnumber);
				$this->updateOtherDetails('lastupdatedetails',$oldusername,$indexnumber);
				$this->updateOtherDetails('realtimechat',$oldusername,$indexnumber);
				$_SESSION['ceng']=$indexnumber;
				echo "<script>$('#displayRes').html('<center><span class=\'alert alert-success\'>Processing Complete!!!</span></center>').fadeOut(5000); window.location.assign('?dashboard');</script>";
			}else{
				echo "<script>$('#displayRes').html('<center><span class=\'alert alert-danger\'>Process failed..Try again!!!</span></center>').fadeOut(5000);window.location.assign('?dashboard');</script>";
				
			}
		}


		//generate student report view list
		function genStudentReportList(){
			$sql="select username,filename,date from files order by date";
			$result=mysql_query($sql);
			$count=1;
			while($row=mysql_fetch_array($result)){
				$details=$this->getStudentDetails($row['username']);
				//access control list
				if($_SESSION['cengadmin']=='jayluxferro' || $_SESSION['cengadmin']=='jjkponyo.soe'){
					
				}else{
					$username=$_SESSION['cengadmin'];
					$query="select dept from acl where username='$username'";
					$result1=mysql_query($query);
					$data=[];
					$num=mysql_num_rows($result1);
					$count1=0;
					while($row1=mysql_fetch_array($result1)){
						$dept=$this->getDepartments2(intval($row1['dept']));
						$data[$count1]=$dept;						
						$count1++;
					}
					if(!in_array($details[6], $data)){
						continue;
					}
				}
				echo "<tr><td>".$count."</td><td>".$row['username']."</td><td>".$details[6]."</td><td>".$details[7]."</td><td>".$row['filename']."</td><td>".$row['date']."</td><td><center><button type='button' class='btn btn-xs btn-info title-bottom' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;' title='View File' onclick=\"window.open('../../docs/".$row['filename']."')\"><span class='glyphicon glyphicon-eye-open'></span></button></center></td>";
				$count++;
			}
		}


		//generate statistics
		function genStatistics(){
			$sql="select name from departments where name='Telecommunication Engineering'";
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result)){

				//acl
				if($_SESSION['cengadmin']=='jayluxferro' || $_SESSION['cengadmin']=='jjkponyo.soe'){
					
				}else{
					$username=$_SESSION['cengadmin'];
					$query="select dept from acl where username='$username'";
					$result1=mysql_query($query);
					$data=[];
					$num=mysql_num_rows($result1);
					$count1=0;
					while($row1=mysql_fetch_array($result1)){
						$dept=$this->getDepartments2(intval($row1['dept']));
						$data[$count1]=$dept;						
						$count1++;
					}
					if(!in_array($row['name'], $data)){
						continue;
					}
				}
				//end of acl

				$statistics=$this->getSatisticsData($row['name']);
				echo "<tr><td>".$row['name']."</td><td><center><span style='color: blue;'>".$statistics[1]."</span></center></td><td><center><span style='color: green;'>".$statistics[0]."</span></center></td><td><center><span style='color: orange;'>".$statistics[2]."</span></center></td></tr>";
			}
		}


		//generate satistics data
		function getSatisticsData($department){
			$department=$this->sanitize($department);

			if($department=='all'){
				//acl
				$data=[];
				$sql="select * from files";
				$result=mysql_query($sql);
				$count=0;
				while($row=mysql_fetch_array($result)){
					$details=$this->getStudentDetails($row['username']);
					//access control list
					if($_SESSION['cengadmin']=='jayluxferro' || $_SESSION['cengadmin']=='jjkponyo.soe'){
						
					}else{
						$username=$_SESSION['cengadmin'];
						$query="select dept from acl where username='$username'";
						$result1=mysql_query($query);
						$data1=[];
						$num=mysql_num_rows($result1);
						$count1=0;
						while($row1=mysql_fetch_array($result1)){
							$dept=$this->getDepartments2(intval($row1['dept']));
							$data1[$count1]=$dept;						
							$count1++;
						}
						if(!in_array($details[6], $data1)){
							continue;
						}
					}	
					$count++;
				}
				
				//end of acl
				/*$data=[];
				$sql="select * from files";
				$result=mysql_query($sql);
				$submitted=mysql_num_rows($result);*/
				$data[0]=$count;
				//$sql1="select * from studentlist";
				/*$result1=mysql_query($sql1);
				$total=mysql_num_rows($result1);*/
				//access control list
				if($_SESSION['cengadmin']=='jayluxferro' || $_SESSION['cengadmin']=='jjkponyo.soe'){
					$sql1="select * from studentlist";
				}else{
					$username=$_SESSION['cengadmin'];
					$query="select dept from acl where username='$username'";
					$result11=mysql_query($query);
					$data2=null;
					$num=mysql_num_rows($result11);
					$count11=1;
					while($row=mysql_fetch_array($result11)){
						$dept=$this->getDepartments2(intval($row['dept']));
						if($count11==$num){
							$data2.=" programme like '".$dept."' ";
						}else{
							$data2.=" programme like '".$dept."' or ";
						}
						
						$count11++;
					}
					$sql1="select * from studentlist where ".$data2. " order by programme";
				}

				$result21=mysql_query($sql1);
				$total=mysql_num_rows($result21);
				$data[1]=$total;
				$data[2]=intval($total)-intval($count);
				return $data;
			}else{
				$data=[];
				$sql="select * from files where department='$department'";
				$result1=mysql_query($sql);
				$submitted=mysql_num_rows($result1);
				$data[0]=$submitted;
				$sql1="select * from studentlist where programme='$department'";
				$result2=mysql_query($sql1);
				$total=mysql_num_rows($result2);
				$data[1]=$total;
				$data[2]=intval($total)-intval($submitted);
				return $data;
			}
			
		}

	}
?>
