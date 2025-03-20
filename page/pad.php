<html>
    <head>
        <script src="../script/script.js"></script>
        <title>Padlet - Pads</title>
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
                text-align:center;
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
                    <h1 style="animation: 2s ease-out 0s 1 slideInLeft;">The First Fleet - Padlet - Pads </h1>
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
                    <div id="contenupadlet" style="display:flex; flex-direction:column; justify-content: flex-start; align-items: center; padding:20px; width:80%;border-radius:10px; border-style:solid; border-width: 2px;border-color:#3b3b3b; color:white;">
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
                        if(isset($_GET['code'])){
                            echo"<div class='barre' style='height:2px; width:90%; background-color:#3b3b3b; margin:20px;'></div>";
                            if(isset($_GET['id'])){
                                $code=$_GET['code'];
                                $id=$_GET['id'];
                                $requete_actatl="SELECT * FROM t_activite_act LEFT JOIN t_anime_ani USING(act_id) LEFT JOIN t_atelier_atl USING (act_id)WHERE act_etat='P' AND act_code='".$code."' AND atl_id=".$id.";";
                                $result_actatl= $mysqli->query($requete_actatl);
                                $activite = $result_actatl->fetch_assoc();
                                echo "<br><h2>".$activite['atl_intitule']."</h2><br>";
                                $animateurs="SELECT cpt_pseudo FROM t_anime_ani  JOIN t_activite_act USING(act_id) WHERE act_code='".$code."';";
                                $result_ani= $mysqli->query($animateurs);
                                $ani = $result_ani->fetch_assoc();
                                if ($ani['cpt_pseudo']==null){
                                    echo" <h3> Pas d'animateur </h3>";
                                }else{
                                    echo"<h3>Animateur.ice.s: ".$ani['cpt_pseudo'];
                                    while($ani = $result_ani->fetch_assoc()){
                                        echo ", ".$ani['cpt_pseudo'];
                                    }
                                    echo "</h3>";
                                }
                                echo "<p>".$activite['atl_texte']."</p>";
                                $requete_ressource="SELECT * FROM t_ressource_rsc WHERE atl_id=".$id;
                                $result_ressource=$mysqli->query($requete_ressource);
                                $ressource=$result_ressource->fetch_assoc();
                                if ($ressource['rsc_id']==null){
                                    echo" <h3> Pas de ressources :c </h3>";
                                }else{

                                    /*Types pour ressource:
                                    1:picture
                                    2:link
                                    3:file to download
                                    4:video
                                    5:audio*/
                                    echo "<div id=ressources >";
                                    switch ($ressource['rsc_type']){
                                        case 1:
                                            echo "<img src='".$ressource['rsc_chemin']."' height='275px'>";
                                            break;

                                        case 2:
                                            echo "<a href='".$ressource['rsc_chemin']."' target='_blank'>".$ressource['rsc_titre']."</a>";
                                            break;

                                        case 3:
                                            echo "<a href='".$ressource['rsc_chemin']."' download>".$ressource['rsc_titre']."</a>";
                                            break;

                                        case 4:
                                            echo "<video controls width='300'> <source src='".$ressource['rsc_chemin']."' type='video/mp4'></video>";
                                            break;
                                            
                                        case 5:
                                            echo "<audio controls src='".$ressource['rsc_chemin']."' >";
                                            break;
                                    
                                        default:
                                            echo "<h4> Erreur, type inconnu </h4>";
                                            break;
                                    }
                                    while($ressource=$result_ressource->fetch_assoc()){
                                        switch ($ressource['rsc_type']){
                                            case 1:
                                                echo "<img src='".$ressource['rsc_chemin']."' height='300px'>";
                                                break;
    
                                            case 2:
                                                echo "<a href='".$ressource['rsc_chemin']."' target='_blank'>".$ressource['rsc_titre']."</a>";
                                                break;
    
                                            case 3:
                                                echo "<a href='".$ressource['rsc_chemin']."' download>".$ressource['rsc_titre']."</a>";
                                                break;
    
                                            case 4:
                                                echo "<video controls width='300'><source src='".$ressource['rsc_chemin']."' type='video/mp4'></video>";
                                                break;
                                                
                                            case 5:
                                                echo "<audio controls src='".$ressource['rsc_chemin']."' download>";
                                                break;
                                        
                                            default:
                                                echo "<h4> Erreur, type inconnu </h4>";
                                                break;
                                        }
                                    }
                                    echo "</div>";
                                    echo"<div class='barre' style='height:2px; width:90%; background-color:#3b3b3b; margin:20px;'></div>";
                                }


                            }else{

                                $code=$_GET['code'];
                                $requete_act="SELECT * FROM t_activite_act LEFT JOIN t_anime_ani USING(act_id) WHERE act_etat='P' AND act_code='".$code."';";
                                $result_act= $mysqli->query($requete_act);
                                $activite = $result_act->fetch_assoc();
                                echo "<br><h2>".$activite['act_intitule']."</h2><br>";
                                if ($activite['cpt_pseudo']==null){
                                    echo" <h3> Pas d'animateur </h3>";
                                }else{
                                    echo"<h3>Animateur.ice.s: ".$activite['cpt_pseudo'];
                                    while($activite = $result_act->fetch_assoc()){
                                        echo ", ".$activite['cpt_pseudo'];
                                    }
                                    echo "</h3>";
                                }
                                $requete_atl="SELECT * FROM t_activite_act LEFT JOIN t_atelier_atl USING(act_id)LEFT JOIN t_anime_ani USING(act_id) LEFT JOIN t_ressource_rsc USING(atl_id) WHERE act_etat='P' AND act_code='".$code."';";
                                $result_atl= $mysqli->query($requete_atl);
                                $atelier = $result_atl->fetch_assoc();
                                if($atelier['atl_id']==null){
                                    echo "<h3> <br> Oups ! On dirait qu'il n'ya aucune activité liée à ce pad pour l'instant !</h3>";
                                }else{

                                echo "<br><table>";
                                echo "<tr><th>Atelier</th><th>Ressource</th><th>Description</th>";
                                echo "<tr><td><a href='./pad.php?code=".$_GET['code']."&id=".$atelier['atl_id']."'>".$atelier['atl_intitule']."</a></td><td><a href='".$atelier['rsc_chemin']."'target='_blank'>".$atelier['rsc_titre']."</a></td><td>".$atelier['rsc_desc']."</td></tr>";
                                while ($atelier = $result_atl->fetch_assoc())
                                {
                                    echo "<tr><td><a href='./pad.php?code=".$_GET['code']."&id=".$atelier['atl_id']."'>".$atelier['atl_intitule']."</a></td><td><a href='".$atelier['rsc_chemin']."'target='_blank'>".$atelier['rsc_titre']."</a></td><td>".$atelier['rsc_desc']."</td></tr>";
                                }
                                echo "</table>";
                                }
                            }
                        }   else {
                            echo ("Vous avez oublié le paramètre !");
                            exit();
                        }
                        
                        $mysqli->close();
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>    