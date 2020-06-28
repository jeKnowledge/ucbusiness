function changeBig_image(element){

  var img = element.src
  console.log(img)

  big_img= document.getElementById("big_image");
  big_img.src= img;

}
