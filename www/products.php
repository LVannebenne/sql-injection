<form action="index.php?p=products" method="POST">
    <label for="search">Rechercher un meuble</label>
    <input id="search" name="search" type="text">
    <input type="submit" value="Rechercher">
</form>

<?php
$mysqli = mysqli_connect("db", "user", "test", "myDb");

if (isset($_POST['search'])) { 
    echo "<div class='alert alert-primary'> Votre recherche : " . $_POST['search'] . "</div>";
    try {
        $sql = "SELECT `name`,`price`,`stock` FROM products WHERE `name` = '" . $_POST['search'] . "'";
        $result = mysqli_query($mysqli, $sql);
        while($data = mysqli_fetch_all($result)){
            var_dump($data);
        }
        
        //$req = $conn->query("SELECT `name`,`price`,`stock` FROM products WHERE `name` = '" . $_POST['search'] . "'");
        print "<div class='flex-row'>";
        print "<div class='head-cell'>Nom</div><div class='head-cell'>Prix (€)</div><div class='head-cell'>Stock</div>";
        print "</div>";
        /* while ($row = $req->fetch()) {
            $data = "<div>" . $row[1] . "</div><div>" . $row[2] . "</div>";
            
            print "<div class='flex-row'>";
            foreach ($row as $cell) {
                print "<div class='cell'>" . $cell . "</div>";
            };
            print "</div>";
          }
        if ($result = $req->fetch(PDO::FETCH_LAZY)) {
            while ($result) {
                echo "<div class='flex-column'>";
            foreach ($result as $row) {
                echo "<div class='flex-row'>";
                    echo $row;
                echo "</div>";
            }
            echo "</div>";
            }
        } else {
            echo "aucun résultat";
        } */
    } catch (PDOException $e) {
        print "Erreur! : " . $e->getMessage() . "<br />";
        die();
    }
   
}

?>