<?php

$base='geekzone';
$hote='localhost';
$utilisateur='root';
$mdp='';

echo '
<link rel="stylesheet" type="text/css" media="screen" href="css/GeekZone.css"/>
	';
	
$page = "Acceuil";
include 'inc/titre.php';
include 'inc/fonction2.php';
	
echo '
	<body>
	';
include 'inc/border.php';

/*if(!isset($_SESSION['login'])){

if(isset($_POST['identifiant']) && !empty($_POST['identifiant']) && isset($_POST['mdp']) && !empty($_POST['mdp'])){
	if(verifLogin($_POST['identifiant'], $_POST['mdp'], $base, $hote, $utilisateur, $mdp)){
		echo'<meta http-equiv="refresh" content="0; URL=gestionUtilisateur.php">';
		exit;
	}
}*/
 
echo '
	<div class = "content">
	<form class="produitFT"; action="gestionUtilisateur.php" method="get">
	
		<div class="produitTri">
			Trier les utilisateurs : <SELECT class="produitFilter" name="tri" size="">
				<OPTION ';if(isset($_GET['tri']) && $_GET['tri'] == "numero"){echo("selected");}echo'>numero
				<OPTION ';if(isset($_GET['tri']) && $_GET['tri'] == "nom"){echo("selected");}echo'>nom
				<OPTION ';if(isset($_GET['tri']) && $_GET['tri'] == "prenom"){echo("selected");}echo'>prenom
				<OPTION ';if(isset($_GET['tri']) && $_GET['tri'] == "mail"){echo("selected");}echo'>mail
				<OPTION ';if(isset($_GET['tri']) && $_GET['tri'] == "telephone"){echo("selected");}echo'>telephone
				<OPTION ';if(isset($_GET['tri']) && $_GET['tri'] == "code postal"){echo("selected");}echo'>code postal
				<OPTION ';if(isset($_GET['tri']) && $_GET['tri'] == "ville"){echo("selected");}echo'>ville
				<OPTION ';if(isset($_GET['tri']) && $_GET['tri'] == "boutique geree"){echo("selected");}echo'>boutique geree
				<OPTION ';if(isset($_GET['tri']) && $_GET['tri'] == "statut"){echo("selected");}echo'>statut
				<OPTION ';if(isset($_GET['tri']) && $_GET['tri'] == "login"){echo("selected");}echo'>login
				<OPTION ';if(isset($_GET['tri']) && $_GET['tri'] == "mdp"){echo("selected");}echo'>mdp
			</SELECT>
		</div>
		<br>
		<div class="produitTri">
			Ordre de tri : <SELECT class="produitFilter" name="ordre" size="">
				<OPTION ';if(isset($_GET['ordre']) && $_GET['ordre'] == "croissant"){echo("selected");}echo'>croissant
				<OPTION ';if(isset($_GET['ordre']) && $_GET['ordre'] == "decroissant"){echo("selected");}echo'>decroissant
			</SELECT>
		</div>		
				
		<input class="produitFilter form" type="submit" name="send"></input>
		
	</form>	
';

echo'
	<div class="strip">
	</div>
	<br>
	<div class="produitList">
';

//if (!isset($_SESSION['logCompte']) || $_SESSION['statCompte'] != "G") {  // V�rification des droits pour g�rer les utilisateurs
	//echo'<p class="blocAcces">Vous ne poss�dez pas les autorisations n�cessaires pour visionner le contenu de cette page!</p>';
