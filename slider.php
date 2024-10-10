<div class="slideshow-container">

<?php 

		$slidersor=$db->prepare("SELECT * FROM slider");
		$slidersor->execute();

		while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {

		 ?>

<div class="mySlides fade">
  <a href="<?php echo $slidercek['slider_link'] ?>"><img src="<?php echo $slidercek['slider_resimyol'] ?>" style="width:100%"></a>
  <div class="text"><?php echo $slidercek['slider_ad'] ?></div>
</div>

<?php } ?>
<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>