#!/usr/bin/python

import mysql.connector


class DBConnector():

    def get_connection(self):
        self.db = mysql.connector.connect(host="127.0.0.1",
                                          port=3306,
                                          user="root",
                                          passwd="root",
                                          db="fakeUsers")

    def get_random_user(self):

        self.get_connection()

        sql = "select firstname, lastname, city, state,\
                zip, phone from address order by rand() limit 1"

        cursor = self.db.cursor()
        cursor.execute(sql)
        for firstname, lastname, city, state, zip, phone in cursor:
            print("{} {} lives in {}, {} {} with phone number {}".format(
                firstname, lastname, city, state, zip, phone))
        cursor.close()
        self.db.close()

    def add_user(self, fname='', lname='', address='',
                 city='', state='', phone='', zip=''):

        self.get_connection()

        sql = "insert into address (firstname, lastname, address,\
              city, state, zip, phone) values (%(fname)s, \
                %(lname)s, %(address)s, %(city)s, %(state)s,\
                %(zip)s, %(phone)s)"

        user_info = {
            'fname': fname,
            'lname': lname,
            'address': address,
            'city': city,
            'state': state,
            'zip': zip,
            'phone': phone
        }

        cursor = self.db.cursor()
        cursor.execute(sql, user_info)
        self.db.commit()
        cursor.close()
        self.db.close()
