import urllib.request
import random
import string

for i in range(21):
	name = ''.join(random.choice(string.ascii_letters) for i in range(7))
	desc = ''.join(random.choice(string.ascii_letters) for i in range(21))
	lcp = random.choice(['idea', 'review', 'submission', 'decision', 'implementation'])
	urllib.request.urlopen('http://exzackly7.com/PEH/addImprovement.php?name=' + name + '&desc=' + desc + '&lcp=' + lcp)
	print("Added improvement " + str(i))
print("Improvements added")
