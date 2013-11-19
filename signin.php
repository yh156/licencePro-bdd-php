<?php
    error_reporting(E_ALL);
    function loadClass($className){
	require $className . '.class.php';
    }
    spl_autoload_register('loadClass');
    session_start();
    //données du formulaire de connexion
    $password = htmlspecialchars($_POST['pwd']);
    $pseudo = htmlspecialchars($_POST['login']);
    
    //création de l'objet citoyen
    $citoyen = new Citoyen($pseudo,null,null,null,null,$password);
    
    //création de l'objet manager de citoyen (depot)'
    $cit_manager = new Citoyen_Manager($citoyen);
    
    //vérification du login/password
    $citoyen = $cit_manager->connect();
    if($citoyen != FALSE){
        $_SESSION['citoyen'] = $citoyen;
        $_SESSION['isLog'] = TRUE;
        header('Location: index.php');
    }
    else{
        echo 'Wrong login/password<br>';
        ?>
            <form action="signin.php" method="post">
                Login: <input type="text" name="login"><br>
                Password: <input type="password" name="pwd">
                <input type="submit" value="Sign In">
            </form>
            <a href="signup.php">sign up</a>
            <br>
            <br>
        <?php
    }
?>
