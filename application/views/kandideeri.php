
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3>Kandideeri</h3>
                <?php if($on_logitud){
                    if($kandideerib == null){
                    echo
                    '<div class="col-lg-5 text-center">
                    <div class="input-group">
                        <input type="text" id="data" name="kandideeri" class="form-control" placeholder="Sisesta loosung" />
			<span class="input-group-btn">
                    	</span>
                    </div>
                    
                    </div>';                        
                    }
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
