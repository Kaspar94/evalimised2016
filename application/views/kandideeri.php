
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3><?php echo $startcampaign; ?></h3>
                <?php
                if ($staatus == 2) {
                    echo '<div class="col-lg-5 text-left"><p>Hääletamine on juba lõppenud</p></div>';
                } else {
                    if ($on_logitud) {
                        if ($kandideerib == false) {
                            ?>
                            <div class="col-lg-5 text-left">
                            <?php
                            $attributes = array("class" => "form-horizontal", "id" => "kandideeri", "name" => "kandideeri");
                            echo form_open("sait/kandideeri", $attributes);
                            ?>
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row colbox">
                                            <div class="col-lg-4 col-sm-4">
                                                <label for="piirkond" class="control-label"><?php echo $region; ?></label>
                                            </div>
                                            <div class="col-lg-8 col-sm-8">

            <?php
            $attributes = 'class = "form-control" id = "piirkond"';
            echo form_dropdown('piirkond', $piirkonnad, set_value('piirkonnad'), $attributes);
            ?>
                                                <span class="text-danger"><?php echo form_error('Piirkond'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row colbox">
                                            <div class="col-lg-4 col-sm-4">
                                                <label for="erakond" class="control-label"><?php echo $party; ?></label>
                                            </div>
                                            <div class="col-lg-8 col-sm-8">

            <?php
            $attributes = 'class = "form-control" id = "erakond"';
            echo form_dropdown('erakond', $erakonnad, set_value('erakonnad'), $attributes);
            ?>

                                                <span class="text-danger"><?php echo form_error('Erakond'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row colbox">
                                            <div class="col-lg-4 col-sm-4">
                                                <label for="loosung" class="control-label"><?php echo $slogan; ?></label>
                                            </div>
                                            <div class="col-lg-8 col-sm-8">
                                                <input id="loosung" name="loosung" placeholder="<?php echo $slogan; ?>" type="text" class="form-control" value="<?php echo set_value('loosung'); ?>" />
                                                <span class="text-danger"><?php echo form_error('loosung'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                                            <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="<?php echo $start; ?>" />
                                            <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="<?php echo $stop; ?>" />
                                        </div>
                                    </div>
                                </fieldset>
            <?php echo form_close(); ?>
                                <?php echo $this->session->flashdata('msg'); ?>


                            </div>                        
            <?php
        } else {
            echo
            '<div class="col-lg-5 text-left">
                    <p>Olete juba kandidaatide nimekirjas!</p>
                    <p>
                        <a class="btn btn-danger" href="' . site_url('sait/tyhistakand') . '">Kustuta</a>
                    </p>
                    </div>';
        }
    } else {
        echo '<p>Kandideerimiseks logi sisse </p>';
    }
}
?>


            </div>
        </div>
    </div>
</div>
<!-- /.container -->
