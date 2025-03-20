<html>
    <head>
        <script src="../script/script.js"></script>
        <title>Padlet-Session Action</title>
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
                border-top:1px solid white;
                border-right:none;
                border-left:none;
                border-bottom:1px solid white;
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
                <?php
                        session_start();

                if($_POST["pseudo"] && $_POST["mdp"])
                {
                    $pseudo=htmlspecialchars(addslashes($_POST['pseudo']));
                    $mdp=htmlspecialchars(addslashes($_POST['mdp']));
                    $mysqli = new mysqli('localhost','zle_meuam','maaxynd4','zfl2-zle_meuam_1');
                       /* if ($mysqli->connect_errno)
                        {
                        /*echo "Error: Problème de connexion à la BDD \n";
                        echo "Errno: " . $mysqli->connect_errno . "\n";
                        echo "Error: " . $mysqli->connect_error . "\n";
                        exit();
                        }
                        if (!$mysqli->set_charset("utf8")) {
                        printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
                        exit();
                        }
                    //echo ("Connexion BDD réussie !");
                    if (!$mysqli->set_charset("utf8")) {
                        printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
                        exit();
                    }*/
                    $requete_compte="SELECT cpt_pseudo, cpt_mdp FROM t_compte_cpt JOIN t_profil_pfl USING(cpt_pseudo) WHERE cpt_pseudo='".$pseudo."' AND cpt_mdp=MD5('".$mdp."') AND pfl_validite='A';";
                    $result_compte = $mysqli->query($requete_compte);
                    if($result_compte->num_rows==1){
                        $_SESSION['login']=$pseudo;
                        $requete_role="SELECT pfl_role FROM t_profil_pfl WHERE cpt_pseudo='".$pseudo."';";
                        $result_role = $mysqli->query($requete_role);
                        $role=$result_role->fetch_assoc();
                        $_SESSION['role']=$role['pfl_role'];
                        header("Location:admin_accueil.php");
                    }else{
                        echo("<script>alert('Compte erronné ou désactivé, retour a la page précédente.'); location.href='https://obiwan.univ-brest.fr/dinfl2/zle_meuam/v1/page/session.php';</script>");
                    }
                    $mysqli->close();
                }else{
                    echo("<script>alert('Élement.s manquant.s, retour à la page précédente.'); location.href='https://obiwan.univ-brest.fr/dinfl2/zle_meuam/v1/page/session.php';</script>");
                }
                ?>
            </div>
    </body>
</html>    