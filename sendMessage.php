<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobierz treść wiadomości z przesłanych danych
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Sprawdź długość wiadomości
    $minLength = 10;
    $maxLength = 200;

    if (strlen($message) < $minLength || strlen($message) > $maxLength) {
        $response = ['status' => 'error', 'message' => 'Wiadomość musi mieć od 10 do 200 znaków.'];
    } else {
        // Tutaj możesz dodać kod do dodatkowej obsługi wiadomości (np. zapis do bazy danych)

        // Przykładowa odpowiedź w formie JSON
        $response = ['status' => 'OK', 'message' => $message];

        // Zwróć odpowiedź w formie JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    // W przypadku, gdy żądanie nie jest typu POST, zwróć błąd
    header('HTTP/1.1 405 Method Not Allowed');
    echo 'Method Not Allowed';
}
?>
