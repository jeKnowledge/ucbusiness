if(document.readyState === "complete" || (document.readyState!== "loading" && !document.documentElement.doScroll)){
    main();
}else{
    document.addEventListener("DOMContentLoaded", main);
}

function main() {

    var node = document.getElementById("rectangle")
    var numdays=30;

    var data = {
      // "6": "Inauguração Vice-Reitoria Pólo II e Lançamento do UC Business e Lançamento ASUC Ensino Secundário",
      // "11": "Apresentação do projeto Fit4work"
      "10":"Assinatura Protocolo UniLoop com Fundação Calouste Gulbenkian, EGF, The Loop Company e Universidade de Coimbra - 12h",
      "25":"outro",
      "12":"mais um"
    }

    var rect_message = document.querySelector("#rectangle_message")


    for (var i = 1; i <= numdays; ++i) {

            var circle = document.createElement("div")
            var day_txt = document.createElement("span")

            var day= i.toString();
            day_txt.innerHTML = day;

            circle.classList.add("circle")

            if (data[i] != undefined) {
              circle.classList.add("filled_circle")

              day_txt.onmouseover  = function()  {

                  if (rect_message.style.display == "" || rect_message.style.display == "none") {
                  rect_message.innerText = data[this.innerText]
                  rect_message.style.display = "block"
                } else {
                  rectangle_message.style.display = "none"
                }
              }

            }
            circle.appendChild(day_txt);
            node.appendChild(circle)
    }
}
