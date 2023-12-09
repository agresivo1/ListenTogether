<!-- czat.php -->
<?php
$pageTitle = 'Czat';

// Przykładowa treść HTML w zmiennej $customContent
$customContent = '<div id="chat-container">
    <div id="chat-messages">
        <!-- Tutaj będą pojawiały się wiadomości czatu -->
    </div>
    <div id="user-input">
        <input type="text" id="message-input" placeholder="Wpisz wiadomość" oninput="updateCharCounter()">
        <span id="char-counter">0</span>
        <button onclick="sendMessage()">Wyślij</button>
    </div>
</div>


';

include 'template.php';
?>
<script src="sm.js"></script>
