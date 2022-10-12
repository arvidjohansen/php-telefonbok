
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <title>PHP Innlogging</title>
    </head>
    <body>
        <h1>Søk</h1>
        <p>
            <form method="get">
                <label for="fornavn">Fornavn:</label>
                <input type="text" name="fornavn" /><br />
                
                <button type="submit"  >Søk</button>
            </form>
        </p>
        <p>Fant følgende oppføringer i telefonkatalogen:</p>
        <table>
            <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Fornavn
                    </th>
                    <th>
                        Etternavn
                    </th>
                    <th>
                        Telefonnr
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_GET['fornavn'])){
                        $fornavn = $_GET['fornavn'];

                        //Koble til databasen
                        $dbc = mysqli_connect('localhost', 'root', '', 'telefondb')
                            or die('Error connecting to MySQL server.');
                        
                        //Gjøre klar SQL-strengen
                        $query = "SELECT id,fornavn,etternavn,telefonnummer from telefonkatalog where fornavn='$fornavn'";
                        
                        //Utføre spørringen
                        $result = mysqli_query($dbc, $query)
                            or die('Error querying database.');
                        
                        //Koble fra databasen
                        mysqli_close($dbc);

                        //Skriv ut en rad per oppføring
                        foreach($result as $row){
                            echo "<tr>";

                            echo "<td>";
                            echo $row['id'];
                            echo "</td>";

                            echo "<td>";    
                            echo $row['fornavn'];
                            echo "</td>";
                            
                            echo "<td>";
                            echo $row['etternavn'];
                            echo "</td>";
                            
                            echo "<td>";
                            echo $row['telefonnummer'];
                            echo "</td>";

                            echo "</tr>";
                        }
                    }

                ?>
            </tbody>
        </table>
        <p>Trykk <a href='index.php'>her</a> for å gå tilbake</p>
    </body>
</html>