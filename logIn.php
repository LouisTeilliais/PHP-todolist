<?php require('db_connect.php'); ?>
<link rel="stylesheet" href="/css/login.css" type="text/css">
<?php


?>

<?php $title = 'PHP TO DO LIST'; ?>  <!-- Debut du template -->

<?php ob_start();?>

<body>

    <div id="login">
        <h1>Login</h1>
        <form method="POST" action="login.php">
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="pwd">
            <input class="B_login" type="submit" value="Login" name="submit">  
        </form>
    </div>
    <?php
    
    if(isset($_POST['submit'])){

        $bdd_verif = 'SELECT UserEmail, UserPassword FROM user';
        $sql = $conn->prepare($bdd_verif);
        $sql->execute([]);
        $arr = $sql->fetchAll();
        $rand_token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($rand_token);

    
        $user_email = $_POST['email'];
        $user_pwd = $_POST['pwd'];
        $connected = false; 


        $bdd_token = 'SELECT UserToken FROM user WHERE UserEmail = ?';
        $sql = $conn->prepare($bdd_token);
        $sql->execute([$user_email]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        foreach($result as $tokenvalue){
            if($tokenvalue == null){
                $bdd_token = 'UPDATE user SET UserToken = ? WHERE UserEmail = ?';
                $sql = $conn->prepare($bdd_token);
                $sql->execute([$token, $user_email]);
            }
        }

        if (empty($user_email) || empty($user_pwd) ){
            $empty = "Please fill all the gaps";
            echo '<script type="text/javascript">window.alert("'.$empty.'");</script>';
        }else{

            $bdd_token = 'SELECT UserToken FROM user WHERE UserEmail = ?';
            $sql = $conn->prepare($bdd_token);
            $sql->execute([$user_email]);
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            foreach($result as $tokenvalue){
                for ( $i = 0; $i < count($arr); $i++){
                
                    if ($user_email == $arr[$i][0] && password_verify($user_pwd, $arr[$i][1])){
                        
                        // echo "Connected";
                        $connected = true;

                        setcookie(
                                'user_session',
                                "$tokenvalue",
                                [
                                    'expires' => time() + 3600,
                                    'path' => "/",
                                ]
                        );
                    }
                }
            }
            if ($connected == false)  {
                $error = "Wrong password or e-mail ! Please verify";
                echo '<script type="text/javascript">window.alert("'.$error.'");</script>';
            }else{
                header('Location:http://phptodolist/toDoList.php');
            }
                
        }
  
    
    }

?>


</body>

<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php'); ?>