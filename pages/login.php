<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - SbobinaX</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css?h=97380e22c8933e9aa79cbc2390b9f15a">
    <link rel="manifest" href="/manifest.json?h=af088d50ef94b82f510c17b292dfdc04" crossorigin="use-credentials">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
</head>

<body class="bg-gradient-primary" style="background: rgb(10,43,62);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background: url(&quot;/assets/dist/img/scimmia.jpeg?h=0fdb69f99cb40919098362d9e9a71e32&quot;) center / cover no-repeat;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h3 class="text-dark mb-4" style="font-weight: bold;"><img src="../assets/img/logo.png?h=028d08c66a107ea073d43d9a787966a7" style="width: 125PX;height: 125PX;">Welcome Back!</h3>
                                    </div>
                                    <form class="login"
                                          method="post"
                                          action="../req/login_fx/login.php">
                                        <?php if (isset($_GET['error'])) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo $_GET['error']; ?>
                                            </div>
                                        <?php } ?>
                                        <div class="mb-3"><input class="form-control" name="uname" placeholder="Inserisci il nome utente" style="height: 53.1875px;padding: 16px;border-radius: 160px;"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small"></div>
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.php">Forgot Password?</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.min.js?h=bdf36300aae20ed8ebca7e88738d5267"></script>
</body>

</html>