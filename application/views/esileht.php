    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-left">
                    
                    <h3>Esileht</h3>
                    <?php
                        if($staatus == 0){
                            echo '<p>Valimised pole veel alanud</p>';
                        }
                        else if($staatus == 1){
                            echo '<p>Valimiste lõpuni on jäänud</p>';         
                            echo '<span id="countdown" class="cd-style"></span>';
                        }
                        else if($staatus == 2){
                            echo '<p>Valimised on lõppenud! Tulemuste vaatamiseks mine lehele Tulemused</p>';
                        }                  
                    ?>
                    <div id="date" class="hidden"><?php echo $enddate ?></div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.countdown.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/countdown.js"); ?>"></script>
    <!-- /.container -->
