<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
</head>
<body>
    <h1>Chatbot</h1>
    <div id="chat"></div>
    <input type="text" id="message" placeholder="Type your message...">
    <button id="send">Send</button>

    <script>
        document.getElementById('send').onclick = function() {
            var message = document.getElementById('message').value;
            // For now, just append it to the chat div
            var chatDiv = document.getElementById('chat');
            chatDiv.innerHTML += '<p>You: ' + message + '</p>';
            document.getElementById('message').value = ''; // Clear input
        };
    </script>
</body>
</html>
