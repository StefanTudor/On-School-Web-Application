from nltk.stem.lancaster import LancasterStemmer
stemmer = LancasterStemmer()

import nltk
import numpy
import tflearn.variables
import random
import json
import pickle
import pathlib
import sys

import os
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '2'

base_app_dir = str(pathlib.Path(__file__).parent.absolute())

intents_file_path = base_app_dir + '/intents.json'
train_file_path = base_app_dir + '/train.labels'
words_file_path = base_app_dir + '/train.words'
training_file_path = base_app_dir + '/train.training'
output_file_path = base_app_dir + '/train.output'
model_file_path = base_app_dir + '/model.tflearn'

# load data
with open(intents_file_path) as file:
    data = json.load(file)

# load words & labels
with open (train_file_path, 'rb') as fp:
    labels = pickle.load(fp)
with open(words_file_path, 'rb') as fp:
    words = pickle.load(fp)

# load trainings & output
with open(training_file_path, 'rb') as fp:
    training = pickle.load(fp)
with open(output_file_path, 'rb') as fp:
    output = pickle.load(fp)


# load models
net = tflearn.input_data(shape=[None, len(training[0])])
net = tflearn.fully_connected(net, 8)
net = tflearn.fully_connected(net, 8)
net = tflearn.fully_connected(net, len(output[0]), activation='softmax')
net = tflearn.regression(net)
model = tflearn.DNN(net)
model.load(model_file_path)


def bag_of_words(s, words):
    bag = [0 for _ in range(len(words))]

    s_words = nltk.word_tokenize(s)
    s_words = [stemmer.stem(word.lower()) for word in s_words]

    for se in s_words:
        for i, w in enumerate(words):
            if w == se:
                bag[i] = 1

    return numpy.array(bag)


def chat(inp):

    while True:
        results = model.predict([bag_of_words(inp, words)])
        max_neuron = numpy.max(results)
        results_index = numpy.argmax(results)
        if max_neuron < 0.5:
            return "Nu inteleg intrebarea. :("
        tag = labels[results_index]

        responses = []

        for tg in data["intents"]:
            if tg['tag'] == tag:
                responses = tg['responses']

        return random.choice(responses)


user_ask = sys.argv[1:][0]

print( chat(user_ask) )