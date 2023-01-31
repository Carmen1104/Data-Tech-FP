

<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
}
include('../config/DbFunction.php');
	$obj=new DbFunction();
	$id=$_GET['id'];
    $rs=$obj->showStudents1($id);
    $res=$rs->fetch_object(); 
	$c=$res->course;
    $cname=$obj->showCourse1($c);
    $res1=$cname->fetch_object();
	$rs1=$obj->showCourse();
	if(isset($_POST['submit'])){
	
     
		$obj->edit_res($_POST['cfull'],$_POST['subname'],$_POST['fname'],$_POST['lname'],
		$_POST['email'], $_POST['status'],$_GET['id']);
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>edit students</title>
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
</head>

<body>
<form method="post" >
	<div id="wrapper">
	<!--left !-->
    <?php include('leftbar.php')?>;
	 

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?></h4>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading">Register</div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-10">
			<div class="form-group">
		    <div class="col-lg-4">
			<label>Select Course<span id="" style="font-size:11px;color:red">*</span>	</label>
			</div>
			<div class="col-lg-6">
<select class="form-control" name="cfull" id="cfull"  onchange="showSub(this.value)" required="required" >			
<option VALUE="<?php echo $res1->cid?>"><?php echo $res1->cshort?></option>
				<?php while($res2=$rs1->fetch_object()){?>							
			
                   <?php if($res2->cid==$res1->cid){
				   continue;
				   }else
				   
				   ?>                     
					 <option VALUE="<?php echo htmlentities($res2->cid);?>"><?php echo htmlentities($res2->cfull)?></option>
                        
                        
                    <?php }?>   </select>
										</div>
											
										</div>	
										
								<br><br>
								
		<div class="form-group">
		<div class="col-lg-4">
		<label>Select Subject<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
 <input class="form-control" name="subname"  id="subname"  value="<?php echo $res->subject;?>">
       </select>
	</div>
	 </div>	
										
	 <br><br>								
			
	</div>	
	<br><br>		
		
									
													
				</div>

					</div>
								
							</div>
							
						</div>
						
					</div>
			<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading">Personal Informations</div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-12">
			<div class="form-group">
		    <div class="col-lg-2">
			<label>First Name<span id="" style="font-size:11px;color:red">*</span>	</label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="fname" value="<?php echo htmlentities($res->fname);?>"required="required">
			</div>
			 <div class="col-lg-2">
			<label>Last Name</label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="lname" value="<?php echo htmlentities($res->lname);?>">
			</div>
			</div>	
			<br><br>
								
		<div class="form-group">
			 <div class="col-lg-2">
			<label>Email<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control"  type="email" name="email" required="required" 
			value="<?php echo htmlentities($res->emailid);?>">
			
			</div>
			<div class="col-lg-2">
			<label>Approval Status</label>
			
			</div>
			<div class="col-lg-4">
			<select class="form-control" name="status"  id="status"required="required" >
        <option value="<?php echo htmlentities($res->status);?>"><?php echo htmlentities($res->status);?></option>
		<option VALUE="approved">Approved</option>
        <option value="pending">Pending</option>
        <option value="denied">Denied</option>
		</select>
			</div>

			</div>
			</div>	
	<br><br>		

		<div class="form-group">
			<div class="col-lg-5"></div>
			<div class="col-lg-5"><br><br>
			<input type="submit" class="btn btn-primary" name="submit" value="Update"></button>
			</div>

		</div>			
	</div>             
                        
				</div>
				
			</div>
			
		</div>
		

	</div>
	

	<!-- jQuery -->
	<script src="../bower_components/jquery/dist/jquery.min.js"
		type="text/javascript"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="../bower_components/metisMenu/dist/metisMenu.min.js"
		type="text/javascript"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>
	
	<script>
function showState(val) {
    
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'id='+val,
	success: function(data){
	  // alert(data);
		$("#state").html(data);
	}
	});
}

function showDist(val) {
    
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'did='+val,
	success: function(data){
	  // alert(data);
		$("#dist").html(data);
	}
	});
	
}



function showSub(val) {
    
    //alert(val);
  	$.ajax({
	type: "POST",
	url: "subject.php",
	data:'cid='+val,
	success: function(data){
	  // alert(data);
		$("#c-full").val(data);
	}
	});
	
}
</script>
</form>
</body>

</html>
