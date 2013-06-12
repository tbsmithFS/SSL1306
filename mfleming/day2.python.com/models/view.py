#!/usr/bin/python

from os.path import isfile
from string import Template

class View:
	def __init__ (self):
		self.base_path = "/Users/Michael/Sites/day2.python.com/views/"
		
	def print_header(self):
		print "Content-type: text/html\n\n"
		
	def get_view(self, file, data={}):
		
		full_path_to_view = self.base_path + str(file) + ".html"
		
		if isfile(full_path_to_view):
		
			#open the file for reading
			file_handle = open(full_path_to_view, "r")
			
			#loop through each line
			for line in file_handle:
			
				print Template(line).substitute(data)