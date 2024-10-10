<?php
	include 'header.php';

	//Belirli veriyi seçme işlemi
	$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
	$hakkimizdasor->execute(array(
		'id' => 0
	));
	$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>

<section id="contact">
	<div class="row">
		<div class="col-33">
			<h2>İletişim Bilgileri</h2>
			<p><strong>Adres:</strong> Örnek Cad. No:1, İstanbul, Türkiye</p>
			<p><strong>Telefon:</strong> +90 123 456 78 90</p>
			<p><strong>E-posta:</strong> info@example.com</p>

			<h2>Sosyal Medya</h2>
			<ul>
				<li><a href="https://facebook.com" target="_blank">Facebook</a></li>
				<li><a href="https://twitter.com" target="_blank">Twitter</a></li>
				<li><a href="https://instagram.com" target="_blank">Instagram</a></li>
			</ul>
		</div>
		<div class="col-66">
			<h1 class="firstTitle" style="text-align: center;">Contact Form</h1>
			<form>
				<label>Name</label>
				<input type="text" name="" required="" placeholder="Name">
				<label>E-mail</label>
				<input type="email" name="" required="" placeholder="E-mail">
				<textarea rows="8" placeholder="Message"></textarea>
				<input type="submit" name="" value="Submit">
			</form>
		</div>
	</div>
</section>
</main>

<?php
	include 'footer.php';
?>
