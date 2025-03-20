<?php
    session_start();
    if(!isset ($_SESSION["login"]) && !isset($_SESSION["role"])){
        header("Location:session.php");
    }
?>
<html>
    <head>
        <script src="../script/script.js"></script>
        <title>Padlet- Admin accueil</title>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="icon" href="../media/logo.png" type="image/gif">
    <style>
        @keyframes headerappearence {
        0%{
            background-image:"../media/A_black_image.jpg";
        }
        100%{
            background-image: url("../media/tof.jpg");
        }
        }
            .header{
                background-image: url("../media/tof.jpg");
            }
            .navbar li:hover {
            background-color: grey;
            }
            #navmenu{
                background-color: #1a1a1a;
                color:white;
            }
            #navmenu li a{
                padding:10px;
                border-radius:10px;
                color:white;
            }
            #navmenu li a:hover{
                background-color: #3b3b3b ;
            }

            #navmenu{
                background-color: #1a1a1a;
            }
            #contenu{
                height:3000px;
            }
            #contenu a{
                color:#23e7e7;
            }
            c
            .pied{
                background-color: #23e7e7;
            }
            table{
                border-radius:10px;
            }
            table, th, td {
                border-top:1px solid white;
                border-right:none;
                border-left:none;
                border-bottom:1px solid white;
                border-collapse:collapse;
                margin:50px;
            }
            td{
                justify-content: center;
                text-align: center;
                height:50px;
                width:450px;
            }
            th{
                align-content: center;
                height: 40px;
                color:black;
                background-color: #23e7e7;
            }
            #submit{
                border:none;
                margin-top:10px;
                height:40px;
                border-radius:10px;
                background-color: #23e7e7;
            }
    </style>
        
    </head>
    <body>
            <div class="header">
                <div style="display:flex ;align-items:flex-end; background: linear-gradient(90deg, rgba(0,0,0,0.7) 0%, rgba(255,255,255,0) 100%);">
                    <img id="logo" src="../media/logo.png" height="100px">
                    <h1 style="animation: 2s ease-out 0s 1 slideInLeft;">The First Fleet - Padlet - Admin accueil </h1>
                </div>
            </div>

            <div class="navbar">
                <input type=image src="../media/Hamburger_icon_white.png" id="Hamburger Icon" height="50px" onclick="showmenu()">
                <ul>
                    <li><a href="./admin_accueil.php" class="boutton"> Accueil & Profil(s) </a></li>
                    <li><a href="./admin_ateliers.php" class="boutton"> Gestion des Ateliers</a></li>
                    <li><a href="./deconnexion.php">Déconnexion</a></li>
                </ul>
                <input type=image  height="50px" id="moon" onclick="pageslightmode()" src="../media/sun_icon.png" style="right:100px;">
            </div>
            
            <div class="mid">
                <div id="navmenu">
                <h2>· Menu ·</h2>
                    <div class="barre" style="height:1px; width:90%; background-color:#3b3b3b;"></div>
                    <ul><h3>
                        <li><a href="../index.html"> Accueil </a></li>
                        <br>
                        <li><a href="./quisommesnous.html"> Qui-Sommes-nous?</a></li>
                        <br>
                        <li><a href="./diaporama.html">Diaporama</a></li>
                        <br>
                        <li><a href="./zinogre.html">Le Zinogre</a></li>
                        <br>
                        <li><a href="./safijiiva.html">Le Safi'Jiiva</a></li>
                        <br>
                        <li><a href="./fatalis.html">Le Fatalis</a></li>
                        <br>
                        <li><a href="../page/base.html">Base de monstres</a></li>
                        <br>
                        <div class="barre" style="height:1px; width:90%; background-color:#3b3b3b;"></div>
                        <br>
                        <li><a href="../page/padlet.php">Padlet - Accueil</a></li> 
                        <br>
                        <li><a href="../page/animation.php">Animation</a></li>
                        <br>
                        <li><a href="../page/session.php">Se Connecter</a></li>
                        <br>
                        <li><a href="../page/join.php">Nous Rejoindre</a></li>

                    </h3></ul>
                    <div class="barre" style="height:1px; width:90%; background-color:#3b3b3b;"></div>
                </div>
                <div id="contenu">
                <img id="logo" src="../media/logo.png" height="100px">
                <h2>Profil:</h2>
                <?php
                    $mysqli = new mysqli('localhost','zle_meuam','maaxynd4','zfl2-zle_meuam_1');
                    $requete_compte="SELECT * FROM t_compte_cpt JOIN t_profil_pfl USING(cpt_pseudo) WHERE cpt_pseudo='".$_SESSION['login']."';";
                    $result_compte= $mysqli ->query($requete_compte);
                    $compte=$result_compte->fetch_assoc();
                    echo "<div id='profil'>";
                    echo "<img src='../media/blank-profile-picture-973460_960_720.webp' style='border-radius:50%; height:90%'>";
                    echo "<div class='barre' style='height:90%; width:3px;px; background-color:#3b3b3b; margin:20px;'></div>";
                    echo "<div id='infosprofil'> <h2>".$compte['cpt_pseudo']."</h2>";
                    echo"<div class='barre' style='height:1px; width:90%; background-color:#3b3b3b;'></div>";
                    echo "<h3>Nom: <color-title>".$compte['pfl_nom']."</color-title></h3><h3>Prénom: <color-title>".$compte['pfl_prenom']."</color-title></h3><h3>Role: ".$compte['pfl_role']."</div>";
                    echo "</div>";
                    if ($compte['pfl_role']=='R'){
                    echo "<br><h2>Listes des profils de l'application:</h2><br>";
                        $requete_profils="SELECT * FROM t_compte_cpt JOIN t_profil_pfl USING(cpt_pseudo)";
                        $result_profils= $mysqli ->query($requete_profils);
                        echo "<p> Nombre de comptes: </p>".$result_profils->num_rows;
                        echo "<table><tr><th>Peusdos/Mails</th><th>Prénom</th><th>Nom</th><th>Role</th><th>Statut du compte</th><th>Action</th></tr>";
                        while ($profils=$result_profils->fetch_assoc()){
                            echo "<tr><td>".$profils['cpt_pseudo']."</td><td>".$profils['pfl_prenom']."</td><td>".$profils['pfl_nom']."</td><td>".$profils['pfl_role']."</td><td>".$profils['pfl_validite']."</td>";
                            if ($profils['cpt_pseudo']!='amelien.lemeur@etudiants.univ-brest.fr' && $profils['cpt_pseudo']!=$_SESSION['login']){
                                echo"<td><form action='profil_action.php' method='post'><input type='hidden' name='pseudo' value='".$profils['cpt_pseudo']."'> <input type='submit'  id='submit' value='Activer/Désactiver'></form></td></tr>";
                            }else{
                                echo"</tr>";
                            }
                        }
                        echo "</table>";
                    }
                ?>
            </div>
    </body>
</html>    