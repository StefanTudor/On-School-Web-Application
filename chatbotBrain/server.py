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

from http.server import BaseHTTPRequestHandler, HTTPServer
from urllib.parse import parse_qs
from searchWiki import responseWikipedia,clearInput


hostName = "localhost"
serverPort = 1973

os.environ['TF_CPP_MIN_LOG_LEVEL'] = '2'

base_app_dir = str(pathlib.Path(__file__).parent.absolute())

intents_file_path = base_app_dir + '/intents.json'
train_file_path = base_app_dir + '/train.labels'
words_file_path = base_app_dir + '/train.words'
training_file_path = base_app_dir + '/train.training'
output_file_path = base_app_dir + '/train.output'
model_file_path = base_app_dir + '/model.tflearn'

# incarca datele
with open(intents_file_path, encoding='utf-8') as file:
    data = json.load(file)

# incarca words & labels
with open (train_file_path, 'rb') as fp:
    labels = pickle.load(fp)
with open(words_file_path, 'rb') as fp:
    words = pickle.load(fp)

# incarca trainings & output
with open(training_file_path, 'rb') as fp:
    training = pickle.load(fp)
with open(output_file_path, 'rb') as fp:
    output = pickle.load(fp)


# incarca model
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
        #stergere cuvinte uzuale din intrebare
        inp = clearInput(inp)
        #cautarea raspunsului
        results = model.predict([bag_of_words(inp, words)])
        #cel mai semnificativ neuron
        max_neuron = numpy.max(results)
        results_index = numpy.argmax(results)
        if max_neuron < 0.5:
            #extragere raspuns de pe Wiki
             return responseWikipedia(inp)

        #incadrearea intrebarii intr-o categorie
        tag = labels[results_index]

        responses = []
        #extragerea unui raspuns random ce are tag-ul gasit
        for tg in data["intents"]:
            if tg['tag'] == tag:
                responses = tg['responses']

        return random.choice(responses)




class MyServer(BaseHTTPRequestHandler):

    def do_GET(self):

        self.send_response(200)
        self.send_header("Content-type", "text/plain; charset=utf-8")
        self.end_headers()
        self.wfile.write(bytes("ROBO SERVER", "utf-8"))


    def do_POST(self):

        content_length = int(self.headers['Content-Length'])
        body = self.rfile.read(content_length)
        params = parse_qs( body.decode('utf-8') )

        user_ask = params["ask"][0]

        if self.path == '/ask':

            raspuns = chat(user_ask)

            self.send_response(200)
            self.send_header("Content-type", "text/plain; charset=utf-8")
            self.end_headers()
            self.wfile.write(str.encode(raspuns))

        else:

            self.send_response(404)
            self.send_header("Content-type", "text/plain; charset=utf-8")
            self.end_headers()
            self.wfile.write(bytes("No command for robo", "utf-8"))


if __name__ == "__main__":
    webServer = HTTPServer((hostName, serverPort), MyServer)
    print("Robo server started http://%s:%s" % (hostName, serverPort))

    try:
        webServer.serve_forever()
    except KeyboardInterrupt:
        pass

    webServer.server_close()
    print("Server stopped.")