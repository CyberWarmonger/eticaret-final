<?php
session_start();
require "baglan.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

        $stmt = $db->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            if ($password === $row['password']) { // Check passwords directly
                $_SESSION['role'] = $row['role'];
                $_SESSION["login"] = true;
                $_SESSION["username"] = $username;
                $_SESSION['id'] = $row['id'];

                if ($row['role'] == '0') { // member
                    header('Location: index.php');
                    exit(0);
            } else {
                echo "Şifre Yanlış";
            }
        } else {
            echo "Kullanıcı bulunamadı";
        }
    

    $db = null;
}
}
?>


<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Giriş Yap</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body class="text-center">

    <form class="form-signin" method="post" action="">
        <h1 class="h3 mb-4 font-weight-normal">Giriş Yapınız.</h1>
        <input type="text" id="inputUsername" class="form-control mb-1" name="username" placeholder="Kullanıcı Adı">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Şifre">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me">
                Beni Hatırla
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Giriş Yap!</button>
    </form>

    <?php
    if (isset($_SESSION["login"])) {
        header("Location: index.php");
        exit(0);
    }
    ?>
</body>

</html>
