  <?PHP
  include ("../index.html"); 
 $tisch = $_GET['tisch'];
echo "<form action='edit_bestellung.php' method='get'><center>Tisch ".$tisch."<input type='hidden' name='Tisch' value='".$tisch."'></center>";
 echo "<TABLE BORDER=1 WIDTH=800 align=center>";
// Überschrift ausgeben
echo "<TR>";
$Ueberschriften = array("Bezeichnung","Anzahl");
foreach( $Ueberschriften as $ue )
{	
	echo "<TH>".$ue."</TH>";
}	

$conn = new mysqli("192.168.92.230", "root", "root", "Janiak");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM tbbestellung,tbspeisekarte where pkSpeisekarte = fkSpeisekarte and Bezahlt = 0 and Tisch =".$tisch;
$result = $conn->query($sql);

echo "</TR>";
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "\n<tr><td>" . $row["Bezeichnung"]. "</td><td><input type='number' name='".$row["pkBestellung"]."' value='" . $row["Anzahl"]. "'></td>";		
    }
} else {
    echo "keine Bestellung";
}
echo "</tr></TABLE><br><center><input type='submit' value='Ändern'> <input type='button' value='Tisch hat bezahlt' onclick=\"window.location.href='edit_bestellung.php?Tisch=".$tisch."&Bezahlt=".$tisch."'\"></center></form>";
 $conn->close();
?>