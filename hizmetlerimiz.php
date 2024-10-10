<?php
	include 'header.php';

	//Belirli veriyi seçme işlemi
	$menusor=$db->prepare("SELECT * FROM categories where url=:sef");
	$menusor->execute(array(
		'sef' => $_GET['sef']
		));
	$menucek=$menusor->fetch(PDO::FETCH_ASSOC);
?>

<!-- Content -->
<main>
    <!-- About Us -->
    <section id="aboutUs">
        <div class="row">
            <div class="col-66">
                <!-- Check if the row is not empty before displaying data -->
                    <h2 class="secondTitle"><?php echo htmlspecialchars($menucek['name']); ?></h2>
                    <p><?php echo htmlspecialchars($menucek['description']); ?></p>
             
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