//} else {

	if(isset($_POST['envoyerAjout']) && !empty($_POST['envoyerAjout']) && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) &&isset($_POST['mail']) && !empty($_POST['mail']) &&isset($_POST['telephone']) && !empty($_POST['telephone']) && isset($_POST['adresse']) && !empty($_POST['adresse']) &&isset($_POST['cp']) && !empty($_POST['cp']) &&isset($_POST['ville']) && !empty($_POST['ville']) && isset($_POST['boutiqueGeree']) && !empty($_POST['boutiqueGeree']) && isset($_POST['login']) && !empty($_POST['login']) &&isset($_POST['mdp']) && !empty($_POST['mdp'])){
		insertTableauUser($base, $hote, $utilisateur, $mdp, $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['telephone'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['boutiqueGeree'], $_POST['statut'], $_POST['login'], $_POST['mdp']);
	}
	
	if(isset($_POST['envoyerModif']) && !empty($_POST['envoyerModif']) && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']) &&isset($_POST['mail']) && !empty($_POST['mail']) &&isset($_POST['telephone']) && !empty($_POST['telephone']) && isset($_POST['adresse']) && !empty($_POST['adresse']) &&isset($_POST['cp']) && !empty($_POST['cp']) &&isset($_POST['ville']) && !empty($_POST['ville']) && isset($_POST['boutiqueGeree']) && !empty($_POST['boutiqueGeree']) && isset($_POST['statut']) && !empty($_POST['statut']) && isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['mdp']) && !empty($_POST['mdp']) && isset($_POST['hdIdCompte']) && !empty($_POST['hdIdCompte'])){
		updateTableauUser($base, $hote, $utilisateur, $mdp, $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['telephone'], $_POST['adresse'], $_POST['cp'], $_POST['ville'], $_POST['boutiqueGeree'], $_POST['statut'], $_POST['login'], $_POST['mdp'], $_POST['hdIdCompte']);
	}
	
	if(isset($_GET['suppCompte']) && !empty($_GET['suppCompte'])){
		suppTableauUser($_GET['suppCompte'], $base, $hote, $utilisateur, $mdp);
	}
	
	if (isset($_GET['tri'])) $tri = $_GET['tri'];
	if (isset($_GET['ordre'])) $ordre = $_GET['ordre'];
	if (!isset($_GET['tri'])) $tri = "id";
	if (!isset($_GET['ordre'])) $ordre = "asc";
	
	creaTableauUser($tri, $ordre, $base, $hote, $utilisateur, $mdp);
	
	if ( isset($_GET['editCompte']) && !empty($_GET['editCompte']) ) {
		editTableauUser($_GET['editCompte'], $base, $hote, $utilisateur, $mdp); //Affiche le formulaire d'�dition d'une personne
	}else{
	
	//Affiche le formulaire d'ajout de people
	echo '<h2>Ajouter un compte</h2>';
	echo '
		<form class="gestion" method="post" action="gestionUtilisateur.php">
			<fieldset>
				<label>Nom :</label><input class="formGestion" type="text" id="nom" name = "nom" /><br/><br/>
				<label>Pr�nom :</label><input class="formGestion" type="text" id="prenom" name = "prenom" /><br/><br/>
				<label>Mail :</label><input class="formGestion" type="text" id="mail" name = "mail" /><br/><br/>
				<label>T�l�phone :</label><input class="formGestion" type="text" id="telephone" name = "telephone" /><br/><br/>
				<label>Adresse :</label><input class="formGestion" type="text" id="adresse" name = "adresse" /><br/><br/>
				<label>CP :</label><input class="formGestion" type="text" id="cp" name = "cp" /><br/><br/>
				<label>Ville :</label><input class="formGestion" type="text" id="ville" name = "ville" /><br/><br/>
				';
				listBoutique($base, $hote, $utilisateur, $mdp, null);
				echo'
				<label>Statut :</label>
					<input type="radio" id="statut" name="statut" value="B" checked="checked"/>Administrateur de boutique
					<label></p></label><input type="radio" id="statut" name="statut" value="G"/>Administrateur g�n�ral
				<br>
				<br>
				<label>Identifiant :</label><input class="formGestion" type="text" id="login" name = "login" /><br/><br/>
				<label>Mot de passe :</label><input class="formGestion" type="text" id="mdp" name = "mdp" /><br/><br/>
				<input name="effacerAjout" type="reset" value="Effacer" />
				<input name="envoyerAjout" type="submit" value="Envoyer" />
			</fieldset>
		</form>
	';
	
	}
	//}
//}
echo'
	</div>
';
echo'</body>';

include 'inc/basPage.php';