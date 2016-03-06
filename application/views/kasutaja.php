
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3>Seaded</h3>
                <div class="col-lg-6">
                    <h4>Isikuandmed</h4>
                    <p>
                        <?php
                        if (!empty($isik['user_profile']->profileURL)) {
                            ?>
                            <a href="<?php echo $isik['user_profile']->profileURL; ?>"><img src="<?php echo $isik['user_profile']->photoURL; ?>" title="<?php echo $isik['user_profile']->displayName; ?>" border="0" style="height: 120px;"></a>
                            <?php
                        } else {
                            ?>
                            <img src="public/avatar.png" title="<?php echo $isik['user_profile']->displayName; ?>" border="0" >
                            <?php
                        }
                        ?>
                    </p>
                            <p><strong>Eesnimi:</strong> <?php echo $isik['user_profile']->firstName?></p>
                            <p><strong>Perenimi:</strong> <?php echo $isik['user_profile']->lastName?></p>
                            <p><strong>e-mail: </strong> <?php echo $isik['user_profile']->email?></p>
                               
                </div>
                <div class="col-lg-offset-6">

                </div>


            </div>
        </div>
    </div>
</div>
<!-- /.container -->
