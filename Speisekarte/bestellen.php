<?php
if($_GET['Tisch'] > 0)
{
	for ($i = 1; $i <= 100; $i++) {
		if(isset($_GET[$i]) && $_GET[$i] > 0) {			
			$conn = new mysqli("192.168.92.230", "root", "root", "Janiak");

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$stmt = $conn->prepare("insert into tbbestellung (Tisch,fkSpeisekarte,Anzahl) values (?, ?, ?)");
			$stmt->bind_param("iii", $tisch, $speise, $anzahl);

			$tisch = $_GET['Tisch'];
			$speise = $i;			
			$anzahl = $_GET[$i];
			
			$stmt->execute();
			$stmt->close();
			$conn->close();
		}
	}	
} else echo "kein tisch";

header('Location: ../Bestellungen/index.php');
?>