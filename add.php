
<?php
try{
    $bdd2= new PDO('mysql:host=localhost;dbName=bdd2', 'root', '');
}
catch (PDOException$e) { print"Erreur : " . $e->getMessage(); die(); }
$bdd2->query("USE bdd2");
$req= $bdd2->prepare('insert into medecin(`id`,`nom` , `prenom`, `telephone`,`departement`) values (:val1,:val2,:val3,:val4,:val5)');
$req->execute(array('val1'=>$_POST["doctid"],'val2'=>$_POST["doctname"],'val3'=>$_POST["doctlastname"], 'val4'=>$_POST["phon"],'val5'=>$_POST["dept"]));
header('Location: doctor.php');
?>