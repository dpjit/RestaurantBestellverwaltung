 <?PHP 
 for($tisch = 1;$tisch < 5;$tisch++){
echo "<center>Tisch ".$tisch." <input type='button' value ='Bearbeiten' onclick=\"window.location.href='edit_tisch.php?tisch=".$tisch."'\" name='".$tisch."'</input></center>";
 echo "<TABLE BORDER=1 WIDTH=800 align=center>";
// Überschrift ausgeben
echo "<TR>";
$Ueberschriften = array("Bezeichnung","Anzahl");
foreach( $Ueberschriften as $ue )
{	
	echo "<TH>".$ue."</TH>";
}	

$conn = new mysqli("", "", "", "");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM tbbestellung,tbspeisekarte where pkSpeisekarte = fkSpeisekarte and Bezahlt = 0 and Tisch =".$tisch;
$result = $conn->query($sql);

echo "</TR>";
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "\n<tr><td>" . $row["Bezeichnung"]. "</td><td>" . $row["Anzahl"]. "</td>";
    }
} else {
    echo "<tr><td></td><td></td>";
}
echo "</tr></TABLE><br>";
 $conn->close();}
?>
