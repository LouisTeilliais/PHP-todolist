<?php require('db_connect.php'); ?>
<link rel="stylesheet" href="/css/index.css" type="text/css">
<?php

// setcookie(
//         'user_session',
//         "user_session",
//         [
//             'expires' => time() + 3600,
//             'path' => "/",
//         ]
//     );
?>

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

        $bdd_verif = 'SELECT UserEmail, UserPassword FROM user';
        $sql = $conn->prepare($bdd_verif);
        $sql->execute([]);
        $arr = $sql->fetchAll();
        
    
        $user_email = $_POST['email'];
        $user_pwd = password_verify($_POST['pwd'],$arr[0][1]);
        
        print_r($arr);
        // print_r($arr[0][0]);
        // echo "<br>";
        // print_r($arr[0][1]);

        if ($user_email == $arr[0][0] && $user_pwd == $arr[0][1]){
            echo "Connected";
            // setcookie("user_session", );
        }else {
            echo "Wrong password or e-mail ! Please verify";
        }
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