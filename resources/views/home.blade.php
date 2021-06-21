<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">

.profile{
    padding-left: 50px;
}
.logo{
    vertical-align: middle;
  width: 170px;
  height: 170px;
  border-radius: 50%;
}
* {box-sizing: border-box}
body {
font-family: Verdana, sans-serif; margin:0; }
.mySlides {display: none;
}
img {
vertical-align: middle;
height: 350px;
width: 100%;
z-index: 0;
object-fit: cover;
}

/* Slideshow container */
.slideshow-container {
position: relative;
margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  /* width: auto; */
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}
.black{
  background-color: #262626;
  width: 100%; height: 100%;
 color:white;
 "overflow:hidden; margin:0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
/* .fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
} */

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body class="black">

<div class="slideshow-container">

<div class="mySlides my-fade">
  <div class="numbertext">1 / 3</div>
  <img src="/images/b.jpg" style="max-width: 100%; max-height: 100%;">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides my-fade">
  <div class="numbertext">2 / 3</div>
  <img src="/images/t.jpg" style="max-width: 100%;
        max-height: 100%;">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides my-fade">
  <div class="numbertext">3 / 3</div>
  <img src="/images/h.jpg" style="max-width: 100%;
        max-height: 100%;">
  <div class="text">Caption Three</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}


function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

  <div class="row align-items-start ">
  <div class="col-2">
<div class="profile">
<img src="/images/y.jpg" class="logo"> 
</div>
</div>
<div class="data col-5 px-3">
<h3 class="pt-3 " style="color: #b3ffd9;
"> {{$user->name}}</h3>
 <p>Open at <time>{{$user->workspace->open_time}}</time> closes <time>{{$user->workspace->close_time}} </time> every weekday.</p>
 <p>wifi {{$user->workspace->WIFI_speed}} </p>
 <a href=https://goo.gl/maps/2FcxBSGcKqYReQEw7> Location </a>

</div>
<div class="data col-3 px-3">
<h4 style="color: #b3ffd9;">features</h4> 
<ol class="list-group list-group-numbered">
  <li class="list-group-item">canteen</li>
  <li class="list-group-item">video games</li>
  <li class="list-group-item">Rooms for rent</li>
</ol>

</div>
</body>
</html> 
