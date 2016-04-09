import urllib.request

addUser = urllib.request.urlopen('http://exzackly7.com/PEH/backend/addUser.php?name=test&type=student&email=test@test.com&pwd=jb423ln6243k5432l54lk3').read().decode('utf-8')
if 'User Added' in addUser:
	print('User test passed')
else:
	print("User test failed")
	
addImprovement = urllib.request.urlopen('http://exzackly7.com/PEH/backend/addImprovement.php?name=test&desc=testd&lcp=idea').read().decode('utf-8')
if addImprovement == 'Improvement Added':
	print('Improvement test passed')
else:
	print("Improvement test failed")
	
addLike = urllib.request.urlopen('http://exzackly7.com/PEH/backend/addLike.php?uid=1&iid=1').read().decode('utf-8')
if addLike == 'Like Added':
	print('Like test passed')
else:
	print("Like test failed")
	
addComment = urllib.request.urlopen('http://exzackly7.com/PEH/backend/addComment.php?uid=1&iid=1&cmt=this%20is%20test%20comment').read().decode('utf-8')
if addComment == 'Comment Added':
	print('Comment test passed')
else:
	print("Comment test failed")
