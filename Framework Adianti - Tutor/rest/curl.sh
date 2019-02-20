#!/bin/bash
curl -i -X GET http://localhost/tutor/cities/1
curl -i -X GET -d '{"order": "name", "direction": "desc", "limit": 3}' http://localhost/tutor/cities
curl -i -X POST -H 'Content-Type: application/json' -d '{"name": "TESTE CURL", "state_id": "1"}' http://localhost/tutor/cities
curl -i -X PUT -H 'Content-Type: application/json' -d '{"name": "TESTE CURL2"}' http://localhost/tutor/cities/6
curl -i -X DELETE http://localhost/tutor/cities/6
curl -i -X DELETE -d '{"filters":[["id",">",5],["state_id","=","1"]]}' http://localhost/tutor/cities
curl -i -X GET http://localhost/tutor/cities/1/state_name