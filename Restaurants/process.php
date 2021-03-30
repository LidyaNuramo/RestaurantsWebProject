<?php
require_once('lib\database.php');

if(!empty($_GET['action'])){
	switch($_GET['action']){
		case 'login':
	       $email=$_POST['email'];
		   $password=$_POST['password'];
	       $where['Email']= '="'.$email.'"';
		   $database=new Database();
		   $user=$database->getRow("users","*",$where);
	   		session_start();
		   if($user['Password']==$password){
			   $_SESSION['username']=$user['FirstName'];
			   $_SESSION['lastname']=$user['LastName'];
			   $_SESSION['userID']=$user['userID'];
			  header('Location:home.php');
			   break;
		   }
		   else{
	         header('Location:index.php?action=no');
		   }
		   
		   break;
		case 'signup':
			$fname=$_POST['firstname'];
			$lname=$_POST['lastname'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$database=new Database();
			$where['Email']= '="'.$email.'"';
	        $database=new Database();
	        $results=$database->getRows("users","*",$where);
			$num=1;
			foreach($results as $result){
			    $num=$num+1;
			}
			if ($num==1){
				$data=array(
					"userID"=>null,
					"Email"=>$email,
					"FirstName"=>$fname,
					"LastName"=>$lname,
					"Password"=>$password,
				);
				$database->insertRows("users",$data);
				$rr="Location: index.php?action=yes";
				header($rr);
				break;
			}
			$rr="Location: signup.php?action=no";
			header($rr);
			break;
		case 'logout':
			session_start();
			if(isset($_SESSION['username'])){
				session_destroy();
				header('Location:index.php');
			}
			else{
				header('Location:index.php');
			}
			break;
		case 'addRest':
			$name=$_POST['restName'];
			$desc=$_POST['Comment'];
			$rate=$_POST['rate'];
			$phone=$_POST['contact'];
			$email=$_POST['email'];
			$website=$_POST['website'];
			$address=$_POST['inputAddress'];
			$city=$_POST['city'];
			
			$data=array(
				"RestID"=>null,
				"Name"=>$name,
				"Description"=>$desc,
				"Rating"=>(int)$rate,
				"Address"=>$address,
				"CityID"=>$city,
				"ContactNum"=>$phone,
				"Email"=>$email,
				"Website"=>$website,
			);
			$database=new Database();
			$database->insertRows("Restaurant",$data);
			$rr="Location: view.php";
			header($rr);
			break;
		case 'deleteRest':
			$id=$_GET['id'];
			$where['RestID']= '='.$id;
			$database=new Database();
			$database->removeRows("restaurant",$where);
			$database->removeRows("image",$where);
			$database->removeRows("review",$where);
			header('Location: view.php');
			break;
		case 'addcomment':
			$id=$_GET['id'];
			$name=$_POST['RevName'];
			$Comment=$_POST['Comment'];
			$data=array(
				"RevID"=>null,
				"RestID"=>$id,
				"ReviewerName"=>$name,
				"Comment"=>$Comment,
			);
			$database=new Database();
			$database->insertRows("Review",$data);
			$rr="Location: restaurant.php?id=".$id;
			header($rr);
			break;
		case 'deleteComm':
			$id=$_GET['id'];
			$id2=$_GET['id2'];
			$where['RevID']= '='.$id2;
			$database=new Database();
			$database->removeRows("review",$where);
			header('Location: edit.php?id='.$id);
			break;
		case 'deleteImage':
			$id=$_GET['id'];
			$id2=$_GET['id2'];
			$where['ImageID']= '='.$id2;
			$database=new Database();
			$database->removeRows("image",$where);
			header('Location: edit.php?id='.$id);
			break;
		case 'editRest':
		   	$id=$_GET['id'];
			$name=$_POST['restName'];
			$desc=$_POST['Description'];
			$rate=$_POST['rate'];
			$phone=$_POST['contact'];
			$email=$_POST['email'];
			$website=$_POST['website'];
			$address=$_POST['Address'];
			$city=$_POST['city'];
			
			$data=array(
				"Name"=>$name,
				"Description"=>$desc,
				"Rating"=>(int)$rate,
				"Address"=>$address,
				"CityID"=>$city,
				"ContactNum"=>$phone,
				"Email"=>$email,
				"Website"=>$website,
			);
			$where['RestID']= '='.$id;
			$database=new Database();
			$database->updateRows("restaurant",$data,$where);
			header('Location: restaurant.php?id='.$id);
			break;
		case 'addImages':
			$id=$_GET['id'];
			$name=$_POST['imageName'];
			$desc=$_POST['Description'];
			$database=new Database();
		    $upload_dir = 'images'.DIRECTORY_SEPARATOR; 
		    $allowed_types = array('jpg', 'png', 'jpeg', 'gif'); 
		    $maxsize = 2 * 1024 * 1024;  
	        foreach ($_FILES['files']['tmp_name'] as $key => $value) { 
	            $file_tmpname = $_FILES['files']['tmp_name'][$key]; 
	            $file_name = $_FILES['files']['name'][$key]; 
	            $file_size = $_FILES['files']['size'][$key]; 
	            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 
	            $filepath = $upload_dir.$file_name; 
	            $data=array(
	            	"ImageID"=>null,
					"RestID"=>$id,
					"Image"=>"images".DIRECTORY_SEPARATOR.$file_name,
					"FileName"=>$name,
					"Description"=>$desc,
				);
	            if(in_array(strtolower($file_ext), $allowed_types)) {  
	                if ($file_size > $maxsize)          
	                    echo "Error: File size is larger than the allowed limit.";  
	                if(file_exists($filepath)) { 
	                    $filepath = $upload_dir.time().$file_name; 
	                    if( move_uploaded_file($file_tmpname, $filepath)) { 
	                    	$database->insertRows("Image",$data);
	                    }  
	                    else {                      
	                        echo "Error uploading {$file_name} <br />";  
	                    } 
	                } 
	                else { 
	                  
	                    if( move_uploaded_file($file_tmpname, $filepath)) {
	                    	$database->insertRows("Image",$data); 
	                    } 
	                    else {                      
	                        echo "Error uploading {$file_name} <br />";  
	                    } 
	                } 
	            } 
	            else { 
	                echo "Error uploading {$file_name} ";  
	                echo "({$file_ext} file type is not allowed)<br / >"; 
	            } 
	        }
	        header('Location: edit.php?id='.$id);
			break;
			case 'changePass':
				$password=$_POST['password'];
				$oldpassword=$_POST['password1'];
				$database=new Database();
				session_start();
				$where['userID']= '='.$_SESSION['userID'];
			    echo "Hello";
			    $user=$database->getRow("Users","*",$where);
			    if ($password==$oldpassword){
			    	header('Location:profile.php?action=no2');
		        	break;
			    }
			    else{
			    	if($user['Password']==$oldpassword){
			    		$data=array(
							"Email"=>$user['Email'],
							"FirstName"=>$user['FirstName'],
							"LastName"=>$user['LastName'],
							"Password"=>$password,
						);
						$database->updateRows("users",$data,$where);
						header('Location:profile.php?action=yes');
						break;
			    	}
			    	else{
						header('Location:profile.php?action=no1');
			        	break;
				   	}
			       	
			    }
			    
			}
}