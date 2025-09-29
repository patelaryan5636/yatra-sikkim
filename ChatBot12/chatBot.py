import sys  

if len(sys.argv) > 1:
    user_input = sys.argv[1]  
    responses = {
        "hi": "Hello there! How can I help you?",
        "hello": "Hi there! How can I help you?",
        "how are you": "I'm just a chatbot, but I'm doing great! How about you?",
        "bye": "Goodbye! Have a great day!",
    }  

    # Default AI-like response
    response = responses.get(user_input.lower(), f"AI Response: {user_input}")  
    print(response)  
else:
    print("Error: No input provided")