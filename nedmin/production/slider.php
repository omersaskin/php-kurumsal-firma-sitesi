<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$slidersor = $db->prepare("SELECT * FROM slider");
$slidersor->execute();

?>
    <?php
    include 'side_menu.php';
    ?>

    <main>
        <section>
            <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); height: auto;">
                <div class="col-100">
                    <h2 style="color: #333;">Slider Yönetimi</h2>
                    <hr style="height: 3px; background-color: #333; border-radius: 3px;" />
                    <br />
                    <a href="slider-ekle.php" style="background-color: #333; color: #fff; padding: 10px; text-decoration: none; border-radius: 4px;">Slider Ekle</a>

                    <div class="table-responsive"> <!-- Yatay kaydırma için div eklendi -->

                        <br />
                        <table style="border-radius: 4px;">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Resim</th>
                                    <th>Ad</th>
                                    <th>Url</th>
                                    <th>Sıra</th>
                                    <th>Durum</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $say = 0;

                                while($slidercek = $slidersor->fetch(PDO::FETCH_ASSOC)) { 
                                    $say++;
                                ?>
                                    <tr>
                                        <td><?php echo $say ?></td>
                                        <td><img width="200" src="../../<?php echo htmlspecialchars($slidercek['slider_resimyol']); ?>" alt="Slider Resmi"></td>
                                        <td><?php echo htmlspecialchars($slidercek['slider_ad']); ?></td>
                                        <td><?php echo htmlspecialchars($slidercek['slider_link']); ?></td>
                                        <td><?php echo htmlspecialchars($slidercek['slider_sira']); ?></td>
                                        <td>
                                            <?php if ($slidercek['slider_durum'] == 1) { ?>
                                                <span>Aktif</span>
                                            <?php } else { ?>
                                              <span>Pasif</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id']; ?>" style="background-color: #333; color: #fff; padding: 10px; text-decoration: none; border-radius: 4px;">Düzenle</a>
                                        </td>
                                        <td>
                                            <a href="../netting/islem.php?slider_id=<?php echo $slidercek['slider_id']; ?>&slidersil=ok&slider_resimyol=<?php echo $slidercek['slider_resimyol']; ?>" style="background-color: #333; color: #fff; padding: 10px; text-decoration: none; border-radius: 4px;">Sil</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div> <!-- div sonu -->
                </div>
            </div>
        </section>
    </main>

<?php include 'footer.php'; ?>
