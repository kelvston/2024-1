@extends('layouts.app')

@section('content')
    <body>
    <!-- Video Background -->
    <video id="legalVideo" src="{{ asset('assets/video/legal.mp4') }}" muted loop autoplay></video>

    <!-- Overlay to enhance text readability -->
    <div class="overlay"></div>

    <!-- Welcome Text -->
    <div class="text">
        <h2>Welcome to Legal Aid</h2>
        <p>
            At Legal Aid, we are committed to providing comprehensive legal services tailored to your needs. Whether you're seeking guidance, representation, or simply information, our team of experienced professionals is here to assist you every step of the way. We believe that justice should be accessible to everyone, and we strive to empower individuals by offering expert legal support.
        </p>
        <p>
            Explore our services, learn more about your legal rights, and trust that you're in good hands. We look forward to helping you navigate the complexities of the legal system with ease and confidence.
        </p>
    </div>
    <!-- Chatbox Button -->
    <button id="chat-button" class="chat-button">Chat</button>

    <!-- Chatbox Modal -->
    <div id="chatbox" class="chatbox">
        <div class="chatbox-header">
            <span>Chatbot</span>
            <button id="close-chatbox" class="close-chatbox">X</button>
        </div>

        <div id="chat-log" class="chat-log"></div>
        <div class="chat-input">
            <input type="text" id="user-message" placeholder="Type a message..."/>
            <button id="send-message" class="send-message">Send</button>
        </div>
    </div>

    <footer>
        <!-- Footer content here -->
    </footer>
    </body>

    <!-- CSS Styling -->
    <style>
        /* Chatbox Styles */
        .chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
        }

        .chatbox {
            display: none; /* Hidden by default */
            position: fixed;
            bottom: 70px;
            right: 20px;
            width: 300px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            z-index: 1000;
        }

        .chatbox-header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .close-chatbox {
            background: transparent;
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            float: right;
        }

        .chat-log {
            padding: 10px;
            height: 250px;
            overflow-y: scroll;
        }

        .chat-input {
            display: flex;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .chat-input input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .send-message {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .send-message:hover {
            background-color: #0fd58d;
        }

        .chat-log p {
            margin: 5px 0;
        }

        .chat-log .user-message {
            text-align: right;
            background-color: #e0f7fa;
            padding: 5px;
            border-radius: 4px;
            margin-bottom: 5px;
        }

        .chat-log .bot-message {
            text-align: left;
            background-color: #f1f1f1;
            padding: 5px;
            border-radius: 4px;
            margin-bottom: 5px;
        }

        /* Ensure full-page coverage */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden; /* Prevent scrolling */
        }

        /* Video Styling */
        video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the video covers the entire screen */
            z-index: -1; /* Places the video behind other content */
        }

        /* Overlay for better text readability */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay */
            z-index: 0;
        }

        /* Centered text content */
        .text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 1; /* Ensure text appears above the video */
            width: 80%;
            max-width: 800px;
        }

        .text h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .text p {
            font-size: 1.2rem;
            line-height: 1.5;
        }
    </style>

    <script>

        // Handle the chat button click to open/close the chatbox
        document.getElementById('chat-button').addEventListener('click', function () {
            const chatbox = document.getElementById('chatbox');
            chatbox.style.display = chatbox.style.display === 'none' ? 'block' : 'none';

            if (chatbox.style.display === 'block' && !document.getElementById('welcome-message')) {
                addMessageToChat('Hello! Welcome to Wakili Mtandao,What can I assist you today?', 'bot', true);
            }

        });

        // Close the chatbox
        document.getElementById('close-chatbox').addEventListener('click', function () {
            document.getElementById('chatbox').style.display = 'none';
        });

        // Send message on click
        document.getElementById('send-message').addEventListener('click', function () {
            const message = document.getElementById('user-message').value;
            if (message.trim() !== "") {
                addMessageToChat(message, 'user');
                sendMessageToChatbot(message);
                document.getElementById('user-message').value = '';
            }
        });

        // Send message to chatbot backend
        function sendMessageToChatbot(message) {
            fetch('/api/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message: message }),
            })
                .then(response => response.json())
                .then(data => {
                    addMessageToChat(data.response, 'bot');
                })
                .catch(error => {
                    console.error('Error:', error);
                    addMessageToChat('Sorry, something went wrong. Please try again.', 'bot');
                });
        }

        function addMessageToChat(message, sender, isWelcomeMessage = false) {
            const chatLog = document.getElementById('chat-log');
            const messageElement = document.createElement('p');
            messageElement.classList.add(sender === 'user' ? 'user-message' : 'bot-message');
            messageElement.textContent = message;

            // Add an id to the welcome message to prevent it from appearing again
            if (isWelcomeMessage) {
                messageElement.id = 'welcome-message';
            }

            chatLog.appendChild(messageElement);
            chatLog.scrollTop = chatLog.scrollHeight; // Scroll to the bottom
        }


        // Add message to chat log
        // function addMessageToChat(message, sender) {
        //     const chatLog = document.getElementById('chat-log');
        //     const messageElement = document.createElement('p');
        //     messageElement.classList.add(sender === 'user' ? 'user-message' : 'bot-message');
        //     messageElement.textContent = message;
        //     chatLog.appendChild(messageElement);
        //     chatLog.scrollTop = chatLog.scrollHeight; // Scroll to the bottom
        // }



        // Adjust video playback speed
        const video = document.getElementById('legalVideo');
        video.playbackRate = 1.25; // Adjust video speed

        // Lazy loading dropdown menu
        document.addEventListener('DOMContentLoaded', function() {
            function toggleDropdown(dropdown, action) {
                if (action === 'show') {
                    dropdown.classList.add('show');
                } else {
                    dropdown.classList.remove('show');
                }
            }

            function handleDropdownMouseEvents(link, dropdown) {
                let timer; // Timer to manage hide delay

                link.addEventListener('mouseenter', function() {
                    clearTimeout(timer);
                    toggleDropdown(dropdown, 'show');
                });

                link.addEventListener('mouseleave', function() {
                    timer = setTimeout(function() {
                        if (!dropdown.matches(':hover')) {
                            toggleDropdown(dropdown, 'hide');
                        }
                    }, 300);
                });

                dropdown.addEventListener('mouseenter', function() {
                    clearTimeout(timer);
                    toggleDropdown(dropdown, 'show');
                });

                dropdown.addEventListener('mouseleave', function() {
                    timer = setTimeout(function() {
                        toggleDropdown(dropdown, 'hide');
                    }, 300);
                });
            }

            // Initialize lazy loading for all dropdowns
            const dropdownLinks = document.querySelectorAll('.dropdown-toggle');
            dropdownLinks.forEach(function(link) {
                const dropdown = link.nextElementSibling;
                if (dropdown) {
                    handleDropdownMouseEvents(link, dropdown);
                }
            });
        });
    </script>

@endsection
