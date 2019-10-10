<h1>Comment prévenir les injections?</h1>

<div class="row">
    <div class="col-12">
        <p class="pl-4">En général: Manque de validation des données entrées par l'utilisateur !</p>
        <p><u><b>Solution?</b> Combiner plusieurs moyens de défense :</u></p>
    </div>
    <div class="col-12 accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingTwo">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h5 class="mb-0 ml-2">Requêtes préparées</h5>
                </button>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <p>Consiste a écrire les requêtes en avance avec des variables à la place des valeurs.</p>
                </div>
                <blockquote>
                    $stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
                    <br />$stmt->bindParam(':name', $name);
                    <br />$stmt->bindParam(':value', $value);

                    <br />// insertion d'une ligne
                    <br />$name = 'one';s
                    <br />$value = 1;
                    <br />$stmt->execute();
                </blockquote>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <h5 class="mb-0 ml-2">Procédures Stockées</h5>
                </button>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <p>Semblable au requêtes préparées, celles-ci sont stockées directement dans la base de données.</p>
                </div>
                <blockquote>
                    if (!$mysqli->query("DROP PROCEDURE IF EXISTS p") ||
                    <br />!$mysqli->query('CREATE PROCEDURE p() READS SQL DATA BEGIN SELECT id FROM test; SELECT id + 1 FROM test; END;')) {
                    <br />echo "Echec lors de la création de la procédure stockée : (" . $mysqli->errno . ") " . $mysqli->error;
                    <br />}

                    <br />if (!$mysqli->multi_query("CALL p()")) {
                    <br />echo "Echec lors de l'appel à CALL : (" . $mysqli->errno . ") " . $mysqli->error;
                    <br />}
                </blockquote>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFour">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <h5 class="mb-0 ml-2">"Manuellement"</h5>
                </button>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    <p>Valider les entrées utilisateurs, en autorisant certains caractères plutôt qu'en interdisant. Utilisation des expressions rationelles. </p>
                </div>
                <blockquote>
                    &lt;input type="email" name="email"&gt;
                    <br \>&lt;input type="text" name="product" pattern="^[a-zA-Z0-9]*$&gt;
                </blockquote>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFive">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    <h5 class="mb-0 ml-2">Fonction d'échappement des caractères spéciaux.</h5>
                </button>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    <p>A utiliser en dernier recours ou en combinaison avec d'autres méthodes, ces fonctions échappent certains caractère connus pour être problématiques dans une requête SQL </p>
                </div>
                <blockquote>
                    en PHP :
                    <br/>mysqli_real_escape_string($maVariable)
                    <br/>add_slashes($maVariable)
                </blockquote>
            </div>
        </div>
    </div>
</div>