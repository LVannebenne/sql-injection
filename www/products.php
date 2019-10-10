<form action="index.php?p=products" method="POST">
    <label for="search">Rechercher un meuble</label>
    <input id="search" name="search" type="text">
    <input type="submit" value="Rechercher">
</form>

<?php

if (isset($_POST['search'])) { 
    echo "<div class='alert alert-primary'> Votre recherche : " . $_POST['search'] . "</div>";
    try {
        $req = $conn->query("SELECT * FROM products WHERE `name` LIKE '%" . $_POST['search'] . "%'");
        while ($row = $req->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            $data = "<div>".$row[0] . "</div><div>" . $row[1] . "</div><div>" . $row[2] . "</div>";
            print "<div class='flex-row'>";
            print $data;
            print "</div>";
          }
        /* if ($result = $req->fetch(PDO::FETCH_LAZY)) {
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