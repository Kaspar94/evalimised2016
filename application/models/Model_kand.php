<?php
class Model_kand extends CI_Model {

	function __construct() {
		parent::__construct();
	}	

	public function getKandidaadid() {
		$query = "SELECT `Kandidaat`.`id` as Number,CONCAT(`Isik`.`eesnimi`,' ',`Isik`.`perenimi`) as Nimi,`Erakond`.`nimi` as Erakond,`Piirkond`.`nimi` as Piirkond,`Kandidaat`.`loosung` as Loosung FROM `Kandidaat` INNER JOIN `Erakond` ON `Kandidaat`.`fk_erakond` = `Erakond`.`id` INNER JOIN `Piirkond` ON `Kandidaat`.`fk_piirkond` = `Piirkond`.`id` INNER JOIN `Isik` ON `Kandidaat`.`fk_nimi` = `Isik`.`id`";
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
                if($uid == NULL){
                    $valikToIsik = "UPDATE Isik SET valik = NULL WHERE email = '$email'"; 
                }
                else{
                    $valikToIsik = "UPDATE Isik SET valik = '$uid' WHERE email = '$email'";     
                }
        	

        	$this->db->query($valikToIsik); 
        }
        public function eemaldaKandidaat($id){
            $this->db->query("DELETE FROM `Kandidaat` WHERE `Kandidaat`.`id` = '$id'");
        }
	public function insertKandidaat($loosung) {

		$query = "INSERT INTO `Kandidaat` (`fk_nimi`,`fk_erakond`,`fk_piirkond`,`loosung`,`haali`)
				VALUES ('$nimi','$erakond','$piirkond','$loosung','0')";

	}

        public function getUID($email){
            $query = "SELECT `Isik`.`id` as Id FROM `Isik` WHERE email = '$email'";
            $exec = $this->db->query($query);
            return $exec->result();
        }

	public function getVotes() {
		$query = "SELECT `Kandidaat`.`id`,COUNT(`Isik`.`valik`) as Haali FROM `Kandidaat`,`Isik` WHERE `Kandidaat`.`id` = `Isik`.`valik` GROUP BY `Kandidaat`.`id`";
		$exec = $this->db->query($query);
		return $exec->result();
	}
        public function getGivenVote($email) {
		$query = "SELECT `Isik`.`valik` as Valik FROM `Isik` WHERE email = '$email'";
		$exec = $this->db->query($query);
		return $exec->result();              
        }

	public function getKandidaatByUserID($userID) {
		$query = "SELECT `Kandidaat`.`id` FROM `Kandidaat` WHERE `Kandidaat`.`fk_nimi` = $userID";
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
