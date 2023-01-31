
<?php
require('Database.php');
//$db = Database::getInstance();
//$mysqli = $db->getConnection();
class DbFunction{
	
	function login($loginid,$password){
	
      if(!ctype_alpha($loginid) || !ctype_alpha($password)){
      	
        echo "<script>alert('Either LoginId or Password is Missing')</script>";
      
      }		
   else{		
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT loginid, password FROM login where loginid=? and password=? ";
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
		
		trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
	}
	
	else{
		
		$stmt->bind_param('ss',$loginid,$password);
		$stmt->execute();
		$stmt -> bind_result($loginid,$password);
		$rs=$stmt->fetch();
		if(!$rs)
		{
			echo "<script>alert('Invalid Details')</script>";
			header('location:login.php');
		}
		else{
			
			header('location:dashboard.php');
		}
	}
	
	}
	
	}
	
	function create_course($cshort,$cfull,$hod){
		
				if($cshort==""){
			 
			echo "<script>alert('Select  Course Short Name')</script>";
		
		}
		
		
		else if($cfull==""){
			 
			echo "<script>alert('Select  Course Full Name')</script>";
		
		}
		
		else{
			
			
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into course(cshort,cfull,hod)values(?,?,?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('sss',$cshort,$cfull,$hod);
				$stmt->execute();
				echo "<script>alert('Course Added Successfully')</script>";
				echo "<script>window.location.href='view-course.php'</script>";
				
			}
		}				
	}

