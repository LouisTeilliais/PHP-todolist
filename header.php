<link rel="stylesheet" href="/CSS/header.css" type="text/css">
<div class="navbar">
    
    <?php
    if (isset($_COOKIE['user_session']) == false){ ?>
    
    <a href="/" class="links"> Home </a>
    <a href="logIn.php" class="links">LogIn</a>
    <a href="signIn.php" class="links">SignIn</a>
    <?php }?>

    <?php
    if (isset($_COOKIE['user_session'])){  ?>
    <a href="toDoList.php" class="links">To do list</a>
        <form method="POST" action="login.php">
            <input type="submit" value="Disconnect" name="disconnect">
        </form>
    <?php }?>

    <?php
    if(isset($_POST['disconnect'])){
        setcookie('user_session',"", [
                'expires' => time() - 3600,
            ]
        );
    }
    ?>


</div>