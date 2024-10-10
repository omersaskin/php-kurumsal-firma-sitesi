<?php
	include 'header.php';

	//Belirli veriyi seçme işlemi
	$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
	$hakkimizdasor->execute(array(
		'id' => 0
		));
	$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>

	<!-- Content -->
	<main>
		<!-- About Us -->
		<section id="aboutUs">
			<div class="row">
				<div class="col-66">
					<h1 class="firstTitle">Hakkımızda!</h1>
					<h2 class="secondTitle"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h2>
					<p><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></p>
					
				</div>
				<div class="col-33">
					<img src="img/about.jpg" alt="about us" style="border-radius: 4px;">
				</div>
			</div>
		</section>

	</main>

	<?php

	include 'footer.php';

	?>