<?php 
include 'header.php'; 

// Veriyi çekme işlemi
$hakkimizdasor = $db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=:id");
$hakkimizdasor->execute(array('id' => 0));
$hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>

<?php include 'side_menu.php'; ?>
    <main>
    <section>

    <div class="row" style="padding: 30px; background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2); height: auto;">
        <div class="col-100">
        <h2>Hakkımızda</h2>
        <form action="../netting/islem.php" method="post">
            <label for="hakkimizda_baslik">Hakkımızda Başlık</label>
            <input type="text" id="hakkimizda_baslik" name="hakkimizda_baslik" value="<?php echo $hakkimizdacek['hakkimizda_baslik']; ?>" required>

            <label for="hakkimizda_icerik">İçerik</label>
            
            <div style="margin: 13px 0px !important;">
            <textarea class="ckeditor" id="editor1" name="hakkimizda_icerik" required><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></textarea>
            </div>
            

            <label for="hakkimizda_video">Video</label>
            <input type="text" id="hakkimizda_video" name="hakkimizda_video" value="<?php echo $hakkimizdacek['hakkimizda_video']; ?>" required>

            <label for="hakkimizda_vizyon">Vizyon</label>
            <input type="text" id="hakkimizda_vizyon" name="hakkimizda_vizyon" value="<?php echo $hakkimizdacek['hakkimizda_vizyon']; ?>" required>

            <label for="hakkimizda_misyon">Misyon</label>
            <input type="text" id="hakkimizda_misyon" name="hakkimizda_misyon" value="<?php echo $hakkimizdacek['hakkimizda_misyon']; ?>" required>

            <button type="submit" name="hakkimizdakaydet">Güncelle</button>
        </form>
        </div>

</div>
</section>
</main>

<?php include 'footer.php'; ?>
