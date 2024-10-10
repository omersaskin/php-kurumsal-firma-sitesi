<?php 
include 'header.php';

if (isset($_POST['aranan'])) {
    $aranan = $_POST['aranan'];
} else {
    $aranan = $_GET['aranan'];
}

if (strlen($aranan) == 0) {
    Header("Location:index.php");
    exit;
}

$sorgu = $db->prepare("select * from icerik where icerik_ad LIKE ?");
$sorgu->execute(array("%$aranan%"));
$say = $sorgu->rowCount();
?>

<main>
    <section>
    <div class = "row">
    <div class="col-66">
    <h1 class="mt-xl mb-none">Arama Sonuçları</h1>

    <?php 
                    if ($say == 0) { ?>
                    <div class="col-md-12">
                        <p><b><?php echo $aranan ?></b> kelimesi ile ilgili sonuç bulunamadı...</p>
                    </div>
                    <?php } ?>

                    <?php
                    $sayfada = 4;
                    $toplam_icerik = $sorgu->rowCount();
                    $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                    $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

                    if ($sayfa < 1) $sayfa = 1;
                    if ($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

                    $limit = ($sayfa - 1) * $sayfada;

                    // Ensure $limit is never negative
                    if ($limit < 0) {
                        $limit = 0;
                    }

                    $iceriksor = $db->prepare("select * from icerik where icerik_ad LIKE ? order by icerik_zaman DESC limit $limit, $sayfada");
                    $iceriksor->execute(array("%$aranan%"));


                    while ($icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="news-item">
                        <span class="thumb-info">
                            <img src="<?php echo $icerikcek['icerik_resimyol']; ?>" alt="" class="news-image">
                            <h2><?php echo $icerikcek['icerik_ad']; ?></h2>
                            <p><?php echo substr($icerikcek['icerik_detay'], 0, 250); ?>...</p>
                            <a href="blog-<?= seo($icerikcek["icerik_ad"]) . '-' . $icerikcek["icerik_id"] ?>" style="font-size:13px; font-weight: bold; color: #000 !important;">Devamını Oku ><i class="fa fa-long-arrow-right"></i></a>
                        </span>
                    </div>
                    <?php } ?>

                    <div class="pagination-wrapper">
                        <ul class="pagination">
                            <?php
                            $s = 0;
                            while ($s < $toplam_sayfa) {
                                $s++; ?>
                                <li <?php if ($s == $sayfa) { echo 'class="active"'; } ?>>
                                    <a href="arama?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
</div>

<div class = "col-33" style="background-color: #fff; padding: 20px; border-radius: 4px;box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
			<?php include 'rightbar.php'; ?>

</div>
</div>
</section>
</main>
                    
             

<?php include 'footer.php'; ?>
