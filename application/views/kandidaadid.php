
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3>Kandidaadid</h3>
                <div class="panel panel-default"> 
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="otsi">Otsing</span>
                                    <input id="otsing" type="text" class="form-control" placeholder="Sisesta nimi/number/erakond/piirkond...">

                                </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                        </div>
                        <div class="table-responsive">
                        <table id="tabel" class="table table-filtred tablesorter">
                            <thead> 
                                <tr>
                                    <th> <span class="glyphicon glyphicon-sort"></span>Number</th> 
                                    <th> <span class="glyphicon glyphicon-sort-by-alphabet"></span>Nimi</th> 
                                    <th><span class="glyphicon glyphicon-sort-by-alphabet"></span>Erakond</th> 
                                    <th><span class="glyphicon glyphicon-sort-by-alphabet"></span>Piirkond</th>
                                    <th><span class="glyphicon glyphicon-sort-by-alphabet"></span>Loosung</th> 
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
