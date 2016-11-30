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
    <h3>Chat Room</h3>
    <div id="users"></div>
    <div id="chat">

        <div id="msg_cont">
            <div id="messages">

            </div>
        </div>

        <div id="input_msg">
            <textarea id="msg" name="msg" autofocus="autofocus" placeholder="To add a new line press shift + enter."></textarea>
        </div>
    </div>

</section>


<?php include 'template/footer.php'; ?>
</body>
</html>