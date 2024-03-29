<?php
include "header.inc.php";

//accée à la banque de donnée
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e) // verification d'erreur
{
        die('Erreur : '.$e->getMessage());
}
?>

<form method="post" action="minichat_post.php">
    <p>
        <label for="login">Identifiant</label>
        <input type="text" name="login" id="login">
    </p>
    <p>
        <label for="message">Message</label>
        <input type="text" name="message" id="message">
    </p>
    <input type="submit">
</form>

<?php
$reponse = $bdd->query('SELECT login,message FROM utilisateur'); //recupere les information du serveur
while ($donnees = $reponse->fetch()) //selectione les information pas ligne (genre de for ... each)

/*
                    while ($donnees = $reponse->fetch())
Le fetch renvoie faux (false) dans $donnees lorsqu'il est arrivé à la fin des données, 
c'est-à-dire que toutes les entrées ont été passées en revue. 
Dans ce cas, la condition du while vaut faux et la boucle s'arrête.
*/
{
?>
    <strong class="login"><?php echo $donnees['login']; ?></strong><br />
    <p class="message"><?php echo $donnees['message']?></p>
<?php
}

$reponse->closeCursor(); // stop la requête
?>