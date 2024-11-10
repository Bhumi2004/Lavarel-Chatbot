<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregnancy Chatbot</title>

    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f8ff;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Chat container styling */
        #chat {
            background-color: #ffffff;
            width: 350px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Chat title styling */
        h1 {
            color: #f29393;
            font-size: 24px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        /* Messages container styling */
        #messages {
            background-color: #e7f3ff;
            padding: 10px;
            border-radius: 10px;
            max-height: 200px;
            overflow-y: auto;
            margin-bottom: 15px;
        }

        /* Input styling */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 10px;
            border: 1px solid #cbd6f0;
        }

        /* Button styling */
        button {
            background-color: #f7b5c3;
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #f29393;
        }

        /* Message text styling */
        p {
            margin: 5px 0;
        }

        /* Message bubbles styling */
        .user-message {
            text-align: right;
            color: #4169e1;
        }
        .bot-message {
            text-align: left;
            color: #f29393;
        }
    </style>
</head>
<body>
    <div id="chat">
        <h1>Pregnancy Chatbot</h1>
        <div id="messages"></div>
        <input type="text" id="userMessage" placeholder="Type your message here">
        <button onclick="sendMessage()">Send</button>
    </div>

    <script>
        async function sendMessage() {
            const message = document.getElementById('userMessage').value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // Append user message to chat
            document.getElementById('messages').innerHTML += `<p class="user-message">You: ${message}</p>`;
            
            const response = await fetch('/chatbot/message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ message }),
            });
            
            const data = await response.json();
            
            // Append bot reply to chat
            document.getElementById('messages').innerHTML += `<p class="bot-message">Bot: ${data.reply}</p>`;
            
            // Clear input
            document.getElementById('userMessage').value = '';
            document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight;
        }
    </script>
</body>
</html>
