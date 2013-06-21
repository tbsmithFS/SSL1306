#!/usr/bin/python

import urllib2

class APIConnector:
	def search(self, query='default'):
		response = urllib2.urlopen("http://api.duckduckgo.com/?q=" + str(query) + "&format=json&pretty=1")

		JSONstr = response.read()
		JSONobj = json.loads(JSONstr)
		return JSONobj