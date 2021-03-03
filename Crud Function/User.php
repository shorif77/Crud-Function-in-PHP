<?php  include('server.php');

if (isset($_GET['select'])) {
	$id = $_GET['select'];
	$select_state = true;
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
  <title>Library Management System</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="header">
  	<h2>Welcome To Our Library</h2>
	  <a href="User.php?logout='1'" style="color: red;">Logout</a>
  </div>
<?php  

  
$rec = mysqli_query($db, "SELECT * FROM bookinfo WHERE id=$id");
  $record=mysqli_fetch_array($rec);

?>
</table>
<table>
	<thead>
		<tr>
			<th>Bookname</th>
			<th>Writer</th>
			<th>Edition</th>
			<th>Price</th>
			<th>Image</th>
			<th colspan="2">Choose Your Book</th>
		</tr>
	</thead>
	<tbody>
<tbody>

<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
		<td><?php echo $row['bookname']; ?></td>
		<td><?php echo $row['writer']; ?></td>
		<td><?php echo $row['edition']; ?></td>
		<td><?php echo $row['price']; ?></td>
	   <td>	<img src="imgs/<?=$row['image']?>" width="150px" height="100px">	</td>
       <td> <a class="select" href="User.php?select=<?php echo $row['id']; ?>">Select</a></td>

      <?php } ?>

      </tbody>

 </table>
 <table>

 <thead>
		<tr>
			<th>Bookname</th>
			<th>Edition</th>
			<th>Price</th>
		</tr>
	</thead>
    <tbody>
      <tr>
        <td><?php echo $bookname;?></td>
        <td><?php echo $edition;?></td>
        <td><?php echo $price;?></td>
      </tr>
    </tbody>
  </table>
 
