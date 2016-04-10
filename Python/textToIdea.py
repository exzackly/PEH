import imaplib
import email
import urllib.request
import re
import smtplib
import time

USERNAME = ''
PASSWORD = ''

def parseEmail(emailMessage):
    for part in emailMessage.walk():
        if part.get_content_type() == 'text/plain':
            return part.get_payload().strip()
    for part in emailMessage.walk():
        if part.get_content_type() == 'text/html':
            return re.sub('\s', '', re.sub('Multimedia Message', '', re.sub('<.*?>', '', part.get_payload())))

def checkMail():
    try:
        print('checking')
        mail = imaplib.IMAP4_SSL('imap.gmail.com')
        mail.login(USERNAME, PASSWORD)
        mail.list()
        mail.select('inbox')
        _, data = mail.search(None, 'Unseen')
        ids = data[0]
        idList = ids.split()
        for item in idList:
            _, data = mail.fetch(item, 'RFC822')
            emailMessage = email.message_from_string(data[0][1].decode('utf-8'))
            improvement = parseEmail(emailMessage).split("-") + ["No description"]
            print("Adding " + improvement[0])
            urllib.request.urlopen("http://exzackly7.com/PEH/backend/addImprovement.php?name=" + improvement[0] + "&desc=" + improvement[1].replace(" ", "%20") + "&lcp=idea")
        mail.close()
        mail.logout()
    except Exception as e:
        print(e)

while True:
    checkMail()
    time.sleep(5)
