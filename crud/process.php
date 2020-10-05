<?php
session_start();
$mysqli=new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
$id=0;
$update=false;
$name='';
$bgroup='';

if (isset($_POST['save'])){
$name= $_POST['name'];
$bgroup =$_POST['bgroup'];
$mysqli->query("INSERT INTO data (name, bgroup) VALUES ('$name', '$bgroup')") or die ($mysqli->error);
$_SESSION['message']="Record Has Been Saved!!!!";
$_SESSION['msg_type']="success";
header ("location: index.php");


}
if (isset($_GET['delete'])){


    $id=$_GET['delete'];

    $mysqli->query("DELETE FROM data WHERE id=$id") or die ($mysqli->error());

    $_SESSION['message']="Record Has Been Deleted!!!!";
$_SESSION['msg_type']="danger";
header("location: index.php");
}
if (isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die ($mysqli->error());

    if($result->num_rows) {

        $row = $result->fetch_array();
        $name=$row['name'];
        $bgroup=$row['bgroup'];

    }
}
    if (isset($_POST['update'])){
        $id= $_POST['id'];
        $name =$_POST['name'];
        $bgroup =$_POST['bgroup'];
        $mysqli->query("UPDATE data SET name='$name', bgroup='$bgroup' WHERE id=$id") or die ($mysqli->error);


        $_SESSION['message']="Record Has Been Updated!!!!";
        $_SESSION['msg_type']="warning";
        header("location: index.php");


}





?>