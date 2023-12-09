function updateCharCounter() {
  var messageInput = document.getElementById("message-input");
  var charCounter = document.getElementById("char-counter");

  var messageLength = messageInput.value.length;
  charCounter.textContent = messageLength;
  minLenw = 69;
  maxLenw = 201;
  if (messageLength <= minLenw) {
    charCounter.className = "too-short";
  } else if (messageLength >= maxLenw) {
    charCounter.className = "too-long";
  } else if (messageLength >= 70 && messageLength <= 200) {
    charCounter.className = "good";
  } else if (messageLength === 0) {
    charCounter.className = "zero";
  } else {
    charCounter.className = "";
  }
}

function sendMessage() {
  var message = document.getElementById("message-input").value;
  var chatMessages = document.getElementById("chat-messages");

  // Sprawdź, czy wiadomość nie jest pusta
  if (message.trim() === "") {
    alert("Wiadomość nie może być pusta.");
    return;
  }
  minLen = 69;
  maxLen = 201;

  if (message.length <= minLen || message.length >= maxLen) {
    // Utwórz element powiadomienia
    var notificationRED = document.createElement("div");
    notificationRED.className = "notificationRED";
    notificationRED.textContent =
      "Wiadomość musi mieścić się w zakresie 70-200 znaków!";

    // Dodaj element powiadomienia do ciała strony
    document.body.appendChild(notificationRED);

    // Automatyczne usuwanie elementu powiadomienia po kilku sekundach
    setTimeout(function () {
      document.body.removeChild(notificationRED);
    }, 3000);
    return;
  }

  // Użyj AJAX do asynchronicznego wysłania wiadomości
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
      if (xhr.status == 200) {
        // Zaktualizuj zawartość czatu po wysłaniu wiadomości
        chatMessages.innerHTML +=
          "<p><strong>Użytkownik:</strong> " + message + "</p>";
        document.getElementById("message-input").value = ""; // Wyczyść pole wprowadzania wiadomości

        // Utwórz element powiadomienia
        var notification = document.createElement("div");
        notification.className = "notification";
        notification.textContent = "Wiadomość została wysłana!";

        // Dodaj element powiadomienia do ciała strony
        document.body.appendChild(notification);

        // Automatyczne usuwanie elementu powiadomienia po kilku sekundach
        setTimeout(function () {
          document.body.removeChild(notification);
        }, 3000);
      } else {
        // Obsłuż ewentualne błędy
        console.error("Wystąpił błąd podczas wysyłania wiadomości.");
      }
    }
  };

  xhr.open("POST", "sendMessage.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Użyj json_encode do poprawnej obsługi znaków specjalnych
  xhr.send("message=" + encodeURIComponent(message));
}

// Nasłuchuj zdarzenie klawisza w polu tekstowym
document
  .getElementById("message-input")
  .addEventListener("keydown", function (event) {
    // Sprawdź, czy naciśnięto klawisz Enter
    if (event.key === "Enter") {
      // Zapobiegnij domyślnej akcji (przesłaniu formularza)
      event.preventDefault();

      // Wywołaj funkcję sendMessage
      sendMessage();
    }
  });
