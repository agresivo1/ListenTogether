// sw.js
let usernameInput, usersPanel, playlistPanel, fileInput, videoPanel;

function submitUsername() {
  const username = usernameInput.value.trim();
  if (username !== "") {
    fetch("server.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `username=${encodeURIComponent(username)}`,
    })
      .then((response) => response.json())
      .then((data) => {
        const { currentUser, users, playlist } = data;
        usersPanel.textContent = `Online:`;
        usersPanel.innerHTML += `<ul>${users
          .map((user) => `<li>${user}</li>`)
          .join("")}</ul>`;
        updatePlaylist(playlist);
      })
      .catch((error) =>
        console.error("Błąd podczas przesyłania nazwy użytkownika:", error)
      );
  }
}

function addToPlaylist() {
  const files = fileInput.files;

  if (files.length > 0) {
    const formData = new FormData();
    formData.append("file", files[0]);

    fetch("server.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        updatePlaylist(data.playlist);
        playVideo(data.playlist[data.playlist.length - 1]);
        fileInput.value = "";
      })
      .catch((error) =>
        console.error("Błąd podczas dodawania do playlisty:", error)
      );
  }
}

function playVideo(videoUrl) {
  videoPanel.innerHTML = `<video controls width="920px" style="max-width:100%;" autoplay><source src="${videoUrl}" type="audio/mp3"></video>`;
}

function showAddToPlaylistForm() {
  const addToPlaylistForm = document.getElementById("add-to-playlist-form");
  addToPlaylistForm.style.display = "block";
}

function updatePlaylist(playlist) {
  const playlistElement = document.getElementById("playlist");
  playlistElement.innerHTML = "";

  if (playlist && playlist.length > 0) {
    playlist.forEach((item) => {
      playlistElement.innerHTML += `<li>${item}</li>`;
    });
  } else {
    playlistElement.innerHTML = "<li>Brak piosenek w playliście.</li>";
  }
}

function updateUsersPanel() {
  fetch("server.php")
    .then((response) => {
      if (!response.ok) {
        throw new Error(
          `Network response was not ok, status: ${response.status}`
        );
      }
      return response.text();
    })
    .then((data) => {
      console.log("Data received from server:", data);
      try {
        const { currentUser, users, playlist } = JSON.parse(data);
        usersPanel.textContent = `Online:`;
        usersPanel.innerHTML += `<ul>${users
          .map((user) => `<li>${user}</li>`)
          .join("")}</ul>`;
        updatePlaylist(playlist);
      } catch (error) {
        console.error("Błąd podczas parsowania danych JSON:", error);
      }
    })
    .catch((error) =>
      console.error("Błąd podczas pobierania użytkowników:", error)
    );
}

function resetSessionAndPlaylist() {
  fetch("server.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "reset=true",
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      updateUsersPanel();
    })
    .catch((error) =>
      console.error("Błąd podczas resetowania sesji i playlisty:", error)
    );
}

document.addEventListener("DOMContentLoaded", function () {
  usernameInput = document.getElementById("username");
  usersPanel = document.getElementById("users-panel");
  playlistPanel = document.getElementById("playlist-panel");
  fileInput = document.getElementById("fileInput");
  videoPanel = document.getElementById("video-panel");

  window.submitUsername = submitUsername;
  window.addToPlaylist = addToPlaylist;
  window.showAddToPlaylistForm = showAddToPlaylistForm;

  setInterval(updateUsersPanel, 5000);
});
window.addEventListener("beforeunload", function (event) {
  resetSessionAndPlaylist();
});

window.addEventListener("unload", function (event) {
  resetSessionAndPlaylist();
});

function playVideoo(videoUrl) {
  videoPanel.innerHTML = `<video controls width="920px" style="max-width:100%;" autoplay><source src="${videoUrl}" type="video/mp4"></video>`;
}

function playSongs(videoUrl) {
  videoPanel.innerHTML = `<video controls width="920px" style="max-width:100%;" autoplay><source src="${videoUrl}" type="video/mp4"></video>`;
}
