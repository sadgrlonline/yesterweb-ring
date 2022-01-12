<div id="myData"></div>

<script>
fetch('webring.json')

    .then(function(response) {
        return response.json();
    })
    .then(function(data) {
        appendData(data);
    })
    .catch(function(err) {
        console.log('error: ' + err);
    });

function appendData(data) {
    var mainContainer = document.getElementById("myData");
    for (var i = 0; i < data.length; i++) {
        var div = document.createElement("div");
        div.innerHTML = '<strong>Name:</strong> ' + data[i].name + '<br/>' + '<strong>URL: </strong>' + '<a href="' +
            data[i].url + '">' + data[i].url + '</a>' + '<br/>' + '<strong>Owner:</strong> ' + data[i].owner +
            '<br/><br/>';
        mainContainer.appendChild(div);
        div.classList.add("item");
    }
}
</script>