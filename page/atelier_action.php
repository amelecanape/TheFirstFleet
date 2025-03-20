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
                    if($_POST['action']==2){
                        $titre=htmlspecialchars(addslashes($_POST['titre']));
                        $texte=htmlspecialchars(addslashes($_POST['texte']));
                        $requete_add="INSERT INTO t_atelier_atl VALUES(NULL,'".$titre."', CURDATE(),'".$texte."','".$_POST['etat']."',".$_POST['pad'].");";
                        $result_add=$mysqli ->query($requete_add);
                        if(!$result_add){
                            echo "<h2>Err</h2>";
                        }else{
                            header('Location:admin_ateliers.php');
                        }
                    }else if($_POST['action']==1){
                        if($_POST['atelier']){
                            $atelier=$_POST['atelier'];
                            $requete_delete="DELETE  FROM t_ressource_rsc WHERE atl_id=".$atelier.";";
                            $result_delete=$mysqli ->query($requete_delete);
                            if(!$result_delete){
                                echo "<h2>Err</h2>";
                            }else{
                            $requete_delete2="DELETE FROM t_atelier_atl WHERE atl_id='".$atelier."';";
                            $result_delete2=$mysqli ->query($requete_delete2);
                            header('Location:admin_ateliers.php');
                            }
                        }else{
                            header('Location:admin_ateliers.php');
                        }
                    }else{
                        header('Location:admin_ateliers.php');

                    }
                ?>
            </div>
    </body>
</html>    