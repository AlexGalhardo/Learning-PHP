$.ajax({ 
    type: 'GET', 
    url: 'http://localhost/tutor/cities/1',
    success: function (response) { 
        console.log(response.data);
    }
});


$.ajax({ 
    type: 'GET', 
    url: 'http://localhost/tutor/cities',
    data: {
        'order': 'name',
        'direction': 'desc',
        'limit': '3',
        'filters' :[["id",">",1],["state_id","=","1"]]
    }, 
    dataType: 'json',
    success: function (response) { 
        console.log(response.data);
    }
});


$.ajax({ 
    type: 'POST', 
    url: 'http://localhost/tutor/cities',
    data: {
        'name': 'TESTE Ajax',
        'state_id': '1',
    }, 
    dataType: 'json',
    success: function (response) { 
        console.log(response.data);
    }
});

$.ajax({ 
    type: 'PUT', 
    contentType: 'application/json',
    url: 'http://localhost/tutor/cities/6',
    data: JSON.stringify({
        'name': 'TESTE Ajax 2',
    }), 
    dataType: 'json',
    success: function (response) { 
        console.log(response.data);
    }
});

$.ajax({ 
    type: 'DELETE', 
    contentType: 'application/json',
    url: 'http://localhost/tutor/cities/6',
    dataType: 'json',
    success: function (response) { 
        console.log(response.data);
    }
});


$.ajax({ 
    type: 'DELETE', 
    contentType: 'application/json',
    url: 'http://localhost/tutor/cities',
    data: JSON.stringify({
        'filters' :[["id",">",5],["state_id","=","1"]]
    }), 
    dataType: 'json',
    success: function (response) { 
        console.log(response.data);
    }
});

$.ajax({ 
    type: 'GET', 
    url: 'http://localhost/tutor/cities/1/state_name',
    success: function (response) { 
        console.log(response.data);
    }
});