<header>
    <h1>Bienvenu  <?php if(isset($_SESSION['uid'])) echo $_SESSION['current_user']['username'] ?></h1>

    <?php if(isset($_SESSION['uid'])){ ?>
    <nav>
        <ul>
            <li><a href="<?php echo URL ?>user/logout">logout</a></li>
        </ul>
    </nav>
    <?php }?>
</header>