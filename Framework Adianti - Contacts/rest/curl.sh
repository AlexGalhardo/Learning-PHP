#!/bin/bash
curl -i -X GET http://localhost/contacts/contacts/1
curl -i -X GET -d '{"order": "name", "direction": "desc", "limit": 3}' http://localhost/contacts/contacts
curl -i -X POST -H 'Content-Type: application/json' -d '{"name": "Peter", "email" : "peter@email.com"}' http://localhost/contacts/contacts
curl -i -X PUT -H 'Content-Type: application/json' -d '{"name": "Peter Saurus"}' http://localhost/contacts/contacts/3
curl -i -X DELETE http://localhost/contacts/contacts/3
curl -i -X DELETE -d '{"filters":[["id",">",5],["id","<","10"]]}' http://localhost/contacts/contacts
curl -i -X GET http://localhost/contacts/contacts/1/name