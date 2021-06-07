#!C:\Users\viran\AppData\Local\Programs\Python\Python39\python.exe

import os

print("Content-type: text/html\n")
print("<p>Environment</p>")
for param in os.environ.keys():
	print("<b>%20s</b>: %s<br>" % (param, os.environ[param]))
