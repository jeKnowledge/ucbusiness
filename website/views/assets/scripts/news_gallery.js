

function changeImage_image(poster,source){


  var big_image = document.getElementById("big_image")
  //var source= big_image.getElementsByTagName("source").src

  big_image.setAttribute('poster', poster);
  big_image.setAttribute('src', source);

  if(poster === " "){
    big_image.controls = true;
}
else{
    big_image.controls = false;
}

}

let htmlStyles = window.getComputedStyle(document.querySelector("html"));
let rowNum = parseInt(htmlStyles.getPropertyValue("--imagesNum"));

var num= $('.row .column').length;

document.documentElement.style.setProperty("--imagesNum", num);
