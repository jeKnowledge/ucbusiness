window.onload = function () {
        var node = document.getElementById("rectangle")
        var months= ["jan","fev","mar","apr","may","jun","jul","aug","set","oct","nov", "dec"]

        for (var i = 0; i < 12; ++i) {
                var circle = document.createElement("div")
                var text = document.createElement("span")
                text.innerHTML = months[i]
                circle.className = "circle"
                circle.appendChild(text);
                node.appendChild(circle.cloneNode(true))

        }
}