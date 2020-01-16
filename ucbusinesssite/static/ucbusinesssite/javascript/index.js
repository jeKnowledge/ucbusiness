window.onload = function () {
        var data = {
          // "6": "Inauguração Vice-Reitoria Pólo II e Lançamento do UC Business e Lançamento ASUC Ensino Secundário",
          // "11": "Apresentação do projeto Fit4work"
          "10":"Assinatura Protocolo UniLoop com Fundação Calouste Gulbenkian, EGF, The Loop Company e Universidade de Coimbra - 12h"
        }

        var node = document.getElementById("rectangle")
        var months= ["jan","fev","mar","apr","may","jun","jul","aug","set","oct","nov", "dec"]
        var days=["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"]
        var numdays=31;
        var rectangle_message = document.querySelector("#rectangle_message")

        for (var i = 0; i < numdays; ++i) {
                var circle = document.createElement("div")
                var text = document.createElement("span")
                var hour= document.createElement("span")
                text.innerHTML = days[i]
                circle.classList.add("circle")
                if (data[days[i]] != undefined) {
                  circle.classList.add("filled_circle")
                  circle.onmouseover = function() {
                    if (rectangle_message.style.display == "" || rectangle_message.style.display == "none") {
                      rectangle_message.innerText = data[this.innerText]
                      rectangle_message.style.display = "block"
                    } else {
                      rectangle_message.style.display = "none"
                    }

                  }
                }
                circle.appendChild(text);
                node.appendChild(circle)
        }


}
