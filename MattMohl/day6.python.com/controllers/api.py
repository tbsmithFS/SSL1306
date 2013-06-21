#!/usr/bin/python

from models.view import View
from models.APIConnector import APIConnector
import cgi

class API:
	def dispatch(self, action):
		if action != '':
			if action == 'homepage':
				v = View()
				v.printHeader()
				v.getView(action)
			elif action == 'duck':
				api = APIConnector()
				query = cgi.FieldStorage()
				results = api.search(query.getvalue('keyword'))
				print results
				# v = View()
				# v.printHeader()
				# v.getView(action, results)
			else:
				print 'no action'