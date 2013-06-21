#!/usr/bin/python

from os.path import isfile
from string import Template

class View:
	def __init__(self):
		self.base_path = '/Users/mattmohl/Sites/day6.python.com/views/'
		
	def printHeader(self):
		print 'Content-type: text/html\n\n'

	def getView(self, file, data={}):
		fullPath = self.base_path+str(file)+'.py'

		if isfile(fullPath):
			file_handle = open(fullPath, 'r')

			for line in file_handle:
				print Template(line).substitute(data)