<?php 

include 'header.php';

if(isset($_POST['arama'])) {

  $aranan=$_POST['aranan'];

  $iceriksor=$db->prepare("SELECT * FROM icerik WHERE icerik_ad LIKE ? ORDER BY icerik_id ASC LIMIT 25");
  $iceriksor->execute(array("%$aranan%"));
  $say=$iceriksor->rowCount();

} else {

  $iceriksor=$db->prepare("SELECT * FROM icerik ORDER BY icerik_id DESC LIMIT 25");
  $iceriksor->execute();
  $say=$iceriksor->rowCount();

}
?>

    <?php include 'side_menu.php'; ?>
    
    <main>
    <section>
        <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); height: auto;">
            <div class="col-100">
                <h2 style="color: #333;">İçerik İşlemleri</h2>
                <hr style="height: 3px; background-color: #333; border-radius: 3px;" />
                <br />
                
                <div style="text-align: left;">
                    <a href="icerik-ekle.php" style="background-color: #333; color: #fff; padding: 10px; text-decoration: none; border-radius: 4px;">İçerik Ekle</a>
                </div>
                
                <br />
                <form action="" method="POST">
                    <div style="display: flex; justify-content: space-around;">
                        <input type="text" class="form-control" name="aranan" placeholder="Anahtar Kelime Giriniz..." style="flex-grow: 1; margin-right: 10px; border: solid 2px #000 !important;" />
                        <button class="btn btn-success" type="submit" name="arama" style="background-color: #333; color: #fff; text-decoration: none; padding: 10px; border-radius: 4px;">Ara!</button>
                    </div>
                </form>

                <div class="table-responsive"> <!-- Yatay kaydırma için div eklendi -->
                    <table style="border-radius: 4px; width: 100%; margin-top: 20px;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">İçerik Tarih</th>
                                <th>İçerik Ad</th>
                                <th style="text-align: center;">İçerik Durum</th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            while($icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $icerikcek['icerik_zaman']; ?></td>
                                    <td><?php echo htmlspecialchars($icerikcek['icerik_ad']); ?></td>
                                    <td style="text-align: center;"><?php echo $icerikcek['icerik_durum'] == 1 ? 'Aktif' : 'Pasif'; ?></td>
                                    <td style="text-align: center;">
                                        <a href="icerik-duzenle.php?icerik_id=<?php echo $icerikcek['icerik_id']; ?>" style="background-color: #333; color: #fff; padding: 10px; text-decoration: none; border-radius: 4px;">Düzenle</a>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="../netting/islem.php?iceriksil=ok&icerik_id=<?php echo $icerikcek['icerik_id']; ?>" style="background-color: #333; color: #fff; padding: 10px; text-decoration: none; border-radius: 4px;">Sil</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    </main>

<?php include 'footer.php'; ?>
