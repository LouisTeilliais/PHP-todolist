<?php require('db_connect.php'); ?>
<link rel="stylesheet" href="/css/index.css" type="text/css">
<?php

// $user_session = "123456789dzqgerdhgezs";

// setcookie(
//         'user_session',
//         $user_session,
//         [
//             'expires' => time() + 3600,
//             'path' => "/",
//         ]
//     );
// ?>

<?php $title = 'PHP TO DO LIST'; ?>  <!-- Debut du template -->

<?php ob_start();?>

<h1>Page Login</h1>
<body>

    <div id="login">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="pwd">
            <input type="submit" value="Sign in" name="submit">  
        </form>
    </div>
    <?php
    
    if(isset($_POST['submit'])){

        $user_email = $_POST['email'];
        $user_pwd = $_POST['pwd'];
        
        $bdd_verif = 'SELECT UserEmail, UserPassword FROM user';
        $sql = $conn->prepare($bdd_verif);
        $sql->execute([]);
        $arr = $sql->fetchAll();

        print_r($arr[0][0].'\n') ;
        print_r($arr[0][1]);
    }
    

    // if(isset($_COOKIE['user_session'])){
    //     echo 'Hello ' .$_COOKIE['user_session'];
    // }else{
    //         echo 'Please connect';
    //     }
    // ?>


</body>


<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php'); ?>