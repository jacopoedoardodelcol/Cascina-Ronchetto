<!DOCTYPE html>

<html>
    
    <head>
        <title>Contatti</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
        <link rel="stylesheet" href="css/contact.css">
        <link rel="stylesheet" href="css/navigation.css">
        <link rel="stylesheet" href="css/snackbar.css">
        <style>
            body {background-color: lightgoldenrodyellow; font-family: sans-serif;}            
        </style>
        <script type="text/javascript" src="js/navigation.js"></script>
        <script type="text/javascript" src="js/snackbar.js"></script>   
    </head>
    
    <body>

<!-- Navigation bar -->
        <div class="sidebar" id="nav_sidebar">
            <a href="javascript:void(0)" class="close_button" onclick="closeSidebar()">&times;</a>
            <a href="Home.html">Home</a>
            <a href="Menu.html">Ristorante</a>
            <a href="Activities.html">Visite guidate</a>
            <a href="http://localhost/Contact.php">Contatti</a>
            <button class="dropdown-button" onclick="dropdown()">Prodotti</button>
            <div class="dropdown-window" id="dropdown_window">
                <a href="Product_cheese.html">Formaggio</a>
                <a href="Product_honey.html">Miele</a>
                <a href="Product_oil.html">Olio</a>
                <a href="Product_wine.html">Vino</a>
            </div>
        </div>    
    
<!-- Top menu -->
        <div id="top_menu">
            <button class="open_button" onclick="openSidebar()" style="display: inline-block; float: left">&#9776;</button>
            <div style="display: inline-block; float: right; font-size: 30px; padding-right: 10px">Cascina Ronchetto</div>
        </div>
        
<!-- Banner -->
        <div class="banner">
            <img src="images/contact_banner.jpg" style="width:100%" alt="Agriturismo con paesaggio circostante">
            <div class="banner-title">Come contattarci</div>
        </div>
        
<!-- Contacts -->        
        <div style="padding: 20px">
            Cascina Ronchetto è situata a Zavattarello, un paesino dell'Oltrepo Pavese a circa 60 km da Pavia e 10 km da Varzi, facilmente raggiungibile in automobile.<br>
            Puoi contattarci al numero di telefono +39 xxx xxxxxxx oppure inviandoci una email a <a href= "mailto:cascina.ronchetto@mail.com">cascina.ronchetto@mail.com</a>.<br>
            In alternativa compila il form sottostante per inviarci una email, ti risponderemo appena possibile.        
        </div>
              
        <br>
            
        <img src="images/localizzazione.jpg" style="display: block; margin-left: auto; margin-right: auto; width: 50%" alt="Mappa raffigurante la posizione dell'agriturismo">
            
        <br>
        
        <div class="contact-form">
            <form name="contactform" action="<?php $PHP_SELF; ?>" method="post">

                <label for="email">Il vostro indirizzo email (in modo da potervi ricontattare)</label>
                <input type="text" id="email" name="email" placeholder="Email">

                <label for="name">Il vostro nome</label>
                <input type="text" id="name" name="name" placeholder="Nome">

                <label for="activity">Attività</label>
                <select id="activity" name="activity">
                    <option value="Pranzo al ristorante">Pranzo al ristorante</option>
                    <option value="Trekking a cavallo">Trekking a cavallo</option>
                    <option value="Dal latte al formaggio">Dal latte al formaggio</option>
                    <option value="Dal fiore al miele">Dal fiore al miele</option>
                    <option value="Olive oil tasting">Olive oil tasting</option>
                    <option value="Wine tasting">Wine tasting</option>
                </select>
                
                <label for="chosendate">La data da voi desiderata</label>
                <input type="date" id="chosendate" name="chosendate" min="2021-01-01"><br><br>

                <label for="notes">Inserite, se necessario, informazioni aggiuntive (max. 500 caratteri)</label>
                <textarea id="notes" name="notes" placeholder="Testo facoltativo" style="height:200px" maxlength="500"></textarea>

                <input type="submit" name="invia" value="Invia">

            </form>
            
        </div>
        
        <div id="snackbar_succ">Dati inviati correttamente</div>
        <div id="snackbar_notsucc">Per cortesia, compilare tutti i campi necessari</div>
        
        <a href="php/login-admin.php">Admin login</a>
        
        <?php
            if (isset($_POST['invia'])){
                if ((!empty($_POST['email'])) && (!empty($_POST['name'])) && (!empty($_POST['chosendate']))) {
                    $con = mysqli_connect("localhost", "root", ""); 
                    if (!$con) {
                        die("Connection error: " . mysqli_error($con));
                    }
                    mysqli_select_db($con,"contactdb") or die(mysqli_error());
  
                    $sql = "INSERT INTO reservations (email,name,activity,chosendate,notes) 
                    VALUES ('" . $_POST["email"] . "','" . $_POST["name"] . "','" . $_POST["activity"] . "','" . $_POST["chosendate"] . "','" . $_POST["notes"] . "')";
                    $result = mysqli_query($con,$sql);

                    echo "<script>success();</script>";
                } else {
                    echo "<script>notsuccess();</script>"; 
                }
            }
        ?>
    </body>
</html>