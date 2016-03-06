
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3>Anna hääl</h3>
                <?php if($on_logitud){
                    echo
                    '<div class="col-lg-5 text-left">
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Sisesta number">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Hääleta!</button>
                    </span>
                    </div>
                    </div>';
                }
                else{
                    echo '<p>Hääletamiseks logi sisse </p>';
                } ?>


            </div>
        </div>
    </div>
</div>
<!-- /.container -->
