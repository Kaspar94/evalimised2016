
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3>Seaded</h3>
                <div class="col-lg-6">
                    <h4>Isikuandmed</h4>
                    <p>Pilt
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
                    <?php
                    foreach ($isik['user_profile'] as $key => $value) :
                        if ($value == "") {
                            continue;
                        }
                        ?>
                            <p><strong><?= ucfirst($key) ?>:</strong> <?= (filter_var($value, FILTER_VALIDATE_URL) !== false) ? '<a href="' . $value . '" target="_blank">' . $value . '</a>' : $value; ?></p>
                    <?php endforeach; ?>
                    <p>Eesnimi: </p>
                    <p>Perenimi:</p>
                    <p>e-mail: </p>
                               
                </div>
                <div class="col-lg-offset-6">

                </div>


            </div>
        </div>
    </div>
</div>
<!-- /.container -->
