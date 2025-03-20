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
                    $mysqli = new mysqli('localhost','zle_meuam','maaxynd4','zfl2-zle_meuam_1');
                    if($_POST['pseudo']){
                        $pseudo=$_POST['pseudo'];
                        $requete_compte="SELECT pfl_validite FROM t_profil_pfl WHERE cpt_pseudo='".$pseudo."'";
                        $result_compte = $mysqli->query($requete_compte);
                        $validite=$result_compte->fetch_assoc();
                        if($validite['pfl_validite']=='D'){
                         $requete_val="UPDATE t_profil_pfl SET pfl_validite='A' WHERE cpt_pseudo='".$pseudo."'";   
                        }else{
                         $requete_val="UPDATE t_profil_pfl SET pfl_validite='D' WHERE cpt_pseudo='".$pseudo."'";   
                        }
                        $result_val = $mysqli->query($requete_val);
                        header("Location:admin_accueil.php");
                    }else{
                        echo "<h2> beug wsh </h2>";
                    }
                    
                ?>
            </div>
    </body>
</html>    