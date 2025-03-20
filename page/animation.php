<html>
    <head>
        <script src="../script/script.js"></script>
        <title>Padlet-Animation</title>
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
            table, th, td {
                border:1px solid white;
                border-collapse:collapse;
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
                    <h1 style="animation: 2s ease-out 0s 1 slideInLeft;">The First Fleet - Padlet - Animation </h1>
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
                    <div id="contenupadlet" style="display:flex; flex-direction:row; height:1000px;">
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
                        $requete_act="SELECT * FROM t_activite_act WHERE act_etat='P'";
                        $result_act= $mysqli->query($requete_act);
                        while ($activite = $result_act->fetch_assoc())
                        {
                            $requete_anim="SELECT* FROM t_anime_ani WHERE act_id=".$activite['act_id'];
                            $result_anim= $mysqli->query($requete_anim);
                            
                            echo("<div class='atelier'><div class='barre' style='height:2px; width:90%; background-color:black;'></div><h1>".$activite['act_intitule']."</h1>");
                            echo("<br>");
                            if($animation = $result_anim->fetch_assoc()){
                                echo("<h3>Animateurs:</h3><ul><li>".$animation['cpt_pseudo']."</li>");
                                while ($animation = $result_anim->fetch_assoc()){
                                    echo("<li>".$animation['cpt_pseudo']."</li>");
                                }
                                echo("</ul>");
                            }else{
                                echo("<h3>Pas d'animateur</h3>");
                            }
                            $requete_rsc="SELECT rsc_id FROM t_ressource_rsc WHERE atl_id IN(SELECT atl_id FROM t_atelier_atl WHERE act_id=".$activite['act_id'].");";
                            $result_rsc= $mysqli->query($requete_rsc);
                            echo("Nombre de ressources:".$result_rsc->num_rows);
                            echo("<br><div class='barre' style='height:2px; width:90%; background-color:black;'></div></div>");
                        }
                        $mysqli->close();
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>    