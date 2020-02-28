function makeRequest(url, method, FormData, callback) {
    fetch(url, {
        method: method,
        body: FormData
    }).then((data) => {
        return data.json()
    }).then((result) => {
        callback(result);
    }).catch((err) => {
        console.log("Error: ", err)
    })
}

function getAllStudents() {
    var data = new FormData()
    data.append('entity', 'student')
    data.append('endpoint', 'getAll')

    makeRequest('/requestHandler.php', 'POST', data, (result) => {
        console.log(result)
    })
}

