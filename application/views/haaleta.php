
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3>Anna hääl</h3>
                <?php if($on_logitud){
                    if($haal[0]->Valik == null){
                    echo
                    '<div class="col-lg-5 text-center">
                    <div class="input-group">
                        <input type="text" id="data" name="haaleta" class="form-control" placeholder="Sisesta number" onkeyup="showKandidaat(this.value)" />
			<span class="input-group-btn">
                    	</span>
			<div id="spinner"></div>
                        <div id="kandB"></div>
                    </div>
                    
                    </div>';                        
                    }
                    else{
                        ?>
                    <div class="col-lg-5 text-center">
                    <p>Oled juba hääletanud kandidaat number <?php echo $haal[0]->Valik ?> poolt</p>
                    <p>
                        <a class="btn btn-danger" href="<?php echo site_url('sait/tyhistahaal')?>">Tühista hääl</a>
                    </p>
                    </div>                          
                    <?php
                    }
                }
                else{
                    echo "<p>Hääletamiseks <a href=".site_url('sait/sisene').">logi sisse</a></p>";
                } ?>


            </div>
        </div>
    </div>
</div>
<!-- /.container -->
