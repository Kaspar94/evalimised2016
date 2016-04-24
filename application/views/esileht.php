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
                            echo '<p>Valimiste lõpuni on jäänud</p>'+         
                            '<span id="countdown" class="cd-style"></span>';
                        }
                        else if($staatus == 2){
                            echo '<p>Valimised on lõppenud! Tulemuste vaatamiseks mine lehele Tulemused</p>';
                        }                  
                    ?>
                    <div class="hidden" id="date"><?php echo $enddate ?></div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
