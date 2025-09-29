<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <style>
        /* Theme Colors */
        :root {
            --primary-bg: #C4DFDF;
            --chat-box: #E3F4F4;
            --input-bg: #F8F6F4;
            --border-color: #F8F6F4;
            --sent-msg: #6ad4df;
            /* Sent message background */
            --received-msg: #76e2ed;
            /* Received message background */
        }

        /* Prevent Page Scrolling */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            /* Prevents scrolling */
            font-family: Arial, sans-serif;
            /* background-color: var(--primary-bg); */
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('registerbg.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* Chat Container */
        .chat-container {
            width: 60vw;
            /* /Matches screen width/ */
            height: 80vh;
            /* /Matches screen height/ */
            background: var(--chat-box);
            display: flex;
            flex-direction: column;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
            /* Shadow Effect */
        }

        .chat-container img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            font-size: small;
            font-weight: normal;
        }


        /* Chat Header */
        .chat-header {
            background: var(--primary-bg);
            padding: 15px;
            text-align: center;
            font-weight: bold;
            /* font-size: 20px; */
            border-bottom: 2px solid var(--border-color);
            flex-shrink: 0;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            /* Header Shadow */
            display: flex;
            gap: 20px;
            align-items: center;
        }

        /* Chat Box */
        #chat {
            flex: 1;
            /* Takes up remaining space */
            overflow-y: auto;
            padding: 15px;
            display: flex;
            flex-direction: column;
        }

        /* Message Bubbles */
        .message {
            max-width: 75%;
            padding: 12px;
            margin: 8px;
            word-wrap: break-word;
            font-size: 16px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            /* Message Shadow */
        }

        /* Sent Messages (Right Side) */
        .sent {
            align-self: flex-end;
            background: var(--sent-msg);
            text-align: right;
            border-radius: 15px 15px 0px 15px;
        }

        /* Received Messages (Left Side) */
        .received {
            align-self: flex-start;
            background: var(--received-msg);
            text-align: left;
            border-radius: 15px 15px 15px 0px;
        }

        /* Chat Footer */
        .chat-footer {
            display: flex;
            padding: 10px;
            background: var(--chat-box);
            gap: 5px;
            flex-shrink: 0;
            box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.2);
            /* Footer Shadow */
        }

        /* Message Input */
        #message {
            flex: 1;
            padding: 12px;
            border: 1px solid #3b3b3f;
            border-radius: 10px;
            background: var(--input-bg);
            outline: none;
            font-size: 16px;

        }

        /* Send Button */
        #send {
            padding: 12px 20px;
            border: none;
            background: var(--primary-bg);
            cursor: pointer;
            border-radius: 10px;
            font-weight: bold;
            font-size: 16px;
            border: 1px solid #3b3b3f;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            /* Button Shadow */
        }

        #send:hover {
            background: var(--input-bg);
        }

        /* Responsive Design */
        @media screen and (min-width: 2560px) {
            .chat-container {
                height: 80vh;
                width: 90vw;
            }

            .chat-header {
                font-size: 30px;
                padding: 12px;
            }

            .message {
                font-size: 33px;
            }

            #message,
            #send {
                font-size: 35px;
            }

            .chat-header img {
                height: 85px;
                width: 85px;
            }
        }

        @media screen and (min-width: 1440px) {
            .chat-container {
                height: 80vh;
                width: 90vw;
            }

            .chat-header {
                font-size: 25px;
                padding: 12px;
            }

            .message {
                font-size: 22px;
            }

            #message,
            #send {
                font-size: 20px;
            }

            .chat-header img {
                height: 75px;
                width: 75px;
            }
        }

        @media screen and (max-width: 1200px) {
            .chat-container {
                height: 80vh;
                width: 90vw;
            }

            .chat-header {
                font-size: 20px;
                padding: 12px;
            }

            .message {
                font-size: 15px;
            }

            #message,
            #send {
                font-size: 15px;
            }

            .chat-header img {
                height: 60px;
                width: 60px;
            }
        }

        @media screen and (max-width: 992px) {
            .chat-container {
                height: 80vh;
                width: 90vw;
            }

            .chat-header {
                font-size: 16px;
            }

            .message {
                font-size: 14px;
            }

            #message,
            #send {
                font-size: 14px;
            }

            .chat-header img {
                height: 55px;
                width: 55px;
            }
        }

        @media screen and (max-width: 768px) {
            .chat-container {
                height: 75vh;
                width: 90vw;
            }

            .chat-header {
                font-size: 14px;
                padding: 10px;
            }

            .message {
                font-size: 13px;
                max-width: 80%;
            }

            #message,
            #send {
                font-size: 13px;
                padding: 8px;
            }

            .chat-header img {
                height: 50px;
                width: 50px;
            }
        }

        @media screen and (max-width: 576px) {
            .chat-container {
                height: 70vh;
                width: 90vw;
            }

            .chat-header {
                font-size: 12px;
                padding: 8px;
            }

            .message {
                font-size: 10px;
                max-width: 85%;
            }

            #message,
            #send {
                font-size: 11px;
                padding: 7px;
            }

            .chat-header img {
                height: 30px;
                width: 30px;
            }
        }

        @media screen and (max-width: 400px) {
            .chat-container {
                height: 60vh;
                width: 90vw;
            }

            .chat-header {
                font-size: 10px;
                padding: 6px;
            }

            .message {
                font-size: 11px;
                max-width: 90%;
            }

            #message,
            #send {
                font-size: 11px;
                padding: 5px;
            }

            .chat-header img {
                height: 30px;
                width: 30px;
            }
        }
    </style>
</head>

<body>

    <div class="chat-container">
        <div class="chat-header">
            <h3>Support 😎</h3>
        </div>
        <div id="chat"></div>
        <div class="chat-footer">
            <input type="text" id="message" placeholder="Type a message...">
            <button id="send">Send</button>
        </div>
    </div>

    <script>
        document.getElementById("message").addEventListener("keypress", function(event) {
            if (event.key === "Enter") {  // Check if Enter key is pressed
                event.preventDefault();   // Prevent default form submission (optional)
                document.getElementById("send").click(); // Simulate button click
            }
        });
        document.getElementById("send").onclick = function() {
            let message = document.getElementById("message").value.trim();
            if (message) {
                let chat = document.getElementById("chat");

                // Append sent message
                let sentMessage = document.createElement("div");
                sentMessage.classList.add("message", "sent");
                sentMessage.textContent = message;
                chat.appendChild(sentMessage);

                // Send message to PHP and get response
                fetch("get_output.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: "message=" + encodeURIComponent(message)
                })
                .then(response => response.text())
                .then(data => {
                    let receivedMessage = document.createElement("div");
                    receivedMessage.classList.add("message", "received");
                    receivedMessage.textContent = data;
                    chat.appendChild(receivedMessage);
                    chat.scrollTop = chat.scrollHeight;
                })
                .catch(error => console.error("Error:", error));

                document.getElementById("message").value = "";
            }
        };
    </script>

</body>

</html>