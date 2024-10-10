<?php
	include 'header.php';

	//Belirli veriyi seçme işlemi
	$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
	$hakkimizdasor->execute(array(
		'id' => 0
		));
	$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>


<?php
include 'slider.php';
?>

	<!-- Content -->
	<main>
		<!-- About Us -->
		<section id="aboutUs">
			<div class="row">
				<div class="col-66">
					<h1 class="firstTitle">Hakkımızda!</h1>
					<h2 class="secondTitle"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h2>
					<p><?php echo substr( $hakkimizdacek['hakkimizda_icerik'], 0, 500); ?> ...</p>
					<a href="hakkinda.php"><button>Daha Fazla</button></a>
				</div>
				<div class="col-33">
					<img src="img/about.jpg" alt="about us" style="border-radius: 4px; ">
				</div>
			</div>
		</section>

		<!-- Clarity -->
		<section style="background-color: #000; color: #FFF;">
			<div class="row">
				<div class="col-33">
					<img src="img/clarity.jpg" alt="about us" style="border-radius: 4px;">
				</div>
				<div class="col-66">
					<h1 class="firstTitle" style=" color: #fff !important;">Clarity Us!</h1>
					<h2 class="secondTitle">Pixels, who?</h2>
					<p> <span class="thirdTitle">to create a creative website</span>, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<button>Read More</button>
				</div> 
			</div>
		</section>

	</main>

	<?php

	include 'footer.php';

	?>