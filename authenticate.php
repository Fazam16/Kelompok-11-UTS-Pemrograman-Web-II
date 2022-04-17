<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['password'])) {

    exit('Please fill both the username and password fields!');
}?>

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
    <title>Process</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="p">
                    <p>
                        <?php if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {

                        $stmt->bind_param('s', $_POST['username']);
                        $stmt->execute();
                    
                        $stmt->store_result();
                    
                        if ($stmt->num_rows > 0) {
                            $stmt->bind_result($id, $password);
                            $stmt->fetch();
                    
                            if (password_verify($_POST['password'], $password)) {
                    
                                session_regenerate_id();
                                $_SESSION['loggedin'] = TRUE;
                                $_SESSION['name'] = $_POST['username'];
                                $_SESSION['email'] = $_POST['email'];
                                $_SESSION['id'] = $id;
                    
                                header('Location: home.php');
                            } else {
                    
                                echo 'Incorrect username and/or password!';
                            }
                        } else {
                    
                            echo 'Incorrect username and/or password!';
                        }
                    
                        $stmt->close();
                    }?>
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