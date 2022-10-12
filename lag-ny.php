
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>PHP Innlogging</title>
</head>
<body>
    <p>Opprett ny kontakt:</p>
    <form method="post">
        <label for="fornavn">Fornavn:</label>
        <input type="text" name="fornavn" /><br />

        <label for="etternavn">Etternavn:</label>
        <input type="text" name="etternavn" /><br />

        <label for="telefonnummer">Telefonnummer:</label>
        <input type="text" name="telefonnummer" /><br />
        
        <button type="submit" name="submit">Opprett</button>
    </form>    
</body>
<?php
    if(isset($_POST['submit'])){
        //Gjøre om POST-data til variabler
        $fornavn = $_POST['fornavn'];
        $etternavn = $_POST['etternavn'];
        $telefonnummer = $_POST['telefonnummer'];
        
        //Koble til databasen
        $dbc = mysqli_connect('localhost', 'root', '', 'telefondb')
          or die('Error connecting to MySQL server.');
        
        //Gjøre klar SQL-strengen
        $query = "INSERT INTO telefonkatalog (fornavn, etternavn, telefonnummer) VALUES ('$fornavn','$etternavn','$telefonnummer')";
        
        //Utføre spørringen
        $result = mysqli_query($dbc, $query)
          or die('Error querying database.');
        
        //Koble fra databasen
        mysqli_close($dbc);

        //Sjekke om spørringen gir resultater
        if($result){
            //Gyldig login
            echo "Takk for at du lagde en ny kontakt! Trykk <a href='index.php'>her</a> for å gå tilbake";
        }else{
            //Ugyldig login
            echo "Noe gikk galt, prøv igjen!";
        }
    }
?>
</html>