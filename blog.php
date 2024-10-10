<?php 
include 'header.php'; 
?>

<main>
    <section>
    <div class ="row">
        <div class="col-66">
        <h1 class="mt-xl mb-none">Blog</h1>
        <?php
                    $sayfada = 4;
                    $sorgu = $db->prepare("select * from icerik");
                    $sorgu->execute();
                    $toplam_icerik = $sorgu->rowCount();
                    $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                    $sayfa = isset($_GET['sayfa']) ? (int)$_GET['sayfa'] : 1;

                    if ($sayfa < 1) $sayfa = 1;
                    if ($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
                    $limit = ($sayfa - 1) * $sayfada;

                    $iceriksor = $db->prepare("select * from icerik order by icerik_zaman DESC limit $limit,$sayfada");
                    $iceriksor->execute();

                    while ($icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC)) { ?>

                    <div class="news-item">
                        <img src="<?php echo $icerikcek['icerik_resimyol']; ?>" alt="" class="news-image">
                        <h2><?php echo $icerikcek['icerik_ad']; ?></h2>
                        <p><?php echo substr($icerikcek['icerik_detay'], 0, 250); ?>...</p>
                        <a href="blog-<?=seo($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>" style="font-size:13px; font-weight: bold; color: #000 !important;">Devamını Oku ></a>
                    </div>

                    <?php } ?>

                    <div class="pagination-wrapper">
                        <ul class="pagination">
                            <?php
                            $s = 0;
                            while ($s < $toplam_sayfa) {
                                $s++; ?>
                                <li class="<?= $s == $sayfa ? 'active' : '' ?>">
                                    <a href="blog?sayfa=<?= $s ?>"><?= $s ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
</div>

<div class="col-33"style="background-color: #fff; padding: 20px; border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
<?php include 'rightbar.php'; ?>

</div>
</div>
</section>
</main>


        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
