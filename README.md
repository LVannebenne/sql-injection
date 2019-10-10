# Injection SQL

Groupe de méthodes visant à exploiter les failles de sécurité de sites web interagissant avec des bases de données.

Le point d'entrée peut être n'importe quelle entrée de données coté client qui interroge la base de données.

## Analyse de risques

Une injection SQL réussie peut permettre : 
- Usurpation d'identité
- Altérer les données existantes
- Causer l'annulation des transactions ou la modifications des soldes
- Réveler les données
- Détruire les données ou les rendre indisponible
- Spolier l'identité de l'administateur BDD

Les injections SQL sont fréquentes avec PHP et ASP, parce qu'il existe plus de sites avec des vieilles interfaces fonctionnelles permettant ces injections.

La gravité de la menace est limitée aux compétences et à l'imagination de l'attaquant, et est mitigée par des contre-mesures telles qu'une bonne gestion des privilèges. 

Une injection SQL est considérée comme une menace de niveau élevé.

## Types d'injection (méthodes)

#### Blind based et time based

Consiste à effectuer une série de tests "a l'aveugle" afin de déterminer des informations clés sur le serveur avec des requêtes retournant vrai ou faux. 

Pour la version "Time", lorsqu'un requête est exécutée avec succès, elle est renvoyée après un certain délai. L'attaquant fera donc volontairement "trainer" l'opération afin de savoir si elle à été exécutée ou non (donc basée sur le temps de réponse du serveur).

#### Error based
L'attaquant se base sur les messages d'erreurs du serveur pour soutirer des informations sur les données, les colonnes, les contraintes...

#### Union based
Permet de concaténer une requête à la suite d'une autre avec le mot clé UNION.

#### Stacked queries
Permet de concaténer des requêtes avec un point-virgule.

## Comment prévenir les injections ?

L'approche traditionelle est de considérer le problème comme un manque de vérification et de validation des points d'entrées du coté client (formulaires).

La protection via certaines méthodes n'est pas garantie à 100%, une combinaison de moyens de défense étant la plus indiquée. 

#### Requêtes préparées
Consiste a écrire les requêtes en avance avec des variables à la place des valeurs. La base de données connait donc la "forme" de la requête et peut être moins facilement trompée. 

#### Procédures Stockées 

Semblable au requêtes préparées, celles-ci sont stockées directement dans la base de données. Elles ne sont pas initialement prévues pour comporter des paramètres dynamiques, mais le peuvent, à condition que ces paramètres soient correctement validés et échappés au préalable.

#### Manuellement

Valider les entrées utilisateurs, en autorisant certains caractères plutôt qu'en interdisant. Utilisation des expressions rationelles. 

#### Fonctions d'échappement des caractères spéciaux / SQL
A utiliser en dernier recours ou en combinaison avec d'autres méthodes, ces fonctions échappent certains caractère connus pour être problématiques dans une requête SQL 

en PHP : 

```
mysqli_real_escape_string($maVariable)
```
```
add_slashes($maVariable)
```

## Sources

* https://www.owasp.org/index.php/SQL_Injection
* https://www.owasp.org/index.php/Blind_SQL_Injection
* https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html
* https://medium.com/howtosecurity/what-is-sql-injection-9872503f3c2d
* https://hydrasky.com/network-security/error-based-sql-injection-attack/
* https://openclassrooms.com/fr/courses/1959476-administrez-vos-bases-de-donnees-avec-mysql/1971264-requetes-preparees
* https://www.php.net/manual/fr/pdo.prepared-statements.php
* https://www.hacksplaining.com/prevention/sql-injection