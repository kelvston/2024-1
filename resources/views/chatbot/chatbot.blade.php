<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <link rel="stylesheet" href="{{ asset('css/chatbot.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="chat-container">
    <div id="chatbox" class="chatbox">
        <div class="chat-message bot">
            <p>Chatbot: Hi, how can I help you today?</p>
        </div>
    </div>

    <div class="user-input">
        <input type="text" id="user-message" placeholder="Type your message...">
        <button id="send-message">Send</button>
    </div>
</div>

<script>
    // Handle sending message to the chatbot API
    $('#send-message').click(function() {
        var message = $('#user-message').val();

        if (message.trim() !== "") {
            // Display the user's message in the chatbox
            $('#chatbox').append('<div class="chat-message user"><p>You: ' + message + '</p></div>');
            $('#user-message').val('');  // Clear the input field

            // Send the message to the Laravel route
            $.ajax({
                url: "{{ route('chatbot') }}",  // The Laravel route to handle the chatbot request
                type: "POST",
                data: {
                    message: message,
                    _token: "{{ csrf_token() }}",  // CSRF token for Laravel protection
                },
                success: function(response) {
                    // Display the chatbot's response in the chatbox
                    $('#chatbox').append('<div class="chat-message bot"><p>Chatbot: ' + response.response + '</p></div>');
                    $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);  // Scroll to the bottom
                },
                error: function(xhr, status, error) {
                    $('#chatbox').append('<div class="chat-message bot"><p>Chatbot: Sorry, there was an error.</p></div>');
                }
            });
        }
    });
</script>
</body>
</html>
