<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

<?php require_once 'process.php'; ?>
<?php 
if (isset($_SESSION['message'])):

?>
<div class="alert alert- <?=$_SESSION['msg_type']?>">
<?php 

echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</div>
<?php endif ?>
<!--showing name and blood group -->

<div class="container">
<?php
$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM data") or die ($mysqli->error);
?>
<div class="row justify-content-center">
<table class="table">
<thead>
<tr>
<th>name</th>
<th>Blood-Group</th>
<th colspan="2">Action</th>
</tr>
</thead>
<?php 
while ($row =$result->fetch_assoc()):?>
<tr>
<td>
<?php echo $row['name']; ?>
</td>
<td>
<?php echo $row['bgroup']; ?>
</td>
<td>
<a href="index.php?edit=<?php echo $row['id'];?>"
class="btn btn-info">Edit</a>
<a href="process.php?delete=<?php echo $row['id'];?>"
class="btn btn-danger">Delete</a>
</td>
</tr>
<?php endwhile;
?>
</table>
</div>


<?php
function pre_r ($array){

    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>
<!--showing name and blood group -->


<!--Form -->
<div class="row justify-content-center">
<form action="process.php" method="POST">
<input type="hidden"name="id" value="<?php echo $id; ?>">
<div class="form-group">

<label>Name</label>
<input type="text" name="name"class="form-control" value="<?php echo $name ?>" placeholder="Enter Your Name">
</div>
<div class="form-group">

<label>Blood Group</label>
<input type="text" name="bgroup"class="form-control" value="<?php echo $bgroup ?>"placeholder="Enter Your Blood Group">
</div>

<div class="form-group">
<?php 
if($update ==true):
?>
<button type="submit" class="btn btn-info" name="update">Update</button>
<?php else: ?>
<button type="submit" class="btn btn-primary" name="save">Save</button>
<?php endif ?>
</div>
</form>

</div>
</div>
<!--Form -->


</body>
</html>