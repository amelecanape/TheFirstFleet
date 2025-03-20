<html>
    <head>
        <script src="../script/script.js"></script>
        <title>Padlet-Action</title>
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
                    <h1 style="animation: 2s ease-out 0s 1 slideInLeft;">The First Fleet - Padlet - Action </h1>
                </div>
            </div>

            <div class="navbar">
                <input type=image src="../media/Hamburger_icon_white.png" id="Hamburger Icon" height="50px" onclick="showmenu()">
                <ul>
                    <li><a href="../index.html" class="boutton"> Accueil </a></li>
                    <li><a href="./quisommesnous.html" class="boutton"> Info & Pages</a></li>
                    <li><a href="./join.php"> Nous-Rejoindre</a></li>
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
                        <li><a href="./join.html">Nous-Rejoindre</a></li>
                        <br>
                        <li><a href="./zinogre.html">Le Zinogre</a></li>
                        <br>
                        <li><a href="./safijiiva.html">Le Safi'Jiiva</a></li>
                        <br>
                        <li><a href="./fatalis.html">Le Fatalis</a></li>
                        <br>
                        <li><a href="../page/base.html">Base de monstres</a></li>
                        <br>
                        <li><a href="../page/padlet.php">Padlet</a></li>
                    </h3></ul>
                    <div class="barre" style="height:1px; width:90%; background-color:#3b3b3b;"></div>
                </div>
                <div id="contenu">
                <?php
                if($_POST['nom']!=NULL && $_POST['prenom']!=NULL && $_POST['pseudo']!=NULL && $_POST['mdp']!=NULL && $_POST['mdpconf']!=NULL && !strcmp($_POST['mdp'],$_POST['mdpconf']))
                {
                    $nom=htmlspecialchars(addslashes($_POST['nom']));
                    $prenom=htmlspecialchars(addslashes($_POST['prenom']));
                    $pseudo=htmlspecialchars(addslashes($_POST['pseudo']));
                    $mdp=htmlspecialchars(addslashes($_POST['mdp']));
                    $mdpconf=htmlspecialchars(addslashes($_POST['mdpconf']));
                    $mysqli = new mysqli('localhost','zle_meuam','maaxynd4','zfl2-zle_meuam_1');
                        if ($mysqli->connect_errno)
                        {
                        echo "Error: Problème de connexion à la BDD \n";
                        echo "Errno: " . $mysqli->connect_errno . "\n";
                        echo "Error: " . $mysqli->connect_error . "\n";
                        exit();
                        }
                        if (!$mysqli->set_charset("utf8")) {
                        printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
                        exit();
                        }
                    echo ("Connexion BDD réussie !");
                    if (!$mysqli->set_charset("utf8")) {
                        printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
                        exit();
                    }
                    $requete_compte="INSERT INTO t_compte_cpt VALUES('" .$pseudo. "',MD5('" .$mdp. "'));";
                    $result_compte = $mysqli->query($requete_compte);
                    if ($result_compte == false)
                    {
                    // La requête a echoué
                        echo "Error: La requête a échoué \n";
                        echo "Query: " . $requete_compte . "\n";
                        echo "Errno: " . $mysqli->errno . "\n";
                        echo "Error: " . $mysqli->error . "\n";
                        exit;
                    }
                    else
                    {
                        $requete_pfl="INSERT INTO t_profil_pfl VALUES('" .$prenom. "','" .$nom. "','D','A',CURDATE(),'".$pseudo."');";
                        $result_pfl = $mysqli->query($requete_pfl);
                        if ($result_pfl == false)
                        {
                            $requete_cptsuppr="DELETE FROM t_compte_cpt WHERE cpt_pseudo='".$pseudo."';";
                            $result_cptsuppr = $mysqli->query($requete_cptsuppr);
                            echo("<script>alert('erreur, retour à la page précédente.'); location.href='https://obiwan.univ-brest.fr/dinfl2/zle_meuam/v1/page/join.php';</script>");
                        }else{
                            echo("<h1>Inscription Reussie !</h1>");
                        }
                    }
                    $mysqli->close();
                }else{
                    echo("<script>alert('Élement manquant ou mots de passes non-correspondants, retour à la page précédente.'); location.href='https://obiwan.univ-brest.fr/dinfl2/zle_meuam/v1/page/join.php';</script>");
                }
                ?>
            </div>
    </body>
</html>    