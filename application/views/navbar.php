<body>
    <div class="container" id="title">
	<div class="title">eValimised '16</div>
    </div>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">eValimised'16</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php echo ($page_name == 'esileht'?'class="active"':'')?> >
                <a href="<?php echo site_url('sait'); ?>"><div id="glyph" class="glyphicon glyphicon-home" aria-hidden="true"></div></a>
                </li>
                <li <?php echo ($page_name == 'kandidaadid'?'class="active"':'')?>>
                    <a href="<?php echo site_url('sait/kandidaadid'); ?>">Kandidaadid</a>
                </li>
                <li <?php echo ($page_name == 'tulemused'?'class="active"':'')?>>
                    <a href="<?php echo site_url('sait/tulemused'); ?>">Tulemused</a>
                </li>
                <li <?php echo ($page_name == 'anna_haal'?'class="active"':'')?>>
                    <a href="<?php echo site_url('sait/anna_haal'); ?>">Anna hääl</a>
                </li>
            </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>