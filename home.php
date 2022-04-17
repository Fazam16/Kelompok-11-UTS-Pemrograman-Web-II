<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}

$host="localhost";
$user="root";
$password="";
$db="phplogin";

$con = mysqli_connect($host,$user,$password,$db);
if (!$con){
	  die("Koneksi gagal:".mysqli_connect_error());
}

$stmt = $con->prepare('SELECT fname, username, email, password, bdate, gender, status, bio, gambar FROM accounts WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($namaLengkap, $username, $email, $password, $bdate, $gender, $status, $bio, $namaGambar);
$stmt->fetch();
$stmt->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rampart+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/all.min.css">
    <link href="styleHome.css" rel="stylesheet">
    <title>Home Page</title>
</head>

<body>
    <div class="wrap">
        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <nav class="navbar navbar-inverse navbar-light">
                    <div class="container">
                        <i></i>
                        <a class="navbar-brand" href="#">
                            <h1>Awesome</h1>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li>
                                    <form class="d-flex">
                                        <input class="form-control me-2" type="search" placeholder="Search"
                                            aria-label="Search">
                                        <button class="btn btn-outline-primary" type="submit">Search</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="row m-auto">
                    <div class="col-md-12 mt-2" id="about">
                        <h2 id="username">
                            <?php echo $username; ?>
                        </h2>

                        <img src="img/<?php echo $namaGambar?>" alt="" style="width: 150px;"
                            class="rounded-circle img-thumbnail">

                        <div>
                            <h3>
                                <?php echo $namaLengkap; ?>
                            </h3>
                            <p class="detailProfile">
                                <i class="far fa-envelope"></i> : <?php echo $email; ?>
                            </p>
                            <p class="detailProfile">
                                <?php 
                                $gender;
                                if($gender == 'Male')
                                    echo "<i class=\"fas fa-male\"></i>";
                                else 
                                    echo "<i class=\"fas fa-female\"></i>";      
                                echo "  : " . $gender;
                            ?>
                            </p>
                            <p class="detailProfile">
                                <i class="fas fa-question"></i> : <?php echo $status; ?>
                            </p>
                            <p class="detailProfile">
                                <i class="fas fa-key"></i> : <?php echo $password; ?>
                            </p>

                            <p class="detailProfile">
                                <i class="fas fa-birthday-cake"></i> :
                                <?php
                                   function bulan_indo($bulan_angka) {
                                     $bulan = array(1=>'January', 
                                     'February', 
                                     'March', 
                                     'April', 
                                     'May', 
                                     'June', 
                                     'July', 
                                     'August', 
                                     'September', 
                                     'October', 
                                     'November', 
                                     'December'
                                     );
                                                                     
                                     return $bulan[$bulan_angka];
                                   }    
                                                                     
                                   $tampH="" ;
                                   $tampB=0;
                                   $tampT=0;
                                 
                                   $format_indo = date('d-m-Y', strtotime($bdate));
                                                                       
                                   $pecah = explode('-', $format_indo);
                                                                     
                                   $hari = date('D', strtotime($format_indo));
                                   $tgl = $pecah[0];
                                   $bulan = $pecah[1];
                                   $tahun = $pecah[2];
                                                                     
                                   $tampH=$tgl;
                                   $tampB=bulan_indo((int)$bulan);
                                   $tampT=$tahun;
                                   
                                   echo $tampH . " " . $tampB . " " . $tampT;
                                 ?>
                            </p>
                        </div>
                    </div>
                </div>

                <br>
                <hr>

                <div class="row m-auto mt-4">
                    <div class="col-md-12">
                        <h4 class="judul">About Me</h4>
                        <p class="aboutme">
                            <?php  echo $bio;?>
                        </p>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                    crossorigin="anonymous"></script>
</body>

</html>


<a href="edit.php"><button class="btn">Edit</button></a>
<a href="logout.php"><button class="btn">Logout</button></a>