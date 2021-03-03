
<?php  include('server.php');

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$edit_state = true;
	$rec = mysqli_query($db, "SELECT * FROM bookinfo WHERE id=$id");

	$record=mysqli_fetch_array($rec);
	  
		$bookname = $record['bookname'];
		$writer = $record['writer'];
		$edition=$record['edition'];
		$price=$record['price'];
		$image=$record['image'];	
		$id=$record['id'];
	
	}
?>

 <!DOCTYPE html>
 <html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
   </head>
   <body>
    <div class="header"><h2>Library Management System</h2>
    	<a href="Set_All_Information.php?logout='1'" style="color: red;">Logout</a>
		</div>
    <div class="content">
  	<!-- provide notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
       </div>
     	<?php endif ?>

		    <!-- logged in user information -->
	  <?php  if (isset($_SESSION['username'])) : ?>
	

	    <marquee behavior="scroll" direction="right">Welcome our Website --<strong><?php echo $_SESSION['username']; ?></strong></marquee>
    	<p><right><a href="Set_All_Information.php?logout='1'" style="color: red;">logout</a></left> </p>
         <?php endif ?>
	   </div>

            <?php if (isset($_SESSION['msg'])): ?>
	             <div class="msg">
		            <?php 
		               	echo $_SESSION['msg']; 
		            	unset($_SESSION['msg']);
		             ?>
                </div>
         <?php endif ?>

<table>
	<thead>
		<tr>
			<th>Bookname</th>
			<th>Writer</th>
			<th>Edition</th>
			<th>Price</th>
			<th>Image</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
		
		<td><?php echo $row['bookname']; ?></td>
		<td><?php echo $row['writer']; ?></td>
		<td><?php echo $row['edition']; ?></td>
		<td><?php echo $row['price']; ?></td>
	      <!--image -->
	    <td><img src="imgs/<?=$row['image']?>" width="150px" height="100px"></td> 
	    <td> <a class="edit_btn" href="Set_All_Information.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
	    <td><a class= "del_btn" href="server.php?del=<?php echo $row['id'];?>">Delete</a></td>
	      
		  </tr>
	      <?php } ?>	
	</tbody>
</table>

            <form method="post" action ="server.php" enctype="multipart/form-data">
		       	<!--- newly added field-->
            <input type="hidden" name="id" value="<?php echo $id; ?>">

		     <div class="input-group">

			 <!-- modified form fields-->
		    <label>Bookname</label>
		        <input type="text" name="bookname" value="<?php echo $bookname; ?>">
	                 	 </div>
	                    	<div class="input-group">
		                 	<label>Writer</label>
		                 	<input type="text" name="writer" value="<?php echo $writer; ?>">
			
			                 </div>
			               <div class="input-group">
			              <label>Edition</label>
			               <input type="text" name="edition" value="<?php echo $edition; ?>">
		                 </div>
		               <div class="input-group">
			          <label>Price</label>
			        <input type="text" name="price" value="<?php echo $price; ?>">
			      </div>
				<div>
         	  <input type="file" name="image"> <!--image option -->
         	</div>
	     	<div class="input-group"></div>
 
	               	<?php if ($edit_state == false): ?>
			           <button  type="submit" name="save"class="btn"> save</button>
                      <?php else: ?>

	                 <button  type="submit" name="update"class="btn"> update</button>
                <?php endif ?>
           </div>
	   </form>
   </body>
</html>