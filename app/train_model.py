import spacy
from spacy.training.example import Example
import random

# Define the training data (add more examples as needed)
TRAIN_DATA = [
    ("What is a contract?", {"entities": [(7, 14, "LEGAL_TERM")]}),
    ("When was the lawsuit filed?", {"entities": [(14, 21, "LEGAL_TERM")]}),
]

def train_legal_model():
    # Load SpaCy's pre-trained English model
    nlp = spacy.load("en_core_web_md")

    # Add a new entity type for "LEGAL_TERM" if not already present
    if "LEGAL_TERM" not in nlp.pipe_names:
        ner = nlp.create_pipe("ner")
        nlp.add_pipe("ner", last=True)

    ner = nlp.get_pipe("ner")

    # Add labels to the model
    for _, annotations in TRAIN_DATA:
        for ent in annotations.get("entities"):
            ner.add_label(ent[2])

    # Begin training
    optimizer = nlp.begin_training()

    for itn in range(20):  # Train for 20 iterations
        random.shuffle(TRAIN_DATA)
        for text, annotations in TRAIN_DATA:
            doc = nlp.make_doc(text)
            example = Example.from_dict(doc, annotations)
            nlp.update([example], drop=0.5)

    # Save the trained model to disk
    nlp.to_disk("app/legal_model")

