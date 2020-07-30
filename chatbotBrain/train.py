import nltk
from nltk.stem.lancaster import LancasterStemmer

import numpy
import tflearn
import tensorflow
import json
import pickle
import os

stemmer = LancasterStemmer()
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '2'

with open("intents.json") as file:
    data = json.load(file)


words = []
labels = []
docs_x = []
docs_y = []

for intent in data["intents"]:
    for pattern in intent["patterns"]:
        wrds = nltk.word_tokenize(pattern)
        words.extend(wrds)
        docs_x.append(wrds)
        docs_y.append(intent["tag"])

    if intent["tag"] not in labels:
        labels.append(intent["tag"])

words = [stemmer.stem(w.lower()) for w in words if w != "?"]
words = sorted(list(set(words)))

labels = sorted(labels)

training = []
output = []

out_empty = [0 for _ in range(len(labels))]

for x, doc in enumerate(docs_x):
    bag = []

    wrds = [stemmer.stem(w.lower()) for w in doc]

    for w in words:
        if w in wrds:
            bag.append(1)
        else:
            bag.append(0)

    output_row = out_empty[:]
    output_row[labels.index(docs_y[x])] = 1

    training.append(bag)
    output.append(output_row)

#date training
training = numpy.array(training)
#output training
output = numpy.array(output)

tensorflow.reset_default_graph()
#construirea retelei nuronale
net = tflearn.input_data(shape=[None, len(training[0])])
net = tflearn.fully_connected(net, 8)
net = tflearn.fully_connected(net, 8)
net = tflearn.fully_connected(net, len(output[0]), activation="softmax")
#creare model de regresie
net = tflearn.regression(net)
model = tflearn.DNN(net)


print("Training...")
#antrenarea datelor
model.fit(training, output, n_epoch=1000, batch_size=8, show_metric=False)
model.save("model.tflearn")
#salvarea in fisiere
with open('train.labels', 'wb') as fp:
    pickle.dump(labels, fp)
with open('train.words', 'wb') as fp:
    pickle.dump(words, fp)
with open('train.training', 'wb') as fp:
    pickle.dump(training, fp)
with open('train.output', 'wb') as fp:
    pickle.dump(output, fp)

print("done")