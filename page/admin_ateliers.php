<?php
    session_start();
    if(!isset ($_SESSION["login"]) && !isset($_SESSION["role"])){
        header("Location:session.php");
    }
?>
<html>
    <head>
        <script src="../script/script.js">
        </script>
        <title>Padlet- Gestion Ateliers</title>
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

            .navbar{
            background-color: #1a1a1a;
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
            }
            td{
                justify-content: center;
                text-align: center;
                height:fit-content;
                width: 250px;
                padding:10px;
            }
            th{
                align-content: center;
                height: 40px;
                color:black;
                background-color: #faa700dd;;
            }
            #submit{
                border:none;
                margin-top:10px;
                height:40px;
                border-radius:10px;
                background-color: red;
            }
            select{
                color:white;
                height:40px;
                margin:20px;
                border-radius:10px;
                border-style:solid;
                background:transparent; 
                color:white;
                padding-left:15px;
                padding-right:15px;
            }
            select option{
                color:white;
                background-color:#1a1a1a;
                height:40px;
                margin:20px;
                border-radius:10px;
                border-style:solid;
                color:white;
                padding-left:15px;
                padding-right:15px;
            }
    </style>
        
    </head>
    <body style="height:fit-content">
            <div class="header">
                <div style="display:flex ;align-items:flex-end; background: linear-gradient(90deg, rgba(0,0,0,0.7) 0%, rgba(255,255,255,0) 100%);">
                    <img id="logo" src="../media/logo.png" height="100px">
                    <h1 style="animation: 2s ease-out 0s 1 slideInLeft;">The First Fleet - Padlet - Gestion Ateliers </h1>
                </div>
            </div>

            <div class="navbar" >
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
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><img src="../media/logo.png"height="100px"></a>
                    <div id="addatelier" style="display:none;flex-direction:column; justify-content:center; align-items:center; height:800px; width:50%;border-radius:10px; border-style:solid; border-width: 2px;border-color:#3b3b3b; color:white; padding:20px;">
                        <h2>Creation d'une nouvelle activité:</h2>
                        <form action="atelier_action.php" method="post" style="display:flex;flex-direction:column; justify-content:center; align-items:center; width:100%" autocomplete="off">    
                            <input type='hidden' name='action' value=2>
                            <div class=inputbox style="height:40px;width:90%;">
                                <input type="text" name="titre" value=""  onkeyup="this.setAttribute('value', this.value);" autocomplete="off"style="height:40px;width:95%;border-radius:10px;border-style:solid;background:transparent; color:white;padding-left:15px;padding-right:15px;">
                                <label style="left:25px;">Titre:</label>
                            </div>
                            <div class=inputbox style="height:400px;width:90%;">
                                <textarea name="texte" value="" rows="1" cols="50" onkeyup="this.setAttribute('value', this.value);" autocomplete="off"style="height:400px;width:95%;border-radius:10px;border-style:solid;background:transparent; color:white;padding-left:15px;padding-right:15px;">
                                </textarea>
                            </div>
                            <div class=inputbox style="height:40px;width:90%;">
                                <input type="number" name="pad" value=""  onkeyup="this.setAttribute('value', this.value);" autocomplete="off"style="height:40px;width:95%;border-radius:10px;border-style:solid;background:transparent; color:white;padding-left:15px;padding-right:15px; ">
                                <label style="left:25px;">Pad correspondant:</label>
                         </div>
                                <select name="etat">
                                    <option value="C">Cachée</option>
                                    <option value="P">Publique</option>
                                </select>
                            
                        <hr style="color:transparent">
                        <input type="submit"style="height:40px;width:20%;border-radius:10px;background-color:#faa700dd; font-weight:bold;" value="Publier">
                </form>

                </div>
                    <div class="ateliers" style="display:flex; flex-direction:column">
                        <?php
                            $mysqli = new mysqli('localhost','zle_meuam','maaxynd4','zfl2-zle_meuam_1');
                            $act=null;
                            $atl=null;
                            $requete_atelier="SELECT * FROM t_activite_act LEFT JOIN t_atelier_atl USING(act_id) LEFT JOIN t_ressource_rsc USING(atl_id) LEFT JOIN t_anime_ani USING(act_id);";
                            $result_atelier= $mysqli ->query($requete_atelier);
                            echo "<br><h2>Listes des ateliers de l'application:</h2><br>";
                            echo "<input type=image  height='50px' id='moon' onclick='afficheatelier()' src='../media/plus-icon.png' style='height:30px; width:30px; margin: 10px; align-self:right;'>";
                                echo "<table><tr><th>Animateur</th><th>Activité</th><th>ID Pad</th><th>Atelier</th><th>État</th><th>Ressource</th><th>Description Ressource</th><th>Action</th></tr>";
                                while ($atelier=$result_atelier->fetch_assoc()){
                                    
                                    if($act!=$atelier['act_id']){
                                        $act=$atelier['act_id'];
                                        $atl=$atelier['atl_id'];
                                        echo "<tr><td style='border-left:solid 1px'>".$atelier['cpt_pseudo']."</td><td>".$atelier['act_intitule']."</td><td>".$atelier['act_id']."</td><td>".$atelier['atl_intitule']."</td><td>".$atelier['atl_etat']."</td><td><a href='".$atelier['rsc_chemin']."'>".$atelier['rsc_titre']."</a></td><td style='border-right:solid 1px'>".$atelier['rsc_desc']."</td>";
                                        echo"<td style='border:none;'><form action='atelier_action.php' method='post'><input type='hidden' name='atelier' value='".$atelier['atl_id']."'><input type='hidden' name='action' value=1> <input type='submit'  id='submit' value='Supprimer'></form></td></tr>";
                                    }else{
                                        if($atl!=$atelier['atl_id']){
                                            $atl=$atelier['atl_id'];
                                            echo "<tr><td style='border:none;'></td><td style='border:none;'></td><td style='border:none;'></td><td style='border-left:solid 1px'>".$atelier['atl_intitule']."</td><td>".$atelier['atl_etat']."</td><td><a href='".$atelier['rsc_chemin']."'>".$atelier['rsc_titre']."</a></td><td style='border-right:solid 1px'>".$atelier['rsc_desc']."</td>";
                                            echo"<td style='border:none;'><form action='atelier_action.php' method='post'><input type='hidden' name='atelier' value='".$atelier['atl_id']."'><input type='hidden' name='action' value=1> <input type='submit'  id='submit' value='Supprimer'></form></td></tr>";
                                        }else{
                                            echo "<tr><td style='border:none;'></td><td style='border:none;'></td><td style='border:none;'></td><td style='border:none;'></td><td style='border:none;'></td><td style='border-left:solid 1px'><a href='".$atelier['rsc_chemin']."'>".$atelier['rsc_titre']."</a></td><td style='border-right:solid 1px'>".$atelier['rsc_desc']."</td>";
                                        }
                                    }
                            }
                                echo "</table>";
                                    
                        ?>
                    </div>
                   
                </div>

    </body>
</html>    