function showCourse(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM course ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showCourse1($cid){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM course  where cid='".$cid."'";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showSubject(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM subject ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function showSubject1($sid){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM subject where subid='$sid' ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}

function create_subject($cshort,$cfull,$subname,$lecturer){
		
				if($cshort==""){
			 
			echo "<script>alert('Select  Course Short Name')</script>";
		
		}
		
		
		else if($cfull==""){
			 
			echo "<script>alert('Select  Course Full Name')</script>";
		
		}
		
		else{
			
			
			$db = Database::getInstance();
			$mysqli = $db->getConnection();
			$query = "insert into subject(cshort,cfull,subname,lecturer)values(?,?,?,?)";
			$stmt= $mysqli->prepare($query);
			if(false===$stmt){
			
				trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			}
			
			else{
			
				$stmt->bind_param('ssss',$cshort,$cfull,$subname,$lecturer);
				$stmt->execute();
				echo "<script>alert('Subject Added Successfully')</script>";
				echo "<script>window.location.href='view-subject.php'</script>";
				
			}
		}				
	}
	
function showStudents(){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM registration ";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}	

function showStudents1($id){
	
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "SELECT * FROM registration  where id='".$id."'";
	$stmt= $mysqli->query($query);
	return $stmt;
	
}	

function register($cfull,$subname,$fname,$lname,$gender,$gname,$gphonenum,$income,$nation,$mobno,
					$email,$address){
 			          
 			        $db = Database::getInstance();
		           	$mysqli = $db->getConnection();
		           	
		           //	echo $session;exit;
   $query = "INSERT INTO `registration` (`course`, `subject`, `fname`, `lname`, `gender`, `gname`, `gphonenum`,
                     `income`, `nationality`, `mobno`, `emailid`, `address`,regno) 
                   VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
			        $reg=rand();
			        $stmt= $mysqli->prepare($query);
			        if(false===$stmt){
			
			     	trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			    }
			
			    else{
			
			$stmt->bind_param('sssssssssssss',
		         	$cfull,$subname,$fname,$lname,$gender,$gname,$gphonenum,$income,$nation,$mobno,
					$email,$address,$reg);
			$stmt->execute();
		   	echo "<script>alert('Successfully Registered , your registration number is $reg')</script>";
			echo "<script>window.location.href='view-res.php'</script>";
		 	//header('location:login.php');
				
		  }
				


       }


function edit_course($cshort,$cfull,$hod,$id){

    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	//echo $cshort.$cfull.$udate.$id;exit;
	$query = "update course set cshort=?,cfull=? ,hod=? where cid=?";
	$stmt= $mysqli->prepare($query);
	$stmt->bind_param('sssi',$cshort,$cfull,$hod,$id);
	$stmt->execute();
    echo '<script>'; 
    echo 'alert("Course Updated Successfully")'; 
    echo '</script>';
	echo "<script>window.location.href='view-course.php'</script>";

}


function edit_subject($subname,$lecturer,$id){

    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "update subject set subname=?,lecturer=? where subid=?";
	$stmt= $mysqli->prepare($query);
	$stmt->bind_param('ssi',$subname,$lecturer,$id);
	$stmt->execute();
    echo '<script>'; 
    echo 'alert("Subject Updated Successfully")'; 
    echo '</script>';
	echo "<script>window.location.href='view-subject.php'</script>";

}

function edit_res($cfull,$subname,$fname,$lname,$email,$status,$id){
  // echo $id;exit;
    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "update registration set course=?,subject=?,fname=?,lname=?,emailid=?,status=? where id=?" ;
    //echo $query;
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
			
			     	trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			    }

	$rc=$stmt->bind_param('ssssssi',$cfull,$subname,$fname,$lname,$email,$status,$id);
				   
    //echo $rc;
 if ( false===$rc ) {
 
            die('bind_param() failed: ' . htmlspecialchars($stmt->error));
  }		   
	$rc=$stmt->execute();
	
	if ( false==$rc ) {
          die('execute() failed: ' . htmlspecialchars($stmt->error));
    }
	else{
         echo '<script>'; 
         echo 'alert(" Successfully Updated")'; 
          echo '</script>';
		  echo "<script>window.location.href='view-res.php'</script>";
		}  
  
}

function edit_std($fname,$lname,$gender,$gname,$gphonenum,$income,
                  $nation,$mobno,$email,$address,$id){
  // echo $id;exit;
    $db = Database::getInstance();
	$mysqli = $db->getConnection();
	$query = "update registration set fname=?,lname=?,gender=?,gname=?,gphonenum=?
              , income=?,nationality=?,mobno=?,emailid=?,address=? where id=?" ;
    //echo $query;
	$stmt= $mysqli->prepare($query);
	if(false===$stmt){
			
			     	trigger_error("Error in query: " . mysqli_connect_error(),E_USER_ERROR);
			    }

	$rc=$stmt->bind_param('ssssssssssi',$fname,$lname,$gender,$gname,$gphonenum,$income,
                  $nation,$mobno,$email,$address,$id);
				   
    //echo $rc;
 if ( false===$rc ) {
 
            die('bind_param() failed: ' . htmlspecialchars($stmt->error));
  }		   
	$rc=$stmt->execute();
	
	if ( false==$rc ) {
          die('execute() failed: ' . htmlspecialchars($stmt->error));
    }
	else{
         echo '<script>'; 
         echo 'alert(" Successfully Updated")'; 
          echo '</script>';
		  echo "<script>window.location.href='view-std.php'</script>";
		}  
  
}


function del_course($id){

   //  echo $id;exit;
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from course where cid=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('s',$id);
	$stmt->execute();
    echo "<script>alert('Course has been deleted')</script>";
    echo "<script>window.location.href='view-course.php'</script>";
}

function del_std($id){

   $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from registration where id=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('i',$id);
	$stmt->execute();
    echo "<script>alert('One record has been deleted')</script>";
    echo "<script>window.location.href='view-std.php'</script>";

}

 function del_subject($id){

     //echo $id;exit;
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $query="delete from subject where subid=?";
    $stmt= $mysqli->prepare($query);
    $stmt->bind_param('i',$id);
	$stmt->execute();
    echo "<script>alert('Subject has been deleted')</script>";
    echo "<script>window.location.href='view-subject.php'</script>";
}

}

?>



