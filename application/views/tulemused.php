
<div class="container">
    <div class="row">
        <div class="box"> 
            <div class="col-sm-3 text-left">
                <h3><?php echo $results; ?></h3>
                <p><?php echo $totalvotes.": ".$kokku_haali ?></p>
                <div class="btn-group-vertical" role="group" aria-label="Vertical button group" id="list">
                    <a class="btn btn-default" id="koik" href="#"><?php echo $wholecountry; ?></a>
                    <div class="btn-group" role="group"> 
                        <button id="btnGroupVerticalDrop2" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $chooseregion; ?><span class="caret"></span> </button>
                        <ul class="dropdown-menu" id="piirkonnad" aria-labelledby="btnGroupVerticalDrop2">
                            	<?php
	                           foreach($piirkonnad as $k){
                                       	echo "<li><a href='#piirkond=".$k->Piirkond."'>".$k->Piirkond."</a></li> ";
                                    }
                                ?> 
                        </ul> 
                    </div> 
                    <div class="btn-group" role="group"> 
                        <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $chooseparty; ?><span class="caret"></span> </button>
                        <ul class="dropdown-menu" id = "erakonnad" aria-labelledby="btnGroupVerticalDrop3"> 
                            	<?php
	                           foreach($erakonnad as $k){
                                       	echo "<li><a href='#erakond=".$k->Erakond."'>".$k->Erakond."</a></li> ";
                                    }
                                ?> 
                        </ul> 
                    </div>
                </div>
            </div>
            <div class="col-sm-9 text-left" id="chart">
                <!--<h3>Tulemused</h3>-->

            </div>
            <div class="col-sm-12 text-left">
                <div class="panel panel-default"> 
                    <div class="panel-heading">
                        <div class="table-responsive">
                        <table id="tabel" class="table table-striped tablesorter">
                            <thead> 
                                <tr>
                                    <th><span class="glyphicon glyphicon-sort"></span><?php echo $number; ?></th> 
                                    <th><span class="glyphicon glyphicon-sort-by-alphabet"></span><?php echo $name; ?></th> 
                                    <th><span class="glyphicon glyphicon-sort-by-alphabet"></span><?php echo $party; ?></th> 
                                    <th><span class="glyphicon glyphicon-sort-by-alphabet"></span><?php echo $region; ?></th>
                                    <th><span class="glyphicon glyphicon-sort"></span><?php echo $votes_lang; ?></th>
                                </tr> 
                            </thead> 
                            <tbody class="searchable"> 
					<?php
	                           	foreach($kandidaadid as $k){
                                        	echo "<tr class=\"kandidaat\">";
                                        	echo "<td>".$k->Number."</td>";
                                        	echo "<td>".$k->Nimi."</td>";
	                                        echo "<td>".$k->Erakond."</td>";
        	                                echo "<td>".$k->Piirkond."</td>";
						if(array_key_exists($k->Number,$haaled)) {
	                	                        echo "<td id=\"$k->Number\">".$haaled[$k->Number]."</td>";
						} else {
						        echo "<td>0</td>";

						}
                        	                echo "</tr>";
                                	}
                                	?>       
				</tbody> 
                        </table> 
                        </div>
                    </div>

                </div>
            </div> 
        </div>
    </div>
</div>

<!-- /.container -->
