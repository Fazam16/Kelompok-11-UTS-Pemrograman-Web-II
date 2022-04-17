<?php
session_start();

$host="localhost";
$user="root";
$password="";
$db="phplogin";

$con = mysqli_connect($host,$user,$password,$db);
if (!$con){
	  die("Koneksi gagal:".mysqli_connect_error());
}

$id = $_POST['id'];
$fname = $_POST['fname'];
$username = $_POST['username'];
$email = $_POST['email']; 
$password = $_POST['password'];
$bdate = $_POST['bdate'];
$gender = $_POST['gender1'];
$status = $_POST['status'];
$bio = $_POST['bio'];

if(!($password == null)) {
	$password = password_hash($password, PASSWORD_DEFAULT);
} else {
	$password = $_POST['password1'];
}

if($gender == null){
	$gender = $_POST['gender'];
}

$namaGambar = $_FILES["gambar"]["name"];

if($namaGambar == null){
	mysqli_query($con, "UPDATE accounts SET fname='$fname', username='$username', email='$email', password='$password', bdate='$bdate', gender='$gender', status='$status', bio='$bio' WHERE id='$id'");
} else {
	move_uploaded_file($_FILES["gambar"]["tmp_name"], "img/" . $namaGambar);
	mysqli_query($con, "UPDATE accounts SET fname='$fname', username='$username', email='$email', password='$password', bdate='$bdate', gender='$gender', status='$status', bio='$bio', gambar='$namaGambar' WHERE id='$id'");
}

 

header("location:home.php?pesan=dataupdated");