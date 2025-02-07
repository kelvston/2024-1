# from flask import Flask, request, jsonify
# import spacy
#
# app = Flask(__name__)
#
# # Load the spaCy model
# nlp = spacy.load("en_core_web_md")
#
# @app.route('/chat', methods=['POST'])
# def chat():
#     # Get message from Laravel
#     user_input = request.json.get('message')
#
#     # Process the input with spaCy
#     doc = nlp(user_input)
#
#     # Generate a response
#     response = generate_response(doc)
#
#     return jsonify({'response': response})
#
# def generate_response(doc):
#     legal_terms = ["contract", "lawsuit", "patent", "dispute", "divorce", "property"]
#
#     for ent in doc.ents:
#         if any(term in ent.text.lower() for term in legal_terms):
#             return f"You mentioned a legal matter: {ent.text}. Here’s some advice: [Legal advice]."
#         elif ent.label_ == "DATE":
#             return f"You mentioned a date: {ent.text}. I can help with date-related queries."
#         elif ent.label_ == "PERSON":
#             return f"You mentioned a person: {ent.text}."
#
#     return "I'm not sure how to respond to that. Could you rephrase?"
#
# if __name__ == "__main__":
#     app.run(debug=True, port=5001)  # Start the app on port 5001
#
#

from flask import Flask, request, jsonify
import spacy

app = Flask(__name__)

# Load the pre-trained SpaCy model
nlp = spacy.load("en_core_web_md")

@app.route('/chat', methods=['POST'])
def chat():
    # Get message from Laravel (the JSON payload from the request)
    user_input = request.json.get('message')

    # Print the incoming user input for debugging
    print("User Input:", user_input)

    # Process the input with SpaCy (this extracts named entities like DATE, PERSON, etc.)
    doc = nlp(user_input)

    # Print the SpaCy object to see what entities were extracted
    print("SpaCy Doc:", doc)

    # Generate a response based on the analysis of the input
    response = generate_response(doc)

    # Print the generated response for debugging
    print("Generated Response:", response)

    # Send back a response as JSON
    return jsonify({'response': response})

def generate_response(doc):
    # List of legal terms we are interested in
    legal_terms = ["contract", "lawsuit", "patent", "dispute", "divorce", "property"]

    # Check if any of the legal terms are mentioned in the doc text
    for term in legal_terms:
        if term in doc.text.lower():
            return f"You mentioned a legal matter: {term}. Here’s some advice: [Legal advice]."

    # Check for SpaCy entities (DATE, PERSON, etc.)
    for ent in doc.ents:
        if ent.label_ == "DATE":
            return f"You mentioned a date: {ent.text}. I can help with date-related queries."
        elif ent.label_ == "PERSON":
            return f"You mentioned a person: {ent.text}."

    # Default response if no recognized legal terms or entities are found
    return "I'm not sure how to respond to that. Could you rephrase?"

if __name__ == "__main__":
    app.run(debug=True, port=5001)  # Start the app on port 5001

