window.onload = function () {
        var node = document.getElementById("rectangle")
        var months= ["jan","fev","mar","apr","may","jun","jul","aug","set","oct","nov", "dec"]
        var days=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"]

        for (var i = 0; i < 12; ++i) {
                var circle = document.createElement("div")
                var text = document.createElement("span")
                text.innerHTML = months[i]
                circle.className = "circle"
                circle.appendChild(text);
                node.appendChild(circle.cloneNode(true))
        }
}
