

<?php
session_start ();

if (! (isset ( $_SESSION ['login'] ))) {
	
	header ( 'location:../index.php' );
}
include('../config/DbFunction.php');
	$obj=new DbFunction();
	$rs=$obj->showCourse();
	$ses=$obj->showSubject();
	$res1=$ses->fetch_object();
	//$res1->session;
	if(isset($_POST['submit'])){
	
     
     $obj->register($_POST['cfull'],$_POST['subname'],$_POST['fname'],$_POST['lname'],$_POST['gender'],
     	            $_POST['gname'],$_POST['gphonenum'],$_POST['income'],$_POST['nation']
					, $_POST['mobno'],$_POST['email'],$_POST['address']);
	
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
<title>register</title>
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
	<?php include('leftbar.php');?>


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
<option VALUE="">SELECT</option>
				<?php while($res=$rs->fetch_object()){?>							
			
                        <option VALUE="<?php echo htmlentities($res->cid);?>"><?php echo htmlentities($res->cfull)?></option>
                        
                        
                    <?php }?>   </select>
										</div>
											
										</div>	
										
								<br><br>
								
		<div class="form-group">
		<div class="col-lg-4">
		<label>Select Subject<span id="" style="font-size:11px;color:red">*</span></label>
		</div>
		<div class="col-lg-6">
		<input class="form-control" name="subname"  id="subname" >
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
			<input class="form-control" name="fname" required="required" pattern="[A-Za-z]+$">
			</div>
			 <div class="col-lg-2">
			<label>Last Name<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="lname">
			</div>
			</div>	
			<br><br>
								
		<div class="form-group">
			 <div class="col-lg-2">
			<label>Gender</label>
			
			</div>
			<div class="col-lg-8">
		 <input type="radio" name="gender" id="male" value="Male"> &nbsp; Male &nbsp;
		 <input type="radio" name="gender" id="female" value="Female"> &nbsp; Female &nbsp;
		 <input type="radio" name="gender" id="other" value="Other"> &nbsp; Other &nbsp;
			</div>
			</div>	
	<br><br>		
		     <div class="form-group">
			 <div class="col-lg-2">
			<label>Guardian Name<span id="" style="font-size:11px;color:red">*</span>	</label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="gname" required="required">
			</div>
			 <div class="col-lg-2">
			<label>Guardian Phone Number<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" type="number" name="gphonenum" required="required" maxlength="12">
			</div>
			</div>	
			<br><br>
					
		     <div class="form-group">
			 <div class="col-lg-2">
			<label>Family Income<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<select class="form-control" name="income"  id="income"required="required" >
        <option VALUE="">SELECT</option>
        <option VALUE="20.000.000">20.000.000</option>
        <option value="50.000.000">50.000.000</option>
        <option value="70.000.000">70.000.000</option>
        
       </select>
		</div>	
				</div>
		<br><br>
					
	     <div class="form-group">
		 	<div class="col-lg-2">
				<label>Nationality<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
				<input class="form-control" name="nation" id="nation" required="required">
			</div>
		</div>	
		<br><br>
		</div>
			
		<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading">Contact Informations</div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-12">
			<div class="form-group">
		    <div class="col-lg-2">
			<label>Mobile Number<span id="" style="font-size:11px;color:red">*</span>	</label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" type="number" name="mobno" required="required" maxlength="12">
			</div>
			 <div class="col-lg-2">
			<label>Email Id<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control"  type="email" name="email">
			</div>
			</div>	
			<br>
		     <div class="form-group">
			</div>
			 <div class="col-lg-2">
			<label>Address<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<textarea class="form-control" rows="3" name="address" id="address"></textarea>
			</div>
			</div>	
			<br><br><br><br>
					
	
			<br>
		</div>
      	</div>
		</div>					
			
	<div class="form-group">
		<div class="col-lg-5">
		</div>
		<div class="col-lg-6"><br><br>
			<input type="submit" class="btn btn-primary" name="submit" value="Register"></button>
		</div>
	</div>			
	</div>
	</div><!--row!-->		
	</div>	
			</div>
		</div>
	</div>
	</form>

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



</body>

</html>
