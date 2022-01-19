<link rel="stylesheet" href="/CSS/index.css" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<?php $title = 'To Do List'; ?>

<?php ob_start(); ?> <!-- Debut du template -->
    <div id="menu">
        <div class="title">
            <h1>TO DO LIST PROJECT</h1>
        </div>
        <button onclick="window.location='login.php'" >Login</button>
        <button onclick="window.location='signin.php'" >Sign in</button>
    </div>
<?php $content = ob_get_clean(); ?> <!-- Fin du template -->
<?php require('template.php'); ?>