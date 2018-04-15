<?php

if(!isset($_GET['chek']))  $sort=" ";
else $sort="ORDER BY departement ASC";

$html='
<table class="table table-bordered table-hover">
      
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
    $reponse= $bdd2->query('select * from patient WHERE nom LIKE "'.$_GET["text"].'%" or nom LIKE "'.'% '.$_GET["text"].'%"'.$sort);
}
else{
    $reponse= $bdd2->query('select * from patient '.$sort);
}
if($reponse){
    $resultat = $reponse->fetchAll(PDO:: FETCH_OBJ );
    foreach($resultat as $res)
 $html.='<tr id="tab"><td>'.$res->id.'<td>'.$res->nom.'<td>'.$res->prenom.'<td>'.$res->date_naissance.'<td>'.$res->date_emission.'<td>'.$res->date_sortie.'<td>'.$res->chambre.'<td>'.$res->lit.'<td>'.$res->departement;
};
echo  $html ;
?>