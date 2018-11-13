
<!-- <link rel="stylesheet" type="text/css" href="./CSS/form.css"> -->

  <?php require("./nav.html"); ?>
	<?php include("./connectDB.php"); ?>

	<h1>Manage Database</h1>


<!-- Search Textbox with DB Querry -->
<form action="" method="post">
<div class="input-group col-lg-4">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="submit" value="Search">Search</button>
  </div>
  <input type="text" class="form-control" list="companyName" name="search" placeholder="Company Name" >
  <datalist id='companyName'>
  <?php 
      $conn = dbConnect();
      $sql = "select client from testapp";
      $result = $conn->query($sql);
       while($row = $result->fetch_assoc())
       {
         $company = $row["client"];
         echo "<option>$company</option>";
       }   
      dbClose($conn);
    ?>
  </datalist>
</div>

  <!-- <input type="text" list="companyName" name="search" placeholder="Company Name"> -->
  
  <!-- <input type="submit" class="btn btn-primary btn-lg" value="Search"> -->
</form>

<!-- Search Results with the ability to delete a specified entry -->
<form action="" method="post">
<?php
	//pull only the results from the search text box
	$conn = dbConnect();
  if(isset($_POST['search']))
  {
    $searchq = $_POST['search'];
    $sql = "SELECT * FROM testapp where client like '$searchq'" ;
//    echo($sql);
    $result = $conn->query($sql);
    if($result->num_rows == 0)
    {
      $output = 'Name not found.  Please search another name.';
    }else
      
      echo "<table class='table table-hover col-lg-6'><tr>
        <th scope='col'>Delete</th>
        <th scope='col'>Company Name</th>
        <th scope='col'>Category</th> 
        <th scope='col'>Sub Category</th> 
      </tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr> 
          <td scope='row'><input id='mainID[]'name='mainID[]' type='checkbox' value='" . $row["id"] ."'> </td>
          <td>".$row["client"]."</td>
          <td>".$row["category"]."</td> 
          <td>".$row["subcategory"]."</td> 
         </tr>";
    }
    echo "</table>";
    echo "<input type='submit'   class= 'btn'  value='Delete'>";
  }
dbClose($conn);

?>

</form>

<?php
  if(isset($_POST['mainID']))
  {
  //  $searchq = $_POST['Delete'];
    $conn = dbConnect();
    $mainID = $_POST['mainID'];
    foreach ($mainID as $value) 
    {
      $query="DELETE FROM testapp WHERE mainid= '$value' ";
      //echo $query;
      $result = $conn->query($query);
      echo "<h5> Company information has been deleted</h5>";
    }
    dbClose($conn);
  }
  
?>




<hr>
<h2>
	All Categories
</h2>
<!-- Display all Reference Table data -->
	<table id="displayTable">
		<tr class="header">
			<th>ID</th>
			<th>Category</th>
			<th>Description</th>
		</tr>
		<?php
		// Pull all data from Reference Table in database and display it
		$conn = dbConnect();
		
		$result = mysqli_query($conn,"SELECT * FROM reftable");
		//('refid', 'category', 'description') 
		while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>" . $row['refid'] . "</td>";
				echo "<td>" . $row['category'] . "</td>";
				echo "<td>" . $row['description'] . "</td>";
				echo "</tr>";
			}
		?>
  </table>
  







<?php require("./footer.html"); ?>