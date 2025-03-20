<html>
    <head>
        <script src="../script/script.js"></script>
        <title>Padlet</title>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="icon" href="../media/logo.png" type="image/gif">
    <style>
            .header{
                background-image: url("../media/tof.jpg");
            }
            .navbar li:hover {
            background-color: grey;
            color:black;
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

            #contenu{
                height:3000px;
            }
            #contenu a{
                color:#23e7e7;
            }
            .pied{
                background-color: #23e7e7;
            }
            table, th, td {
                border-top:1px solid white;
                border-bottom:1px solid white;
                border-collapse:collapse;
                text-align:center;
            }
            td{
                height:50px;
                width:450px;
            }
            th{
                height: 40px;
                color:black;
                background-color: #23e7e7;
            }
    </style>
        
    </head>
    <body>
            <div class="header">
                <div style="display:flex ;align-items:flex-end; background: linear-gradient(90deg, rgba(0,0,0,0.7) 0%, rgba(255,255,255,0) 100%);">
                    <img id="logo" src="../media/logo.png" height="100px">
                    <h1 style="animation: 2s ease-out 0s 1 slideInLeft;">The First Fleet - Padlet </h1>
                </div>
            </div>

            <div class="navbar">
                <input type=image src="../media/Hamburger_icon_white.png" id="Hamburger Icon" height="50px" onclick="showmenu()">
                <ul>
                    <li><a href="./padlet.php" class="boutton"> Padlet - Accueil </a></li>
                    <li><a href="./animation.php" class="boutton"> Animation & Activités </a></li>
                    <?php
                        session_start();
                        if(!isset ($_SESSION["login"]) && !isset($_SESSION["role"])){
                            echo"<li><a href='../page/session.php'>Se Connecter</a></li>";
                        }else{
                        
                            echo"<li><a href='./deconnexion.php'>Déconnexion</a></li>";
                        }
                    ?>
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
                        <li><a href="../page/animation.php">Animation</a></li>
                        <br>
                        <li><a href="../page/session.php">Se Connecter</a></li>
                        <br>
                        <li><a href="../page/join.php">Nous Rejoindre</a></li>

                    </h3></ul>
                    <div class="barre" style="height:1px; width:90%; background-color:#3b3b3b;"></div>
                </div>
                <div id="contenu">
                    <div id="contenupadlet" style="display:flex; flex-direction:column; align-items:center; justify-content:flex-start; height:1000px;">
                    <img id="logo" src="../media/logo.png" height="100px" width="100px">
                        <?php
                        $mysqli = new mysqli('localhost','zle_meuam','maaxynd4','zfl2-zle_meuam_1');
                        if ($mysqli->connect_errno)
                        {
                        // Affichage d'un message d'erreur
                        echo "Error: Problème de connexion à la BDD \n";
                        echo "Errno: " . $mysqli->connect_errno . "\n";
                        echo "Error: " . $mysqli->connect_error . "\n";
                        // Arrêt du chargement de la page
                        exit();
                        }
                        // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
                        if (!$mysqli->set_charset("utf8")) {
                        printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
                        exit();
                        }
                        //echo ("Connexion BDD réussie !");


                        $requete_news="SELECT * FROM t_news_new WHERE new_etat='P';";
                        $requete_conf="SELECT * FROM t_configuration_cnf;";


                        $result_news = $mysqli->query($requete_news);
                        $result_conf=$mysqli->query($requete_conf);
                        if ($result_news == false) //Erreur lors de l’exécution de la requête
                        { // La requête a echoué
                        echo "Error: La requête a echoué \n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit();
                        }
                        else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
                        {
                        $conf=$result_conf->fetch_assoc();
                        echo("<h1>".$conf['cnf_nom']."</h1>");
                        echo("<h3>".$conf['cnf_desc']."</h3>");
                        echo ("<br />");
                        echo ("<p margin='20px;'>Bienvenue sur la padlet de l'association, voci les actualités:</p>");
                        echo("<table><tr><th>Titre</th><th>Texte</th><th>Auteur</th><th>Date</th></tr>");
                        while ($actu = $result_news->fetch_assoc())
                        {
                        echo("<tr>");
                        echo ("<td>".$actu['new_titre'] ."</td><td>". $actu['new_texte'] . "</td>");
                        echo ("<td>".$actu['cpt_pseudo']."</td><td>". $actu['new_date']. "</td>");
                        echo ("</tr>");
                        }
                        echo("</table>");
                        echo'<br>';
                        echo "<div id=footer style='width:100%;'>";
                        echo("<h3>".$conf['cnf_adressemail']."</h3>");
                        echo("<h3>".$conf['cnf_adressepostale']."</h3>");
                        echo("<h3>".$conf['cnf_numerotelephone']."</h3>");
                        echo "</div>";

                        }
                        //Ferme la connexion avec la base MariaDB
                        $mysqli->close()
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>    