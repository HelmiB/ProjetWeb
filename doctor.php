<html>
<head>
    <link rel="stylesheet" href="style.css" />
    <link href="img/logo.png" rel="icon"/>
</head>
<body>
<header>
    <nav>
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
                <td>Doctor ID</td>
                <td>Doctor Name</td>
                <td>Doctor LastName</td>
                <td>Department</td>
                <td>Phone No.</td>
                <td>Options</td>
            </tr>
            <?php
            try{
                $bdd2= new PDO('mysql:host=localhost;dbName=bdd2', 'root', '');
            }
            catch (PDOException$e) { print"Erreur : " . $e->getMessage();die(); }
            $bdd2->query("USE bdd2");
            if((isset($_GET["text"]))AND(!empty($_GET["text"]))){
                $reponse= $bdd2->query('select * from medecin WHERE nom LIKE "'.$_GET["text"].'%"');
            }
            else{
                $reponse= $bdd2->query('select * from medecin ORDER by id ASC ');
            }
            if($reponse){
                $resultat = $reponse->fetchAll(PDO:: FETCH_OBJ );
                foreach($resultat as $res) :
                    echo '<tr id="tab"><td>';
                    echo $res->id;
                    echo '<td>';
                    echo $res->nom;
                    echo '<td>';
                    echo $res->prenom;
                    echo '<td>';
                    echo $res->departement;
                    echo '<td>';
                    echo $res->telephone;
                    echo '<td>';
                    echo '<a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button></a>
                            <a  href="#" class="btn btn-danger" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
                endforeach;
                $reponse->closeCursor();
            }
            ?>
        </table>
    </div>
    <div id="formulaire"> <center>
            <form method="post" action="add.php" enctype="multipart/form-data">
                <table width="200" align="center" >
                    <tr>
                        <td>Id :</td>
                        <td> <input name="doctid" type="number" required/></td></tr>
                    <tr>
                        <td>Nom :</td>
                        <td> <input name="doctname" type="text" required/></td></tr>
                    <tr>
                        <td>Prenom: </td>
                        <td> <input name="doctlastname"  type="text"/></td>
                    </tr>
                    <td>
                       Telephone :
                    </td>
                    <td> <input name="phon" type="number"/></td>
                    </tr>
                    <tr>
                        <td>Departement</td>
                        <td> <input name="dept" type="text" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input name="ok" type="submit" /> </td>
                    </tr>
                </table>
            </form></center></div>
    <center><input id="button1" type="button" value="afficher">
        <input id="button2" type="button" value="ajouter"></center></section>
<script src="script.js"> </script>;
</body>
</html>