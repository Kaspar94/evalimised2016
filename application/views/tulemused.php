
<div class="container">
    <div class="row">
        <div class="box"> 
            <div class="col-sm-3 text-left">
                <h3>Tulemused</h3>
                <p>Kokku hääli: 9001</p>
                <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                    <button type="button" class="btn btn-default" id="koik">Kogu riigis</button>
                    <div class="btn-group" role="group"> 
                        <button id="btnGroupVerticalDrop2" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vali piirkond<span class="caret"></span> </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2" id="list">
                            	<?php
	                           foreach($piirkonnad as $k){
                                       	echo "<li><a href='#'>".$k->Piirkond."</a></li> ";
                                    }
                                ?> 
                        </ul> 
                    </div> 
                    <div class="btn-group" role="group"> 
                        <button id="btnGroupVerticalDrop3" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vali erakond<span class="caret"></span> </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3" id="list"> 
                            	<?php
	                           foreach($erakonnad as $k){
                                       	echo "<li id='list'><a href='#'>".$k->Erakond."</a></li> ";
                                    }
                                ?> 
                        </ul> 
                    </div>
                </div>
            </div>
            <div class="col-sm-9 text-left">
                <h3>Tulemused</h3>
                    <?php
                        $i = true;
	                foreach($erakonnad as $k){ 
                            if($i){
                                $i = false;
                                $color = 'success';
                            }
                            else{
                                $i = true;
                                $color = 'warning';
                            }
                                ?>
                                <div class="progress">
                                    <div class="progress-bar <?php echo 'progress-bar-'.$color.'" id="'.$k->Erakond?>" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <div class="text-left"><?php echo $k->Erakond; ?></div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?> 
            </div>
            <div class="col-sm-12 text-left">
                <div class="panel panel-default"> 
                    <div class="panel-heading">
                        <div class="table-responsive">
                        <table id="tabel" class="table table-striped tablesorter">
                            <thead> 
                                <tr>
                                    <th> <span class="glyphicon glyphicon-sort"></span>Number</th> 
                                    <th> <span class="glyphicon glyphicon-sort-by-alphabet"></span>Nimi</th> 
                                    <th><span class="glyphicon glyphicon-sort-by-alphabet"></span>Erakond</th> 
                                    <th><span class="glyphicon glyphicon-sort-by-alphabet"></span>Piirkond</th>
                                    <th><span class="glyphicon glyphicon-sort"></span>Hääli</th>
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
						if(array_key_exists($k->Number,$haaled)) {
	                	                        echo "<td>".$haaled[$k->Number]."</td>";
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
