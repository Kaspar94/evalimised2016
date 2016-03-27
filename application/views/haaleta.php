
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3>Anna hääl</h3>
                <?php if($on_logitud){
                    if($haal[0]->Valik == null){
                    echo
                    '<div class="col-lg-5 text-left">
                    <div class="input-group">
                        <input type="text" id="data" name="haaleta" class="form-control" placeholder="Sisesta number" onkeyup="showKandidaat(this.value)" />
			<span class="input-group-btn">
                    	</span>
			<div id="spinner"></div>
                    
                    </div>
                    <div id="kandB"></div>
                    </div>';                        
                    }
                    else{
                    '<div class="col-lg-5 text-left">
                    <p>Oled juba hääletanud kandidaat number '.$haal[0]->Valik.' poolt</p>
                    <div id="kandB"></div>
                    </div>';                          
                    }
                }
                else{
                    echo '<p>Hääletamiseks logi sisse </p>';
                } ?>


            </div>
        </div>
    </div>
</div>
<!-- /.container -->
