<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
</head>
<body>
    <?php
        define('TITLE', 'Login');
        include '../partials/header.php';
        
        $loggedin = false;
        $error_message = false;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            if (!empty($_POST['tendangnhap']) && !empty($_POST['password'])) {
        
                if ((strtolower($_POST['tendangnhap']) == 'admin') && ($_POST['password'] == '123456')) {
                    $_SESSION['logged'] = 'logged';
                    $loggedin = true;
                } else {
                    $error_message = 'Tên đăng nhập và mật khẩu không khớp!';
                }
            } else {
                $error_message = 'Hãy đảm bảo rằng bạn cung cấp đúng tên đăng nhập và mật khẩu!';
            }
        }
        
        if ($error_message) {
            include '../partials/show_error.php';
        }
        
        if ($loggedin) {
            echo '<p>Bạn đã đăng nhập!</p>';
        } else {
            echo '
            <form name="frmdangnhap" id="frmdangnhap" method="post" action="#">
                <div class="container mt-4">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card-group">
                                <div class="card p-4">
                                    <div class="card-body">
                                        <h1>Biểu mẫu đăng nhập</h1>
                                        <p class="text-muted">Nhập thông tin Tài khoản</p>
                                        <h3>Tên đăng nhập:</h3>
                                        <div class="input-group mb-3">
                                            <input class="form-control" type="text" name="tendangnhap"
                                                placeholder="Nhập tên đăng nhập">
                                        </div>
                                        <h3>Mật khẩu: </h3>
                                        <div class="input-group mb-4">
                                            <input class="form-control" type="password" name="password" placeholder="Nhập vào mật khẩu">
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input">
                                            <label class="form-check-label">Ghi nhớ tôi</label> 
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <button class="btn btn-primary px-4" name="btnDangNhap">Đăng nhập</button>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button class="btn btn-link px-0" type="button">Quên mật khẩu?</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>';
        }
    ?>
</body>
</html>
<?php

