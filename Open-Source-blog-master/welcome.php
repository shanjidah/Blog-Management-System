<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
    height: 100%;
    margin: 0;
}

.bg {
    /* The image used */
    background-image: url("P.jpg");
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.captionfirst {
  position: absolute;
  left: 0;
  top: 42%;
  width: 100%;
  text-align: center;
  color: #000;
}
.captionsecond {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  text-align: center;
  color: #000;
}
.captionfirst span.border {
  background-color: #111;
  color: #fff;
  padding: 18px;
  font-size: 25px;
  letter-spacing: 10px;
}
.captionsecond span.border {
  background-color: #111;
  color: #fff;
  padding: 18px;
  font-size: 25px;
  letter-spacing: 10px;
}

#slides{
    position: relative;
    height: 100%;
    padding: 0px;
    margin: 0px;
    list-style-type: none;
}
.slide{
    position: absolute;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    opacity: 0;
    z-index: 1;

    -webkit-transition: opacity 1s;
    -moz-transition: opacity 1s;
    -o-transition: opacity 1s;
    transition: opacity 1s;
}
.showing{
    opacity: 1;
    z-index: 2;
}

</style>
</head>
<body>
<ul id="slides">
    <li class="slide showing">
        <div class="bg">
            <div class="captionfirst">
                <span class="border">Open Source</span>
            </div>
            <div class="captionsecond">
                <span class="border">Blogging System</span>
            </div>
        </div>
    </li>

    <li class="slide">
        <?php header( "refresh:4;url=index.php" );?>
    </li>
</ul>
    

</body>
</html>



<script>
var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,2000);

function nextSlide(){
    slides[currentSlide].className = 'slide';
  //  currentSlide = (currentSlide+1)%slides.length;
    currentSlide = (currentSlide+1);
    slides[currentSlide].className = 'slide showing';
    // if(currentSlide>3)
    // {
    //     clearInterval(slideInterval);
    // }

}
</script>