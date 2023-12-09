<?php
session_start();

// Wyczyść sesję
session_destroy();
session_start();

// Zwróć poprawną odpowiedź JSON
echo json_encode(['message' => 'Sesja została zresetowana']);
?>
