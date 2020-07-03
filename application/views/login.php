<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>absensi</title>
    <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" id="bootstrap-css">
    <link href="<?= base_url('assets/css/login.css')?>" rel="stylesheet" >
</head>
<body>
<div id="login">
        <h3 class="text-center text-white pt-5">Login Form</h3>
        <div class="container">
            <div id="alert"><?= $this->session->flashdata('message');?></div>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?= base_url('auth/aksi_login') ?>" method="post">
                            <h3 class="text-center text-info">Login</h3>    
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/core/bootstrap.min.js')?>"></script>
<script src="<?= base_url('assets/js/core/jquery.3.2.1.min.js')?>"></script>
</body>
</html>