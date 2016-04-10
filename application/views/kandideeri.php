
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3>Kandideeri</h3>
                <?php if($on_logitud){
                    if($kandideerib == null){
                    ?>
                    <div class="col-lg-5 text-left">
                    <div class="input-group">
                        <p><strong>Eesnimi:</strong> <?php echo $isik['user_profile']->firstName?></p>
                        <p><strong>Perenimi:</strong> <?php echo $isik['user_profile']->lastName?></p>
                        <p><strong>Piirkond:</strong>
                        <select name="formPiirkond" class="btn btn-default dropdown-toggle">
                            <option value="">Vali...</option>
                            <?php
	                        foreach($piirkonnad as $k){
                                    echo "<option value=".$k->Piirkond."'>".$k->Piirkond."</option>";
                                }
                            ?>                   
                        </select>
                        <p><strong>Erakond:</strong>
                        <select name="formErakond" class="btn btn-default dropdown-toggle">
                            <option value="">Vali...</option>
                            <?php
	                        foreach($erakonnad as $k){
                                    echo "<option value=".$k->Erakond."'>".$k->Erakond."</option>";
                                }
                            ?>                   
                        </select>
                    </p>
                        <input type="text" id="data" name="kandideeri" class="form-control" placeholder="Sisesta loosung" />
			<span class="input-group-btn">
                    	</span>
                    </div>                    
                    </div>                        
              <?php }
                    else{
                        echo
                    '<div class="col-lg-5 text-center">
                    <p>Oled juba kandidaatide nimekirjas</p>
                    </div>';                          
                    }
                }
                else{
                    echo '<p>Kandideerimiseks logi sisse </p>';
                } ?>


            </div>
        </div>
    </div>
</div>
<!-- /.container -->
