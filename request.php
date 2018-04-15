<?php
// afin de recuperer le nom du table :D
$s=$_SERVER['HTTP_REFERER'];
$a= strrpos($s,"/");
$b= strrpos($s,".php");
$table = substr($s,$a+1,$b-$a-1);

// verifier si le choix de trie est fait ou non ;)
if(!isset($_GET['chek']))  $sort=" ";
else $sort="ORDER BY departement ASC";

echo "<link rel=\"stylesheet\" href=\"style1.css\" />" ;

try{
    $bdd2= new PDO('mysql:host=localhost;dbName=hopital', 'root', '');
}
catch (PDOException$e) { print"Erreur : " . $e->getMessage();die(); }
$bdd2->query("USE hopital");
if((isset($_GET["text"]))AND(!empty($_GET["text"]))){
    $reponse= $bdd2->query('select * from '.$table.' WHERE nom LIKE "'.$_GET["text"].'%" or nom LIKE "'.'% '.$_GET["text"].'%"'.$sort);
}
else{
    $reponse= $bdd2->query('select * from '.$table.' '.$sort);
}
$n=$reponse->columnCount();
echo "<table> <tr>";
for ($i=0;$i<$n;$i++){
    $meta = $reponse->getColumnMeta($i);
    echo "<td>".$meta['name'];
}

foreach($reponse as $res)
{
    echo "<tr>";
    for ($i=0;$i<$n;$i++){
        echo "<td>".$res[$i];

    }
}
echo "</table>";

?>