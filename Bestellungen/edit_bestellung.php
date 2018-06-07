<?PHP
$tisch = $_GET['Tisch'];
for ($i = 1; $i <= 1000; $i++) {
if(isset($_GET[$i])) {			
			$conn = new mysqli("192.168.92.230", "root", "root", "Janiak");

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$stmt = $conn->prepare("update tbbestellung set Anzahl = ? where pkbestellung = ?;");
			$stmt->bind_param("ii", $anzahl, $pkbestellung);

			$tisch = $_GET['Tisch'];
			$pkbestellung = $i;			
			$anzahl = $_GET[$i];
			if($anzahl < 1) {
				$stmt = $conn->prepare("delete from tbbestellung where pkbestellung =?;");
				$stmt->bind_param("i", $pkbestellung);}
			$stmt->execute();
			$stmt->close();
			$conn->close();
		}
}
if(isset($_GET['Bezahlt'])) {
	$conn = new mysqli("192.168.92.230", "root", "root", "Janiak");
	if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
	$stmt = $conn->prepare("update tbbestellung set Bezahlt = 1 where Tisch = ? and Bezahlt = 0;");
	$stmt->bind_param("i", $tisch);
	$stmt->execute();
	$stmt->close();
	$conn->close();}
header('Location: index.php');

?>