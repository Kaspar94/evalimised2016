
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3>Kandideeri</h3>
                <?php
                if ($on_logitud) {
                    if ($kandideerib == null) {
                        ?>
                        <div class="col-lg-5 text-left">
                            <?php
                            $attributes = array("class" => "form-horizontal", "id" => "kandideeri", "name" => "kandideeri");
                            echo form_open("sait/kandideeri", $attributes);
                            ?>
                            <fieldset>

                                <p><strong>Eesnimi:</strong> <?php echo $isik['user_profile']->firstName ?></p>
                                <p><strong>Perenimi:</strong> <?php echo $isik['user_profile']->lastName ?></p>
                                <div class="form-group">
                                    <div class="row colbox">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="piirkond" class="control-label">Piirkond</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">

                                            <?php
                                            $attributes = 'class = "form-control" id = "piirkond"';
                                            echo form_dropdown('piirkonnad', $piirkonnad, set_value('piirkond'), $attributes);
                                            ?>
                                            <span class="text-danger"><?php echo form_error('piirkond'); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row colbox">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="erakond" class="control-label">Erakond</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">

        <?php
        $attributes = 'class = "form-control" id = "erakond"';
        echo form_dropdown('erakonnad', $erakonnad, set_value('erakond'), $attributes);
        ?>

                                            <span class="text-danger"><?php echo form_error('erakond'); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row colbox">
                                        <div class="col-lg-4 col-sm-4">
                                            <label for="loosung" class="control-label">Loosung</label>
                                        </div>
                                        <div class="col-lg-8 col-sm-8">
                                            <input id="loosung" name="loosung" placeholder="loosung" type="text" class="form-control" value="<?php echo set_value('loosung'); ?>" />
                                            <span class="text-danger"><?php echo form_error('loosung'); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                                        <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Insert" />
                                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Cancel" />
                                    </div>
                                </div>
                            </fieldset>
                        <?php echo form_close(); ?>
                        <?php echo $this->session->flashdata('msg'); ?>


                        </div>                        
                    <?php
                    } else {
                        echo
                        '<div class="col-lg-5 text-center">
                    <p>Oled juba kandidaatide nimekirjas</p>
                    </div>';
                    }
                } else {
                    echo '<p>Kandideerimiseks logi sisse </p>';
                }
                ?>


            </div>
        </div>
    </div>
</div>
<!-- /.container -->
