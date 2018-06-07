<?PHP
echo "<TABLE BORDER=1 WIDTH=800 align=center>";
// Überschrift ausgeben
echo "<form action='bestellen.php' method='get'><TR>";
$Ueberschriften = array("Bestellnummer", "Bezeichnung","Preis","Anzahl");
foreach( $Ueberschriften as $ue )
{	
	echo "<TH>".$ue."</TH>";
}	

$conn = new mysqli("192.168.92.230", "root", "root", "Janiak");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM tbSpeisekarte";
$result = $conn->query($sql);

echo "</TR>";
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "\n<tr><td>" . $row["pkSpeisekarte"]. "</td><td>" . $row["Bezeichnung"]. "</td><td>" . $row["Preis"]. " €</td><td><input type='number' name='".$row["pkSpeisekarte"]."'></td>";
    }
} else {
    echo "0 results";
}
echo "</tr></TABLE>";
echo "<br><center><button name='hinzufuegen' type='submit'>Bestellen</button> für 
<select name='Tisch'><option value='0'>Tisch wählen</option> <option value='1'>Tisch 01</option> <option value='2'>Tisch 02</option> <option value='3'>Tisch 03</option> <option value='4'>Tisch 04</option></select></center></form>";
$conn->close();
?>