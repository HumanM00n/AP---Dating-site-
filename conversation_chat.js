// Récupération des éléments du DOM
const messagesContainer = document.getElementById('messages');
const messageInput = document.getElementById('message-input');
const sendButton = document.getElementById('send-button');

// Gestion de l'envoi du message
function sendMessage() {
  const message = messageInput.value.trim();

  if (message !== '') {
    appendMessage('Moi', message); // Ajoute le message à la conversation
    messageInput.value = ''; // Efface le contenu de l'input
  }
}

sendButton.addEventListener('click', sendMessage);

messageInput.addEventListener('keydown', (event) => {
  if (event.key === 'Enter') {
    sendMessage();
    event.preventDefault(); // Empêche le comportement par défaut du "retour à la ligne" dans un champ de saisie
  }
});

// ...

// Fonction pour ajouter un message à la conversation
function appendMessage(sender, text) {
  const messageElement = document.createElement('div');
  messageElement.classList.add('bubble');

  if (sender === 'other') {
    messageElement.classList.add('received');
  } else {
    messageElement.classList.add('sent');
  }

  messageElement.textContent = text;

  messagesContainer.appendChild(messageElement);
  messagesContainer.scrollTop = messagesContainer.scrollHeight; // Fait défiler automatiquement vers le bas
}