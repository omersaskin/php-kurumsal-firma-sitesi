<?php 
$hakkimizdasor=$db->prepare("select * from hakkimizda where hakkimizda_id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>

<h4 class="mt-xl mb-md"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h4>



<div class="embed-responsive embed-responsive-16by9 mb-xl">
	<iframe width="100%" height="auto" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek['hakkimizda_video']; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
</div>


<h4 class="mt-xl mb-md">Vizyonumuz</h4>

<p class="font-size-lg" style="text-align: left;"><?php echo $hakkimizdacek['hakkimizda_vizyon']; ?></p>


<h4 class="mt-xl mb-md">Misyonumuz</h4>
<?php echo $hakkimizdacek['hakkimizda_misyon']; ?>