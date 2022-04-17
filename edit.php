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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rampart+One&display=swap" rel="stylesheet">
    <link href="styleEdit.css" rel="stylesheet" />
    <title>Edit Page</title>
</head>

<body>
    <?php

    $id = $_SESSION['id'];
	$query = mysqli_query($con, "SELECT * FROM accounts WHERE id=$id");
	while($data = mysqli_fetch_array($query)){
    
    ?>
    <div class="container">
        <nav class="navbar navbar-light  fixed-top shadow-sm rounded ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Edit Profil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Edit Profil</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="edit.php">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $data['id'] ?>">
                <input type="text" name="fname" name="fname" class="form-control" value="<?php echo $data['fname'] ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                    value="<?php echo $data['username']?>">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                    value="<?php echo $data['email']?>">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Create New Password">
            </div>
            <div class="mb3">
                <input type="hidden" value="<?php echo $data['password']?>" name="password1">
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" id="bdate" name="bdate" placeholder="bdate"
                    value="<?php echo $data['bdate']?>">
            </div>
            <div class="mb-3">
                <div class="row m-auto">
                    <div class="col-md-4">
                        <input type="radio" id="gender" name="gender1" class="form-check-input" value="Male">
                        Male
                    </div>
                    <input type="hidden" value="<?php echo $data['gender'] ?>" name="gender">
                    <div class="col-md-4">
                        <input type="radio" id="gender" name="gender1" class="form-check-input" value="Female"> Female
                    </div>
                    <div class="col-md-4">
                        <select name="status" id="status" style="width: 100%;">
                            <option value="<?php echo $data['status'] ?>">Status</option>
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="bio" id="bio" placeholder="Bio"
                    value="<?php echo $data['bio']?>">
            </div>
            <div class="mb-3">
                <input type="file" name="gambar" id="gambar">
            </div>

            <button type="submit" class="btn" id="buttonCreate" name="send">Save</button>
        </form>

        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>