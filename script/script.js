let imgIndex = 0;
            
function auto(){
    displaySlide()
    let img_id=setInterval(plus,5000)
}


function showImage(n) {
    imgIndex=n;
    displaySlide();
}

function plus(){
    imgIndex+=1;
    displaySlide();
}

function minus(){
    imgIndex-=1;
    displaySlide();
}


function displaySlide() {
    let i;
    let slides = document.getElementsByClassName("slides");

    if (imgIndex >= slides.length) {
        imgIndex = 0;
    }

    if (imgIndex < 0) {
        imgIndex = slides.length - 1;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[imgIndex].style.display = "block";
}

let menuaff=false;
let atelieraff=false

function afficheatelier(){
    if (atelieraff){
        atelier=document.getElementById("addatelier");
        atelier.style.display="none";
        atelieraff=false;  
    }else{
        atelier=document.getElementById("addatelier");
        atelier.style.display="flex";
        atelieraff=true;  
    }
}
    
function showmenu(){
    menu=document.getElementById("navmenu");
    contenu=document.getElementById("contenu");
    if (menuaff){
        menu.style.display="none";
        menuaff=false;
        contenu.style.width="100%";
        contenu.style.margin="50px";
    }else{
        menu.style.display="flex";
        menuaff=true;
        contenu.style.width="80%";
        contenu.style.margin="0px";
    }
}

function Submit(){   
        let nom=document.getElementById("nom").value;
        let prenom=document.getElementById("prenom").value;
        let regexp= /^[A-Za-z]+$/;
        if(!regexp.test(nom)){
            alert("Le nom doit être écrit avec des charactères alphabetiques");
        }
        if(!regexp.test(prenom)){
            alert("Le prenom doit être écrit avec des charactères alphabetiques");
        }
        if(regexp.test(prenom) && regexp.test(prenom)){
            alert("Bienvevue dans l'association, " + prenom +" "+nom+ " !")
        }
}

let light = "false";

function lightmode(){
    if(!light){
        document.body.style="background-color:white; color:black;";
        document.getElementsByClassName("navbar")[0].style="background-color:rgb(200, 200, 200);";
        document.getElementsByClassName("header")[0].style="color:rgb(218, 218, 218);";
        document.getElementById("Hamburger Icon").src="./media/Hamburger_icon.png";
        document.getElementById("moon").src="./media/moon_icon.png";
        light=true;
    }else{
        document.body.style="background-color:#1a1a1a; color:rgb(218, 218, 218);";
        document.getElementsByClassName("navbar")[0].style="background-color:#1a1a1a;";
        document.getElementsByClassName("header")[0].style="color:rgb(218, 218, 218);";
        document.getElementById("Hamburger Icon").src="./media/Hamburger_icon_white.png";
        document.getElementById("moon").src="./media/sun_icon.png";
        light=false;
    }
}
function pageslightmode(){
    if(!light){
        document.body.style="background-color:white; color:black;";
        document.getElementsByClassName("navbar")[0].style="background-color:rgb(200, 200, 200);";
        document.getElementsByClassName("header")[0].style="color:rgb(218, 218, 218);";
        document.getElementById("Hamburger Icon").src="../media/Hamburger_icon.png";
        document.getElementById("moon").src="../media/moon_icon.png";
        light=true;
    }else{
        document.body.style="background-color:#1a1a1a; color:rgb(218, 218, 218);";
        document.getElementsByClassName("navbar")[0].style="background-color:#1a1a1a;";
        document.getElementsByClassName("header")[0].style="color:rgb(218, 218, 218);";
        document.getElementById("Hamburger Icon").src="../media/Hamburger_icon_white.png";
        document.getElementById("moon").src="../media/sun_icon.png";
        light=false;
    }
}






let xmlhttp = new XMLHttpRequest();
    function loadXMLDoc() {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                fetchData();
            }
        };
        xmlhttp.open("GET", "/users/ameli/Documents/siteweb/bdd.xml", true);
        xmlhttp.send();
    }

    function fetchData() {
        let i;
        let xmlDoc = xmlhttp.responseXML;
        let table = "<tr><th>Monster</th><th>Habitat</th><th>Faiblesse</th></tr>";
        let x = xmlDoc.getElementsByTagName("monstre");
        for (i = 0; i < x.length; i++) {
            table += "<tr><td>" +
            x[i].getElementsByTagName("nom")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("habitat")[0].childNodes[0].nodeValue +
            "</td><td>" +
            x[i].getElementsByTagName("faiblesse")[0].childNodes[0].nodeValue +
            "</td>" +
            "<td><button type=\"button\" onclick=\"editMonster(" +
            x[i].getElementsByTagName("ID")[0].childNodes[0].nodeValue + ")\">" +
            "Edit</button></td>" +
            "<td><button type=\"button\" onclick=\"deleteMonster(" +
            x[i].getElementsByTagName("ID")[0].childNodes[0].nodeValue + ")\"style='background-color:#1a1a1a;border:none;color:red;'>" +
            "<b>X</b></button></td>" +                
            "</tr>";

        }
        document.getElementById("data").innerHTML = table;
    } 
    
    function editMonster(id) {
        let tblMonstre = document.getElementById("tblMonstre");
        let txtNom = document.getElementById("txtNom");
        let txtHabitat = document.getElementById("txtHabitat");
        let txtFaiblesse = document.getElementById("txtFaiblesse");
        let hId = document.getElementById("hId");
    
        let xmlDoc = xmlhttp.responseXML;
        let monstres = xmlDoc.getElementsByTagName("monstre");
        let monstre;
    
        for (i = 0; i < monstres.length; i++) {
            if (monstres[i].getElementsByTagName("ID")[0].childNodes[0].nodeValue == id) {
                monstre = monstres[i];
            }
        }
    
        tblMonstre.style.display = "block";
        hId.value = monstre.getElementsByTagName("ID")[0].childNodes[0].nodeValue;
        txtNom.value = monstre.getElementsByTagName("nom")[0].childNodes[0].nodeValue;
        txtHabitat.value = monstre.getElementsByTagName("habitat")[0].childNodes[0].nodeValue;
        txtFaiblesse.value =monstre.getElementsByTagName("faiblesse")[0].childNodes[0].nodeValue;
    }

    function updateMonster() {
        let xmlDoc = xmlhttp.responseXML;
        let id = document.getElementById("hId").value;
        let monstres = xmlDoc.getElementsByTagName("monstre");
        let monstre;
    
        for (i = 0; i < monstres.length; i++) {
            if (monstres[i].getElementsByTagName("ID")[0].childNodes[0].nodeValue == id) {
                monstre = monstres[i];
            }
        }
    
        let txtNom = document.getElementById("txtNom");
        let txtHabitat = document.getElementById("txtHabitat");
        let txtFaiblesse = document.getElementById("txtFaiblesse");
    
        monstre.getElementsByTagName("nom")[0].childNodes[0].nodeValue = txtNom.value;
        monstre.getElementsByTagName("habitat")[0].childNodes[0].nodeValue = txtHabitat.value;
        monstre.getElementsByTagName("faiblesse")[0].childNodes[0].nodeValue = txtFaiblesse.value;
    
        fetchData();
    }

    function deleteMonster(id) {
        let xmlDoc = xmlhttp.responseXML;
        let monstres = xmlDoc.getElementsByTagName("monstre");
        let monstre;

        for (i = 0; i < monstres.length; i++) {
            if(monstres[i].getElementsByTagName("ID")[0].childNodes[0].nodeValue == id) {
                monstre = monstres[i];
            }
        }
        
        xmlDoc.documentElement.removeChild(monstre);
        fetchData();
    }

    function makeTextFile (text) {
        let textFile = null;
        let data = new Blob([text], { type: 'text/plain' });

        if (textFile !== null) {
            window.URL.revokeObjectURL(textFile);
        }

        textFile = window.URL.createObjectURL(data);

        return textFile;
    };

    function saveMonster() {                
        let create = document.getElementById('btnSave');

        let link = document.createElement('a');
        link.setAttribute('download', 'dwc_bdd.xml');
        
        const s = new XMLSerializer();

        link.href = makeTextFile(s.serializeToString(xmlhttp.responseXML));
        document.body.appendChild(link);

        window.requestAnimationFrame(function () {
            let event = new MouseEvent('click');
            link.dispatchEvent(event);
            document.body.removeChild(link);
        });
    }

    function loadAddMonster(){
        let tblMonstre = document.getElementById("tblMonstreAdd");
        tblMonstre.style.display = "block";

    }
    function addMonster() {
        let xmlDoc = xmlhttp.responseXML;
        let monstres = xmlDoc.getElementsByTagName("monstre");
        
        let addNom=document.getElementById("addtxtNom").value;
        let addHabitat=document.getElementById("addtxtHabitat").value;
        let addFaiblesse=document.getElementById("addtxtFaiblesse").value;
    
        let monstre = xmlDoc.createElement("monstre");    
        let id = xmlDoc.createElement("ID");
        let nom = xmlDoc.createElement("nom");
        let habitat = xmlDoc.createElement("habitat");
        let faiblesse = xmlDoc.createElement("faiblesse");
    
        let id_Text = xmlDoc.createTextNode(monstres.length+1);
        id.appendChild(id_Text);
        let nom_Text = xmlDoc.createTextNode(addNom);
        nom.appendChild(nom_Text);
        let habitat_Text = xmlDoc.createTextNode(addHabitat);
        habitat.appendChild(habitat_Text);
        let faiblesse_Text = xmlDoc.createTextNode(addFaiblesse);
        faiblesse.appendChild(faiblesse_Text);
    
    
        monstre.append(id);
        monstre.appendChild(nom);
        monstre.appendChild(habitat);
        monstre.appendChild(faiblesse);
    
        let bestiaire = xmlDoc.getElementsByTagName("monstre")[0];
        bestiaire.appendChild(monstre);
    
        fetchData();
    }
    function clearInp() {
        document.getElementsByTagName("input").value = "";
        }
       