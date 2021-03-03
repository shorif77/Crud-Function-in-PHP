<?php 
    session_start();
    // connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'crud');

    // initialize variables
    $username = "";
    $email    = "";
    $errors = array();
    
	$bookname = "";
    $writer = "";
    $edition="";
    $price ="";
    $image="";
    $msg = "";
	$id = 0;
    $edit_state= false;
    
     // REGISTER USER and Admin same database table
      if (isset($_POST['register'])) {
        // receive all input values from the form
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
        $Image = mysqli_real_escape_string($db, $_POST['Image']);

           // form validation: ensure that the form is correctly filled ...
          // by adding (array_push()) corresponding error unto $errors array

        if (empty($username)) { 
            array_push($errors, "Username is required");
         }
        if (empty($email)) {
             array_push($errors, "Email is required");
             }
        if (empty($password)) {
             array_push($errors, "Password is required");
             }
        if ($password != $confirm_password) {
          array_push($errors, "The two passwords do not match");
        }

             // Finally, register user if there are no errors in the form
              if (count($errors) == 0) {
        
                $sql = "INSERT INTO user (username, email, password, Image) 
                      VALUES('$username', '$email', '$password','$Image')";
                      mysqli_query($db, $sql);
                      $_SESSION['username'] = $username;
                      header('location: login.php');
            }
        }

    
// LOGIN USER
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    
    // if user exists
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {

          // first check the database to make sure 
         // a user does not already exist with the same username 
    
         $query = mysqli_query($db,"SELECT * FROM `user` WHERE username='$username' AND password='$password'");
         
            //admin page must be password and username "admin""admin"
            if(mysqli_num_rows($query)==1){
                $res = mysqli_fetch_assoc($query);
                if($res['username'] == "admin" && $res['password'] == "admin"){
                    header('location: Set_All_Information.php');
                }
               // user page check password and username
                if( $res['username'] != "admin" && $res['password'] != "admin"){
                    if($res['username'] == $username && $res['password'] == $password){
                        header('location: User.php');
                    } 
                 }

              }
             else{
                echo "Wrong Info";
            }
        }
  }



    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }

  //save data into table 
	if (isset($_POST['save'])) {
        $bookname = $_POST['bookname'];
		$writer = $_POST['writer'];
		$edition=$_POST['edition'];
        $price=$_POST['price']; 
        $image = $_FILES['image']['name'];
        $target = "imgs/".basename($image);

        mysqli_query( $db,"INSERT INTO bookinfo (bookname, writer,edition,price,image) VALUES ('$bookname', '$writer', '$edition', '$price', '$image')"); 
  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
          echo $msg = "Image uploaded successfully";// image uploaded confirmation message

  	}else{
  		$msg = "Failed to upload image";// image uploaded failed message
  	}   
        $_SESSION['message'] = "Information saved"; 
		header('location: Set_All_Information.php');
    }


// update table 
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $bookname = $_POST['bookname'];
		$writer = $_POST['writer'];
		$edition=$_POST['edition'];
        $price=$_POST['price'];
      //image update code
        $image= $_FILES['image']['name'];
        $image_temp=$_FILES['image']['tmp_name'];
        move_uploaded_file($image , "imgs/$image");

    
        mysqli_query($db, "UPDATE bookinfo SET  bookname='$bookname', writer='$writer', edition='$edition', price='$price', image='$image'  where id='$id'") ;
         // update comfirmation message
            $_SESSION['message'] = "Information saved"; 
            header('location: Set_All_Information.php');
       
    }
    
     // deteted all data from selected table
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM bookinfo WHERE id=$id");
        $_SESSION['message'] = "Information deleted!"; 
        header('location: Set_All_Information.php');
    }

    $results = mysqli_query($db, "SELECT * FROM bookinfo");

    
?>