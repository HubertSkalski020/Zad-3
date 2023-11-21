<?php
$conn = new mysqli("127.0.0.1","admin","testy","baza");
//u siebie z serwra to właczałem ale w plikach jest baza danych
if ($conn->connect_error) {
    die("Coś nie pykło: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $conn->real_escape_string($_POST["login"]);
    $haslo = $conn->real_escape_string($_POST["password"]);


    $query = "SELECT * FROM users WHERE login='$login' AND password='$haslo'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Zalogowano";
    } 
    else 
    {
        echo "Błąd logowania";
    }

    
    $conn->close();
}
?>

