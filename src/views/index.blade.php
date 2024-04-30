<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket Example</title>
</head>
<body>
    <div id="app">
        <h1>WebSocket Example</h1>
        <div id="messages"></div>
        <input type="text" id="message" placeholder="Type your message">
        <button onclick="sendMessage()">Send</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.11.0/echo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
    
    <script>
        try {
            window.Echo = new Echo({
            broadcaster: 'socket.io',
            host: (window.location.hostname || 'localhost') + ':3000',
        });

        const messageDiv = document.getElementById('messages');

        window.echo.channel('chatChannel').listen('.NewMessage', (data) => {
            messageDiv.innerHTML += `<p>${data.message}</p>`;
        });

        function sendMessage() {
            const message = document.getElementById('message').value;
            axios.post('/send-message', { message })
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        }
        } catch (error) {
        console.error('An error occurred:', error);
        }
    </script>
    
</body>
</html>
