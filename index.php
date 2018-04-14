<?php
$html='
<!DOCTYPE HTML>
<html>
<head>
<title> Bienvenue </title>
<link rel="stylesheet" href="style.css" />
<link href="img/logo.png" rel="icon"/>
</head>
<body>
<header><nav>
<ul>
<li><a  href="#">Patient</a></li>
<li><a href="#">Visite</a></li>
<li><a href="#">Département</a></li>
<li><a href="doctor.php">Medecin</a></li>
<li><a href="#">Lit</a></li>
<li><a href="#">Chambre</a></li>
</ul></nav></header>
<section><div id="affichage">
        <table class="table table-bordered table-hover">
            <tr><td colspan="6">search by name:<form method="get"><input name="text" type="text"><input type="submit" value="search"></form></td></tr>
            <tr class="active">
                <td>Patient ID</td>
                <td>Patient Name</td>
                <td>Patient LastName</td>
                <td>Date de naissance</td>
                <td>Date d émission</td>
                <td>Date de sortie</td>
                <td>Chambre</td>
                <td>Lit</td>
                <td>Department</td>        
            </tr>';
try{
    $bdd2= new PDO('mysql:host=localhost;dbName=hopital', 'root', '');
}
catch (PDOException$e) { print"Erreur : " . $e->getMessage();die(); }
$bdd2->query("USE hopital");
if((isset($_GET["text"]))AND(!empty($_GET["text"]))){
    $reponse= $bdd2->query('select * from patient WHERE nom LIKE "'.$_GET["text"].'%" or nom LIKE "'.'% '.$_GET["text"].'%"');
}
else{
    $reponse= $bdd2->query('select * from patient ORDER by id ASC ');
}
if($reponse){
    $resultat = $reponse->fetchAll(PDO:: FETCH_OBJ );
    foreach($resultat as $res)
 $html.='<tr id="tab"><td>'.$res->id.'<td>'.$res->nom.'<td>'.$res->prenom.'<td>'.$res->date_naissance.'<td>'.$res->date_emission.'<td>'.$res->date_sortie.'<td>'.$res->chambre.'<td>'.$res->lit.'<td>'.$res->departement;
}

$html.='</table></div>';

// -------------------------------------formulaire-----------

$html.='<div id="formulaire"> <center>
<form method="post" action="insert.php" enctype="multipart/form-data">
<table width="200" align="center" >
<tr>
<td>Nom :</td>
<td> <input name="nom" type="text" id="nom" required /></td>
<tr>
<td>Age: </td>
<td> <input name="age" type="number" id="age" /></td>
</tr>
<td>
Email :
</td>
<td> <input name="mail" type="email" id="mail" required /></td>
</tr>
<tr>
<td>Date de naissance</td>
<td> <input name="dn" type="date"id="dn" required></textarea></td>
</tr>
<tr>
<td>Adresse</td>
<td> <textarea name="adr" id="adr"></textarea></td>
</tr>
<tr>
<td>Photo</td>
<td> <input name="fichier" type="file" id="fichier" /></td>
</tr>
<tr>
<td>Login: </td>
<td> <input name="login" type="text" id="login" /></td>
</tr>
<tr>
<td>Password: </td>
<td> <input name="pwd" type="password" id="pwd" /></td>
</tr>
<tr>
<td colspan="2" align="center"><input name="ok" type="submit" /> </td>
</tr>
</table>
</form></center></div>';
$html.='<br>
<center><button class="button button1" id="button1">afficher</button>
<button class="button button1" id="button2">ajouter</button></center>';

$html.='</section><script src="script.js"> </script></body></html>';
echo $html ;
?> 