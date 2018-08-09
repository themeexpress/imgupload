<?php
include('scripts/connect.php');
if (isset($_POST['submit'])) {
$file=$_FILES['file']['name'];
$dest="uploads/$file";
$src=$_FILES['file']['tmp_name'];
move_uploaded_file($src,$dest);
$name=$_POST['name'];

$result=mysqli_query($con,"insert into img(name,src) values('$name','$dest')");
if ($result) {
	echo "Data inserted Successfully";
}
else{
	echo "Error Data is not inserted";
	}
}
?>


<h1>Video Gallery</h1>
<?php 
$result= mysqli_query($con,"select * from img");
while($row = mysqli_fetch_assoc($result)) {?>
        
        <video width="320" height="240" autoplay>
        <source src="<?php echo $row["src"]?>" type="video/mp4">
       
      </video>
    

<?php } ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"enctype="multipart/form-data">
  	<label>name</label><input  type="text" name="name" id="name" /><br/>  	
  	<label>Upload file</label><input  type="file" name="file" id="file" /><br/>	
	<input type="submit" value="Upload Image" name="submit">
</form>

	
