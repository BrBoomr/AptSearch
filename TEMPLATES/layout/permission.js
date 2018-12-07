// Create the XHR object.
function createCORSRequest(method, url) {
    var xhr = new XMLHttpRequest();
    if ("withCredentials" in xhr) {
        // XHR for Chrome/Firefox/Opera/Safari.
        xhr.open(method, url, true);
    } else if (typeof XDomainRequest != "undefined") {
        // XDomainRequest for IE.
        xhr = new XDomainRequest();
        xhr.open(method, url);
    } else {
        // CORS not supported.
        xhr = null;
    }
    return xhr;
}

// Helper method to parse the title tag from the response.
function getTitle(text) {
    var thing = text.match('<title>(.*)?</title>')
    if(thing != null) return thing[1];
}

// Make the actual CORS request.
function makeCorsRequest() {
    // This is a sample server that supports CORS.
    var url = 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'

    var xhr = createCORSRequest('GET', url);
    if (!xhr) {
        console.log('CORS not supported');
        return;
    }

    // Response handlers.
    xhr.onload = function() {
        var text = xhr.responseText;
        var title = getTitle(text);
        console.log('Response from CORS request to ' + url + ': ' + title);
    };

    xhr.onerror = function() {
        console.log('Woops, there was an error making the request.');
    };

    xhr.send();
}

makeCorsRequest()