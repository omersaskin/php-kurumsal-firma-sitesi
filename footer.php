<!-- Footer  -->
<footer>
		
		<p>&copy; Copyright 2021 Powered by <a href="http://www.orneksite.com" target="_blank">orneksite.com.tr</a></p>
	</footer>

<script type="text/javascript">
	function responsiveMenu() {
		var x = document.getElementById("topnavId");
		if (x.className === "topnav") {
			x.className = x.className + " responsive";
		} else {
			x.className = "topnav";
		} 
	}
</script>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
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
</body>
</html>

<?php
// Bağlantıyı kapat
$pdo = null;
?>