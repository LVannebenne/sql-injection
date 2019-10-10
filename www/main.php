<?php




if (isset($_POST["username"]) && isset($_POST["password"])) {
    try {
        $req = $conn->query("SELECT * FROM users WHERE `username` = '".$_POST["username"]."'  AND `password` = '".$_POST["password"]."'");
        if ($result = $req->fetch()) {?>
            <div class="alert alert-success">
                Connected as "<?= $result['username'] ?>"
            </div>
            <?php
        } else {?>
            <div class="alert alert-danger">
                Bad Login or Password !
            </div>
            <?php
        }
        echo "<h4>\$_POST <> Result DB </h4>";
        echo "<b>Username</b><br />".$_POST["username"]." <> ".$result["username"]."<br />";
        echo "<b>Password</b><br />".$_POST["password"]." <> ".$result["password"]."<br />";
    } catch (PDOException $e) {
        print "Erreur! : " . $e->getMessage() . "<br />";
        die();
    }
}


?>
<div class="form-login">
    <form action="#" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="submit" value="Envoyer">
        </div>
    </form>
</div>