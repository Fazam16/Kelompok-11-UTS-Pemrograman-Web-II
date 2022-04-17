<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rampart+One&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <title>Login</title>
    </head>
    <body>

        <div class="container">
            <section>
                <div class="row m-auto">
                    <div class="col-md-6">
                        <h1>Awesome</h1>
                        <p class="keterangan">Awesome membantumu menjalin silaturahmi yang baik dengan orang-orang yang hadir dihidupmu</p>
                    </div>
                    <div class="col-md-6">
                        <div class="wrap">
                            <form action="authenticate.php" method="post">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                        
                                <button type="submit" class="btn" id="buttonLogin" value="login">Login</button> <br> 
                                <hr>

                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <a href="#" class="akunBaru">Create New Account</a>
                                </button>
                            </form>
                    
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header modal-dialog-scrollable">
                                                <h2 class="modal-title" id="exampleModalLabel">Daftar</h2> 
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="register.php" method="POST" enctype="multipart/form-data">
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Fullname" required>
                                                            </div>    
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="password" class="form-control" id="password" name="password" placeholder="Create Password" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="date" class="form-control" id="bdate" name="bdate" placeholder="bdate" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="row m-auto">
                                                                    <div class="col-md-4">
                                                                        <input type="radio" id="gender" name="gender" class="form-check-input" value="Male" required> Male
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="radio" id="gender" name="gender" class="form-check-input" value="Female" required> Female
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <select name="status" id="status" style="width: 100%;" required>
                                                                            <option value="">Status</option>
                                                                            <option value="Married">Married</option>
                                                                            <option value="Single">Single</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" name="bio" id="bio" placeholder="Bio">
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="file" name="gambar" id="gambar" accept="image/*">
                                                            </div>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> <br>
                                                            <button type="submit" class="btn" id="buttonCreate" style="margin-top: 5px;" name="kirim">Create New Account</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>