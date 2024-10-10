<?php
	include 'header.php';

	//Belirli veriyi seçme işlemi
	$sayfasor=$db->prepare("SELECT * FROM menu where menu_seourl=:sef");
	$sayfasor->execute(array(
		'sef' => $_GET['sef']
		));
	$sayfacek=$sayfasor->fetch(PDO::FETCH_ASSOC);
?>

<!-- Content -->
<main>
    <!-- About Us -->
    <section id="aboutUs">
        <div class="row">
            <div class="col-66">
                <!-- Check if the row is not empty before displaying data -->
                    <h2 class="secondTitle"><?php echo htmlspecialchars($sayfacek['menu_ad']); ?></h2>
                    <p><?php echo htmlspecialchars($sayfacek['menu_detay']); ?></p>
        
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
