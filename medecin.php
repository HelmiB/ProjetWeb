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
            <li><a href="medecin.php">Medecin</a></li>
            <li><a href="#">Lit</a></li>
            <li><a href="#">Chambre</a></li>
        </ul></nav></header>
<section><section>
        <div id="barre">search by name:<form action="request.php" target="affichage" method="get" id="myForm" ><input name="text" type="text">
                <input type="submit" value="search">
            </form></div>

        <iframe  src="request.php" name="affichage"> </iframe>';

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
    <center><button class="button button1" id="button1">afficher</button>
        <button class="button button1" id="button2">ajouter</button></center></section>
<script src="script.js"> </script>;
</body>
</html>