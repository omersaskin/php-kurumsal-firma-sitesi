<?php  
include 'header.php';   

$iceriksor = $db->prepare("SELECT * FROM icerik WHERE icerik_id = :icerik_id"); 
$iceriksor->execute(array(     
    'icerik_id' => $_GET['icerik_id'] 
));  

$icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC); 
?>  

<main>     
    <section>         
        <div class="row">
        <div class="col-66">         
            <h1 class="mt-xl mb-none"><?php echo $icerikcek['icerik_ad']; ?></h1>                 
            <p style="font-size:14px !important; text-align:left !important;">                     
                <img src="<?php echo $icerikcek['icerik_resimyol']; ?>" class="img-responsive" alt="" style="border-radius: 4px;">                     
                <?php echo $icerikcek['icerik_detay']; ?>                 
            </p>                 
            <hr>                 
            <p style="font-size:14px;">
                <b>Anahtar Kelimeler: </b>                 
                <?php                      
                $etiketler = explode(', ', $icerikcek['icerik_keyword']);                      
                $sonIndex = count($etiketler) - 1; // Son etiketin indeksini alıyoruz                     
                foreach ($etiketler as $index => $etiketbas) { ?>                         
                    <a href="arama?aranan=<?php echo $etiketbas; ?>" style="text-decoration: none; color: #54C4CB; font-size: 14px;">                             
                        <?php echo $etiketbas; ?>                         
                    </a>                         
                    <?php if ($index !== $sonIndex) { // Son etiket değilse virgül ekle ?>                             
                        ,                          
                    <?php } ?>								                     
                <?php } ?>                 
            </p>             
        </div>  
        <div class="col-33" style="background-color: #fff; padding: 20px; border-radius: 4px;box-shadow: 0 2px 5px rgba(0,0,0,0.1);"> 
            <?php include 'rightbar.php'; ?>  
        </div> 
</div>
    </section> 
</main>

<!-- Footer -->
<?php include 'footer.php'; ?>
