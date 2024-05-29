<?php
$servername = "localhost";
$username = "banco";
$password = "mypassword";
$database = "banco";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT id, sensor, location, value1, value2, value3, reading_time FROM SensorData ORDER BY reading_time DESC";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = array();
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        echo "Não foi encontrado nenhum dado";
    }
    
    $conn->close();
?>