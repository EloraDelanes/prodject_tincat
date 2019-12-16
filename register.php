
<?php require "head.php" ?>
<body>
    <div class="fond"></div>
    <div class="form-container">
    <a href="index.php"><h1>TINCAT</h1></a> 
    <form action="functions/setUser.php" method="post">
        <input type="text" placeholder="Pseudo" name="pseudo">
        <input type="email" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password">
        <input type="password" placeholder="Confirm Password" name="confirmp">
        <input type="submit" placeholder="Envoyer" value="Register">
    </form>
    <?php
        //echos erreurs succès
        if(isset($_GET["inputNone"])){
            echo "<div class=\"error\">";
            echo $_GET["inputNone"];
            echo "</div>";
        }
        else if(isset($_GET["errorPassword"])){
            echo "<div class=\"error\">";
            echo $_GET["errorPassword"];
            echo "</div>";
        }
        ?>

        <a href="login.php" class="link">Connexion</a>
    </div>
</body>
</html>