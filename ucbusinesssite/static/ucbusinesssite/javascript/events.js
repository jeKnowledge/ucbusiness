if(document.readyState === "complete" || (document.readyState!== "loading" && !document.documentElement.doScroll)){
    main();
}else{
    document.addEventListener("DOMContentLoaded", main);
}


function main() {
  var date = new Date();
  var monthCounter = date.getMonth() + 1;
  var next_btn = document.getElementById('next-button');
  var prev_btn = document.getElementById('prev-button'); 
  
  getEvents(monthCounter, 0);

  next_btn.addEventListener('click', function(e){ 
    monthCounter += 1;
    getEvents(monthCounter);
  });
  prev_btn.addEventListener('click', function(e){ 
    monthCounter -= 1;
    getEvents(monthCounter);
  });

}

function getEvents(monthCounter) {
  $.ajax({
    headers: {'X-CSRFToken': document.querySelector('[name=csrfmiddlewaretoken]').value},
    data: JSON.stringify({counter: monthCounter}),
    type: 'PATCH',
    url: '/getEvents/',
    success: (response) => {
      drawTimeline(response.month, response.numDays, response.events);
    },
    failure: (response) => {
    }
  });
}

function drawTimeline(month, numdays, data) {
  var node = document.getElementById("rectangle")

  var rect_message = document.querySelector("#rectangle_message")

  var monthText = document.getElementById('month-txt');
  monthText.innerHTML = month;

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
