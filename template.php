<!-- template.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja Strona</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
       
    </header>

    <!-- <nav>
        Możesz dodać nawigację, linki do innych podstron, itp. 
        <a href="czat">Przejdź do czatu</a>
        <a href="index">Przejdź na stronę główną</a>
    </nav> -->

    <main>
        <!-- Tutaj będzie miejsce na treść podstrony -->
        <?php include 'content.php'; ?>
    </main>


    <script src="sw.js"></script>
    <!-- <button id="clear-session-btn">zresetuj sesję</button> -->


<!-- <script>
  // Dodaj obsługę zdarzenia dla przycisku
  document.getElementById("clear-session-btn").addEventListener("click", function () {
    // Wywołaj funkcję do czyszczenia sesji
    clearSession();
  });

  // Funkcja do czyszczenia sesji
  function clearSession() {
    fetch("clear-session.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        // Obsługa odpowiedzi od serwera
        console.log("zresetowano sesje");
      })
      .catch((error) =>
        console.error("Błąd podczas czyszczenia sesji:", error)
      );
  }
</script> -->
    <!-- <footer>
        &copy; 2023 Moja Strona
    </footer> -->
</body>
</html>
