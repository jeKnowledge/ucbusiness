var imageSources= ["../assets/images/foto.png"];

var currentIndex = 0;

var leftArrow = document.querySelector("#arrow-prev");
var rightArrow = document.querySelector("#arrow-next");

if (imageSources.length) {
    leftArrow.addEventListener("click", function() {
        currentIndex = currentIndex - 1;
        if (currentIndex < 0) {
            currentIndex = imageSources.length-1;
        }
        document.querySelector(".slider img").setAttribute("src", imageSources[currentIndex]);
    });


    rightArrow.addEventListener("click", function() {
        currentIndex = currentIndex + 1;
        if (currentIndex >= imageSources.length) {
            currentIndex = 0;
        }
        document.querySelector(".slider img").setAttribute("src", imageSources[currentIndex]);
    });
}
