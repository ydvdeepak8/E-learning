function sendMessage() {
    const userInput = document.getElementById('userInput').value;
    if (userInput.trim() !== '') {
        appendMessage('user', userInput);

        // Check for a specific user input
        if (userInput.toLowerCase() === 'hi' || userInput.toLowerCase() === 'helllo') {
            setTimeout(() => appendMessage('bot', 'Hi! How can I assist you?'), 500);}
           else if (userInput.toLowerCase() === 'hello' || userInput.toLowerCase() === 'hello') {
                // Reply with a greeting
                setTimeout(() => appendMessage('bot', 'hii chatty'), 500);}
               
                
        else {
            // Simulate a general response for other inputs
            setTimeout(() => appendMessage('bot', 'I can not understand'), 500);
        }

        document.getElementById('userInput').value = '';
    }
}

function appendMessage(sender, message) {
    const chatBox = document.getElementById('chatBox');
    const newMessage = document.createElement('div');
    newMessage.classList.add('chat-message', sender === 'bot' ? 'bot' : 'user');
    newMessage.textContent = message;
    chatBox.appendChild(newMessage);
    // Scroll to the bottom of the chat box to show the latest message.
    chatBox.scrollTop = chatBox.scrollHeight;
}
