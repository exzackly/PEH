import urllib.request
import random
import string

# Add random Users
for i in range(21):
	name = ''.join(random.choice(string.ascii_letters) for i in range(7))
	type = random.choice(['student', 'faculty', 'staff'])
	email = ''.join(random.choice(string.ascii_letters) for i in range(21))
	password = ''.join(random.choice(string.ascii_letters) for i in range(21))
	urllib.request.urlopen('http://exzackly7.com/PEH/backend/addUser.php?name=' + name + '&type=' + type + '&email=' + email + '&pwd=' + password)
	print("Added user " + str(i))
print("Users added")

# Add random improvements
for i in range(21):
	name = ''.join(random.choice(string.ascii_letters) for i in range(7))
	desc = ''.join(random.choice(string.ascii_letters) for i in range(21))
	lcp = random.choice(['idea', 'review', 'submission', 'decision', 'implementation'])
	urllib.request.urlopen('http://exzackly7.com/PEH/backend/addImprovement.php?name=' + name + '&desc=' + desc + '&lcp=' + lcp)
	print("Added improvement " + str(i))
print("Improvements added")

# Add random Likes
for i in range(100):
	uid = random.randint(1,21)
	iid = random.randint(1,21)
	urllib.request.urlopen('http://exzackly7.com/PEH/backend/addLike.php?uid=' + str(uid) + '&iid=' + str(iid))
	print("Added like " + str(i))
print("Likes added")

# Add random Comments
for i in range(100):
	uid = random.randint(1,21)
	iid = random.randint(1,21)
	comment = ''.join(random.choice(string.ascii_letters) for i in range(21))
	urllib.request.urlopen('http://exzackly7.com/PEH/backend/addComment.php?uid=' + str(uid) + '&iid=' + str(iid) + '&cmt=' + comment)
	print("Added comment " + str(i))
print("Comments added")


