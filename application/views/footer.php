    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <span id="ajutine">sup<span><p><?php echo $footer_tekst;?></p>
                </div>
            </div>
        </div>
    </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url("assets/js/jquery-1.12.0.min.js"); ?>"><\/script>')</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script>$.fn.modal || document.write('<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"><\/script>')</script>
        <script>
            (function($) {
                $(function() {
                    if ($('body').css('color') !== 'rgb(51, 51, 51)') {
                        $('head').prepend('<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">');
                    }
                });
            })(window.jQuery);
        </script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.tablesorter.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/custom.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/ajaxRequest.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.countdown.min.js"); ?>"></script>
</body>

</html>
