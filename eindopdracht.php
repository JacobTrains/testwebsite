<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedbackboek</title>
    <?php include("connection.php"); ?>
    <?php $query = "SELECT * FROM feedbackboek";

    if(!$resultaat = mysqli_query($connectie, $query)){
        $boodschap .= " query \"$query\" is mislukt!";
    }else{
        $boodschap .= " query is ook gelukt!";
    }
    ?>
</head>
<body>
    <?php echo $boodschap."<br>\n"; ?><br>
    <?php 
        echo "<TABLE BORDER='1'>";
        echo "<TR> <TH>Voornaam</TH> <TH>Achternaam</TH> <TH>Geboortedatum</TH> <TH>Schrijfdatum</TH> <TH>Feedback</TH> </TR>";
        while ($rij = mysqli_fetch_assoc($resultaat) ){ 
            echo "<TR> <TD>".$rij["Voornaam"]."</TD> <TD>".$rij["Achternaam"]."</TD> <TD>".$rij["Geboortedatum"]."</TD> <TD>".$rij["Datum"]."</TD> <TD>".$rij["Feedback"]."</TD> </TR>";
        }
        ?>
        <?php echo "<h3>Mocht je iets willen toevoegen, laat gerust hier feedback achter! </h3>\n"; ?>
        <form method="post" action="toevoegen.php">
        <p>Voornaam: <input type="text" size="20" name="Voornaam" ></p>
        <p>Achternaam: <input type="text" size="20" name="Achternaam" ></p>
        <p>Geboortedatum: <input type="date" name="Geboortedatum" ></p>
        <p>Feedback: <input type="text" size="200" name="Feedback" ></p>
        <p><input type="submit" value="Verzenden" ></p>
        </form> <br>
        <?php echo "<h3>Al gegeven feedback:</h3>"; ?>
        <?php
        mysqli_close($connectie);
        ?>
</body>
</html>