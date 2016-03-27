
<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-left">
                <h3>Anna hääl</h3>
                <?php if($on_logitud){
                    echo
                    '<div class="col-lg-5 text-left">
                    <div class="input-group">
		    <form id="haal">
                        <input type="text" name="haaleta" class="form-control" placeholder="Sisesta number" onkeyup="showKandidaat(this.value)" />
			<span class="input-group-btn">
			    <input class="btn btn-default" type="submit" value="Hääleta!" />
                    	</span>
			<div id="spinner"></div>

		    </form>
                    <div id="kandB"></div>
                    </div>
                    </div>';
                }
                else{
                    echo '<p>Hääletamiseks logi sisse </p>';
                } ?>


            </div>
        </div>
    </div>
</div>
<!-- /.container -->
