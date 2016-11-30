<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CHAT MVC</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
</head>
<body>

<?php include 'template/header.php'; ?>

<section id="app">
    <h3>Register form</h3>
    <?php if(isset($_GET['error'])){ ?><div class="danger">Failed</div><?php } ?>
    <form action="<?php echo URL ?>user/register" method="POST">
        <input type="text" name="username" id="username" placeholder="Username">
        <input type="password" name="password" id="password" placeholder="Password">
        <input type="submit" name="submit" id="submit_login" value="Register">
        <div>
            <p> connect ?
                <a href="<?php echo URL ?>user/login" title="Login">Login !</a>
            </p>
        </div>
    </form>
</section>

<?php include 'template/footer.php'; ?>
</body>
</html>