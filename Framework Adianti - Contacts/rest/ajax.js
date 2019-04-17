$.ajax({ 
    type: 'GET', 
    url: 'http://localhost/contacts/contacts/1',
    success: function (response) { 
        console.log(response.data);
    }
});


$.ajax({ 
    type: 'GET', 
    url: 'http://localhost/contacts/contacts',
    data: {
        'order': 'name',
        'direction': 'desc',
        'limit': '3',
        'filters' :[["id",">",1],["id","<","10"]]
    }, 
    dataType: 'json',
    success: function (response) { 
        console.log(response.data);
    }
});


$.ajax({ 
    type: 'POST', 
    url: 'http://localhost/contacts/contacts',
    data: {
        'name': 'Peter',
        'email': 'peter@mail.com'
    }, 
    dataType: 'json',
    success: function (response) { 
        console.log(response.data);
    }
});

$.ajax({ 
    type: 'PUT', 
    contentType: 'application/json',
    url: 'http://localhost/contacts/contacts/3',
    data: JSON.stringify({
        'name': 'Peter Saurus',
    }), 
    dataType: 'json',
    success: function (response) { 
        console.log(response.data);
    }
});

$.ajax({ 
    type: 'DELETE', 
    contentType: 'application/json',
    url: 'http://localhost/contacts/contacts/3',
    dataType: 'json',
    success: function (response) { 
        console.log(response.data);
    }
});


$.ajax({ 
    type: 'DELETE', 
    contentType: 'application/json',
    url: 'http://localhost/contacts/contacts',
    data: JSON.stringify({
        'filters' :[["id",">",5],["id","<","10"]]
    }), 
    dataType: 'json',
    success: function (response) { 
        console.log(response.data);
    }
});

$.ajax({ 
    type: 'GET', 
    url: 'http://localhost/contacts/contacts/1/name',
    success: function (response) { 
        console.log(response.data);
    }
});