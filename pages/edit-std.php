

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
	
     
		$obj->edit_std($_POST['fname'],$_POST['lname'],$_POST['gender'],
		$_POST['gname'],$_POST['gphonenum'],$_POST['income'],$_POST['nation']

		 , $_POST['mobno'],$_POST['email'],$_POST['country'],$_POST['state'],$_POST['city'],
		$_POST['address'],$_POST['status'],$_GET['id']);
	
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
			<label>Gender<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-8">
			<?php 
			if (strcasecmp($res->gender,"Male")==0){?>
		 <input type="radio" name="gender" id="male" value="Male" required="required" checked> &nbsp; Male &nbsp;
		 <?php }else{ ?>
		 <input type="radio" name="gender" id="male" value="Male" required="required"> &nbsp; Male &nbsp;
		 <?php }?>
		 <?php 
			if (strcasecmp($res->gender,"female")==0){?>
		 <input type="radio" name="gender" id="female" value="female" checked> &nbsp; Female &nbsp;
		 <?php } else{?>
		 <input type="radio" name="gender" id="female" value="female"> &nbsp; Female &nbsp;
		 <?php }?>
		 <?php 
			if (strcasecmp($res->gender,"other")==0){?>
		 <input type="radio" name="gender" id="other" value="other" checked> &nbsp; Other &nbsp;
		 <?php } else{?>
		 <input type="radio" name="gender" id="other" value="other"> &nbsp; Other &nbsp;
		 <?php }?>
			</div>
			</div>	
	<br><br>		
		     <div class="form-group">
			 <div class="col-lg-2">
			<label>Guardian Name<span id="" style="font-size:11px;color:red">*</span>	</label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="gname" required="required" 
			value="<?php echo htmlentities($res->gname);?>">
			</div>
			 <div class="col-lg-2">
			<label>Guardian Phone Num</label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="gphonenum" id="gphonenum" value="<?php echo htmlentities($res->gphonenum);?>">
			</div>
			</div>	
			<br><br>
					
		     <div class="form-group">
			 <div class="col-lg-2">
			<label>Family Income<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<select class="form-control" name="income"  id="income"required="required" >
        <option value="<?php echo htmlentities($res->income);?>"><?php echo htmlentities($res->income);?></option>
        <option VALUE="20.000.000">20.000.000</option>
        <option value="50.000.000">50.000.000</option>
        <option value="70.000.000">70.000.000</option>
        
       </select>

			</div>
			<div class="col-lg-2">
			<label>Nationality<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control" name="nation" id="nation" required="required" 
			value="<?php echo htmlentities($res->nationality);?>">
			</div>
			</div>	
			</div>	
			<br><br>
			
			
					
		
			 
			</div>	
			</div>	
			<br><br>
		</div>
      	</div>
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
			<input class="form-control" type="number" name="mobno" required="required" maxlength="10" 
			   value="<?php echo htmlentities($res->mobno);?>">
			</div>
			 <div class="col-lg-2">
			<label>Email Id<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<input class="form-control"  type="email" name="email" required="required" 
			value="<?php echo htmlentities($res->emailid);?>">
			</div>
			</div>	
			<br><br>
										
		     <div class="form-group">
			 <div class="col-lg-2">
			<label>Permanent Address<span id="" style="font-size:11px;color:red">*</span></label>
			
			</div>
			<div class="col-lg-4">
			<textarea class="form-control" rows="3" name="address"><?php echo htmlentities($res->address);?></textarea>
			</div>
			</div>	
			<br><br>
						
			</div>	

			<div class="form-group">
			<div class="col-lg-5"></div>
			<div class="col-lg-5"><br><br>
			<input type="submit" class="btn btn-primary" name="submit" value="Update"></button>
			</div>

		</div>	

			<br><br>
		</div>
      	</div>
		</div>					
 
			<br><br>			

					
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
