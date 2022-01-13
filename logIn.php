<link rel="stylesheet" href="/css/index.css" type="text/css">
<?php

$user_session = "123456789dzqgerdhgezs";

setcookie(
        'user_session',
        $user_session,
        [
            'expires' => time() + 3600,
            'path' => "/",
        ]
    );
?>

<?php $title = 'PHP TO DO LIST'; ?>  <!-- Debut du template -->

<?php ob_start();?>

<h1>Page Login</h1>

<body>

    <h1>TEST COOKIES</h1>
    <?php

    if(isset($_COOKIE['user_session'])){
        echo 'Hello ' .$_COOKIE['user_session'];
    }else{
            echo 'Please connect';
        }
    ?>
</body>


<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php'); ?>