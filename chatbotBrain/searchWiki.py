import wikipedia
import re
import string

wikipedia.set_lang("ro")

alphabets = "([A-Za-z])"
prefixes = "(D-lui|D-ei|D-lor|Dr)[.]"
suffixes = "(Inc|Ltd|Jr|Sr|Co)"
starters = "(Mr|Mrs|Ms|Dr|He\s|She\s|It\s|They\s|Their\s|Our\s|We\s|But\s|However\s|That\s|This\s|Wherever)"
acronyms = "([A-Z][.][A-Z][.](?:[A-Z][.])?)"
websites = "[.](ro|com|net|org|io|gov)"

#dictionar cuvinte obisnuite
usual = ["cine", "cum", "cat", "fost", "numeste", "inseamna", "e", "este",
         "are", "face", "cati", "cate", "care", "despre", "pe", "ce",
         "se", "o", "un", "una", "unde"]

#eliminare semne de punctuatie si cuvinte obsinuite
def clearInput(intrebare):
    regex = re.compile('[%s]' % re.escape(string.punctuation))
    intrebare = regex.sub('', intrebare)

    intrebare = intrebare.lower().split(" ")
    resultSet = [word for word in intrebare if word not in usual]
    result = ' '.join(resultSet)

    return result

#impartirea raspunuslui in propozitii
def split_into_sentences(text):
    text = " " + text + "  "
    text = text.replace("\n", " ")
    text = re.sub(prefixes, "\\1<prd>", text)
    text = re.sub(websites, "<prd>\\1", text)
    if "Ph.D" in text: text = text.replace("Ph.D.", "Ph<prd>D<prd>")
    if "Dl." in text: text = text.replace("Dl.", "Dl<prd>")
    if "M. Sa" in text: text = text.replace("M. Sa", "M<prd> Sa")
    if "D. Sa" in text: text = text.replace("D. Sa", "D<prd> Sa")

    #sterger continut dintre paranteze
    text = re.sub("\s" + alphabets + "[.] ", " \\1<prd> ", text)
    text = re.sub(acronyms + " " + starters, "\\1<stop> \\2", text)
    text = re.sub(alphabets + "[.]" + alphabets + "[.]" + alphabets + "[.]", "\\1<prd>\\2<prd>\\3<prd>", text)
    text = re.sub(alphabets + "[.]" + alphabets + "[.]", "\\1<prd>\\2<prd>", text)
    text = re.sub(" " + suffixes + "[.] " + starters, " \\1<stop> \\2", text)
    text = re.sub(" " + suffixes + "[.]", " \\1<prd>", text)
    text = re.sub(" " + alphabets + "[.]", " \\1<prd>", text)
    if "”" in text: text = text.replace(".”", "”.")
    if "\"" in text: text = text.replace(".\"", "\".")
    if "!" in text: text = text.replace("!\"", "\"!")
    if "?" in text: text = text.replace("?\"", "\"?")
    text = text.replace(".", ".<stop>")
    text = text.replace("?", "?<stop>")
    text = text.replace("!", "!<stop>")
    text = text.replace("<prd>", ".")
    sentences = text.split("<stop>")
    sentences = sentences[:-1]
    sentences = [s.strip() for s in sentences]
    return sentences

def responseWikipedia(intrebare):
    try:
        intrebare = clearInput(intrebare)
        regex = re.compile(".*?\((.*?)\)")
        result = re.sub("([\(\[]).*?([\)\]])", "\g<1>\g<2>", wikipedia.summary(intrebare))
        result = re.sub("[\(\[].*?[\)\]]", "", result)
        result = re.sub(' +', ' ', result)
        result = re.sub(' \, ', ', ', result)
        result = re.sub(' \. ', '. ', result)
        result = re.sub('\(', '', result)
        result = re.sub('\)', '', result)
        #tokenizare pe propozitii
        fraza = split_into_sentences(result)

        result = fraza[0] + ' ' + fraza[1];
        dimensiune = len(result);

        if(dimensiune < 100):
            result += ' ' + fraza[2];
        elif(dimensiune > 300):
            result = fraza[0];

    except Exception as e:
        result = "Încearcă să reformulezi, te rog!"

    return result
