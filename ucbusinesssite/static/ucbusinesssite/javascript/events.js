if(document.readyState === "complete" ||
(document.readyState!== "loading" && !document.documentElement.doScroll)){
    main();
}else{
    document.addEventListener("DOMContentLoaded", main);
}

function main() {
  var date = new Date();
  var monthCounter = date.getMonth() + 1;
  var yearCounter = date.getFullYear();
  var diffMonths = 0;
  var maxDiff = 4;
  var next_btn = document.getElementById('next-button');
  var prev_btn = document.getElementById('prev-button');

  getEvents(monthCounter, yearCounter);

  next_btn.addEventListener('click', function(e){
    console.log("clicou");
    const myNode = document.getElementById("container_news");
      while (myNode.firstChild) {
        myNode.removeChild(myNode.lastChild);
      }

    if (diffMonths < maxDiff) {
      monthCounter = (monthCounter + 1) % 13;
      if (monthCounter < 0) {
        monthCounter = -monthCounter;
      } else if (monthCounter == 0) {
        monthCounter = 1;
        yearCounter++;
      }
      diffMonths++;
      getEvents(monthCounter, yearCounter);
    }
  });

  prev_btn.addEventListener('click', function(e){
    const myNode = document.getElementById("container_news");
      while (myNode.firstChild) {
        myNode.removeChild(myNode.lastChild);
      }
    if (diffMonths > -maxDiff) {
      monthCounter = (monthCounter - 1) % 13;
      if (monthCounter < 0) {
        monthCounter = -monthCounter;
      } else if (monthCounter == 0) {
        monthCounter = 12;
        yearCounter --;
      }
      diffMonths--;
      getEvents(monthCounter, yearCounter);
    }
  });
}

function getEvents(monthCounter, yearCounter) {
  $.ajax({
    headers: {'X-CSRFToken': document.querySelector('[name=csrfmiddlewaretoken]').value},
    data: JSON.stringify({monthCounter: monthCounter, yearCounter: yearCounter}),
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
  var cont = document.getElementById ("container_news")

  var rect_message = document.querySelector("#rectangle_message")

  var monthText = document.getElementById('month-txt');
  monthText.innerHTML = month;

  for (var i = 1; i <= numdays; ++i) {

          var circle = cont.appendChild(document.createElement("div"))
          var day_txt = cont.appendChild(document.createElement("span"))

          var day= i.toString();
          day_txt.innerHTML = day;

          circle.classList.add("circle")

          if (data[i] != undefined) {
            circle.classList.add("filled_circle")

              circle.onmouseover  = function()  {

                  if (rect_message.style.display == "" || rect_message.style.display == "none") {
                  rect_message.innerText = data[this.innerText]
                  rect_message.style.display = "block"
                } else {
                  rectangle_message.style.display = "none"
                }
              }
              }

          circle.appendChild(day_txt);
          node.appendChild(circle);
          document.getElementById("container_news").appendChild(circle)
        }
}
