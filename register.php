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

  $fname=$_POST["fname"];
  $username=$_POST["username"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $bdate=$_POST["bdate"];
  $gender=$_POST["gender"];
  $status=$_POST["status"];
  $bio=$_POST["bio"];

  $password = password_hash($password, PASSWORD_DEFAULT);

  if(isset($_POST["kirim"])) {
    $namaGambar = $_FILES["gambar"]["name"];
    move_uploaded_file($_FILES["gambar"]["tmp_name"], "img/" . $namaGambar);
    if($namaGambar == null)
      $namaGambar = "default.png";
  }

  $cek_username = mysqli_num_rows((mysqli_query($con, "SELECT * FROM accounts WHERE username ='$username'")));

  if($cek_username > 0){
    $hasil = false;
  } else {
    $sql="INSERT INTO accounts (id, fname, username, email, password, bdate, gender, status, bio, gambar) VALUES ('' ,'$fname','$username','$email','$password', '$bdate', '$gender', '$status', '$bio', '$namaGambar')";
    $hasil=mysqli_query($con,$sql);
  }
  
  if ($hasil) { 

?>
  
  <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="styleRegist.css">
      <link href="https://fonts.googleapis.com/css2?family=Rampart+One&display=swap" rel="stylesheet">

      <title>Success</title>
    </head>
    <body>
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <h1>Welcome to Awesome!</h1> <br>
          <div class="p">
            <p>Awesome membantumu menjalin silaturahmi yang baik dengan orang-orang yang hadir dihidupmu</p>
          </div>
          <a href="index.php"><button class="btn" id="buttonLogin" value="login">Login</button></a>
        </div>
      </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
  </html>

<?php
	exit;
  }
else { ?>
  <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styleRegist.css">
    <link href="https://fonts.googleapis.com/css2?family=Rampart+One&display=swap" rel="stylesheet">
    <link href="styleAuthenticate.css" rel="stylesheet">
    <title>Success</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="p">
                    <p> 
                        WARNING !!!<br> Failed to create your account <br> Username is already use by another user
                    </p>
                </div>
                <a href="index.php"><button class="btn" id="buttonLogin" value="login">Try Again</button></a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>

  <?php
	exit;
}  

?>