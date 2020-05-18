<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<style type="text/css">
	body {font-family: Verdana, sans-serif;}
.slides-kha {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-js {
  max-width: 1000px;
  position: relative;
  margin: auto;
}
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.kha {
  -webkit-animation-name: kha;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes kha {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes kha {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>


<div class="slideshow-js">

<div class="slides-kha kha">
  <div class="numbertext">1 / 3</div>
  <img src="{{asset('img/oppo-a5-2020-1-400x460%20(1).png')}}" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="slides-kha kha">
  <div class="numbertext">2 / 3</div>
  <img src="img_snow_wide.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="slides-kha kha">
  <div class="numbertext">3 / 3</div>
  <img src="img_mountains_wide.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>


<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>