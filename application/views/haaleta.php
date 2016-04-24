
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3>Anna hääl</h3>
                <?php
                if($staatus == 0){
                    echo '<div class="col-lg-6 text-left"><p>Hääletamine pole veel alanud</p></div>';
                }
                else if($staatus == 2){
                    echo '<div class="col-lg-6 text-left"><p>Hääletamine on juba lõppenud</p></div>';
                }
                else if ($staatus == 1) {
                    if ($on_logitud) {
                        if ($haal[0]->Valik == null) {
                            echo
                            '<div class="col-lg-12 text-left">
                                <div class="col-lg-6 text-left">
                                    <div class="input-group">
                                        <input type="text" id="data" name="haaleta" class="form-control" placeholder="Sisesta number" onkeyup="showKandidaat(this.value)" />			
                                    </div>
                                </div>
                                <div class="col-lg-offset-6 text-left" id="spinner"></div>
                                <div class="col-lg-offset-6 text-left" id="kandB"></div>                
                            </div>';
                        } else {
                            ?>
                            <div class="col-lg-5 text-left">
                                <p>Oled juba hääletanud kandidaat number <?php echo $haal[0]->Valik ?> poolt</p>
                                <p>
                                    <a class="btn btn-danger" href="<?php echo site_url('sait/tyhistahaal') ?>">Tühista hääl</a>
                                </p>
                            </div>                          
                            <?php
                        }
                    } else {
                        echo "<p>Hääletamiseks <a href=" . site_url('sait/sisene') . ">logi sisse</a></p>";
                    }
                }
                ?>


            </div>
        </div>
    </div>
</div>
<!-- /.container -->
