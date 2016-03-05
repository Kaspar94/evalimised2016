<?php
class Model_kand extends CI_Model {

	function __construct() {
		parent::__construct();
	}	

	public function getKandidaadid() {
		$query = "SELECT `Kandidaat`.`id` as Number,`Isik`.`eesnimi` as Nimi,`Erakond`.`nimi` as Erakond,`Piirkond`.`nimi` as Piirkond,`Kandidaat`.`loosung` as Loosung FROM `Kandidaat` INNER JOIN `Erakond` ON `Kandidaat`.`fk_erakond` = `Erakond`.`id` INNER JOIN `Piirkond` ON `Kandidaat`.`fk_piirkond` = `Piirkond`.`id` INNER JOIN `Isik` ON `Kandidaat`.`fk_nimi` = `Isik`.`id`";
		$exec = $this->db->query($query);
		return $exec->result();
	}
}
?>
