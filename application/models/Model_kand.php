<?php
class Model_kand extends CI_Model {

	function __construct() {
		parent::__construct();
	}	

	public function getKandidaadid() {
		$query = "SELECT `Kandidaat`.`id` as Number,CONCAT(`Isik`.`eesnimi`,' ',`Isik`.`perenimi`) as Nimi,`Erakond`.`nimi` as Erakond,`Piirkond`.`nimi` as Piirkond,`Kandidaat`.`loosung` as Loosung,`Kandidaat`.`haali` as Haali FROM `Kandidaat` INNER JOIN `Erakond` ON `Kandidaat`.`fk_erakond` = `Erakond`.`id` INNER JOIN `Piirkond` ON `Kandidaat`.`fk_piirkond` = `Piirkond`.`id` INNER JOIN `Isik` ON `Kandidaat`.`fk_nimi` = `Isik`.`id`";
		$exec = $this->db->query($query);
		return $exec->result();
	}
        public function getErakonnad() {
 		$query = "SELECT `Erakond`.`id` as Id,`Erakond`.`nimi` as Erakond FROM `Erakond`";
		$exec = $this->db->query($query);
		return $exec->result();           
        }
        public function getPiirkonnad() {
 		$query = "SELECT `Piirkond`.`id` as Id,`Piirkond`.`nimi` as Piirkond FROM `Piirkond`";
		$exec = $this->db->query($query);
		return $exec->result();           
        }
        public function insertVote($uid, $email){
        	$valikToIsik = "UPDATE Isik SET valik = '$uid' WHERE email = '$email'"; 

        	$this->db->query($valikToIsik);
	        $this->db->query($voteIncrement);
        }

	public function getVotes() {
		$query = "SELECT `Kandidaat`.`id`,COUNT(`Isik`.`valik`) as Haali FROM `Kandidaat`,`Isik` WHERE `Kandidaat`.`id` = `Isik`.`valik` GROUP BY `Kandidaat`.`id`";
		$exec = $this->db->query($query);
		return $exec->result();
	}


	public function getKandidaatById($id) {
		$query = "SELECT `Kandidaat`.`id` as Number,CONCAT(`Isik`.`eesnimi`,' ',`Isik`.`perenimi`) as Nimi,`Erakond`.`nimi` as Erakond,`Piirkond`.`nimi` as Piirkond FROM `Kandidaat` INNER JOIN `Erakond` ON `Kandidaat`.`fk_erakond` = `Erakond`.`id` INNER JOIN `Piirkond` ON `Kandidaat`.`fk_piirkond` = `Piirkond`.`id` INNER JOIN `Isik` ON `Kandidaat`.`fk_nimi` = `Isik`.`id` WHERE `Kandidaat`.`id`=$id";
		$exec = $this->db->query($query);
		return $exec->result();

	}

	public function checkUser($email,$firstName,$lastName) {
		$query = "SELECT EXISTS(SELECT `Isik`.`id` FROM `Isik` WHERE `Isik`.`email` = '$email') as count";
  		$exec = $this->db->query($query);
		$row = $exec->row();
		if($row->count < 1) {
			$query = "INSERT INTO `Isik` (email,eesnimi,perenimi,piirkond) VALUES ('$email','$firstName','$lastName','1')";
			$exec = $this->db->query($query);
			return 0;
		}
		return 1;
	}
}
?>
