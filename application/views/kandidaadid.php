
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3><?php echo $candidates; ?></h3>
                <div class="panel panel-default"> 
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="otsi"><?php echo $search; ?></span>
                                    <input id="otsing" type="text" class="form-control" placeholder="<?php echo $searchbar; ?>">

                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div>
                        <div class="table-responsive">
                        <table id="tabel" class="table table-filtred tablesorter">
                            <thead> 
                                <tr>
                                    <th> <span class="glyphicon glyphicon-sort"></span><?php echo $number; ?></th> 
                                    <th> <span class="glyphicon glyphicon-sort-by-alphabet"></span><?php echo $name; ?></th> 
                                    <th><span class="glyphicon glyphicon-sort-by-alphabet"></span><?php echo $party; ?></th> 
                                    <th><span class="glyphicon glyphicon-sort-by-alphabet"></span><?php echo $region; ?></th>
                                    <th><span class="glyphicon glyphicon-sort-by-alphabet"></span><?php echo $slogan; ?></th> 
                                </tr> 
                            </thead> 
                            <tbody class="searchable">
				<?php
				foreach($kandidaadid as $k){
					echo "<tr>";
					echo "<th scope=\"row\">".$k->Number."</th>";
					echo "<td>".$k->Nimi."</td>";
					echo "<td>".$k->Erakond."</td>";
					echo "<td>".$k->Piirkond."</td>";
					echo "<td>".$k->Loosung."</td>";
					echo "</tr>";
				}
				?>	 
                            </tbody> 
                        </table>
                        </div>
                    </div>
                    <script>

                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container -->
