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
<li><a  href="patient.php">Patient</a></li>
<li><a href="#">Visite</a></li>
<li><a href="#">Département</a></li>
<li><a href="medecin.php">Medecin</a></li>
<li><a href="#">Lit</a></li>
<li><a href="#">Chambre</a></li>
</ul></nav></header>
<section>
     <div id="barre">search by name:<form action="request.php" target="affichage" method="get" id="myForm" ><input name="text" type="text"> 
           <input type="submit" value="search">
           sort by department : <input type=checkbox name="chek"  onClick="myFunction();"> 
           </form></div>

<iframe  src="request.php" name="affichage"> </iframe>';



// -------------------------------------formulaire-----------

$html.='<div id="formulaire"> 
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
<td> <input name="dn" type="date" id="dn" required></textarea></td>
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
</form></div>';
$html.='<br><center>
<button class="button button1" id="button1">afficher</button>
<button class="button button1" id="button2">ajouter</button></center>';

$html.='</section><script src="script.js"> </script></body></html>';
echo $html ;
?> 