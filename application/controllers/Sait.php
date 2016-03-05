<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sait extends CI_Controller {
	
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct() {
		parent::__construct();
	}	

        private function getHfData(){
            $hfData['footer_tekst'] = 'eValimised 2016';
            $hfData['page_title'] = 'eValimised 2016';
            return $hfData;
        }
	public function index() {

            $data['page_name'] = 'esileht';
            $this->load->view('header', $this->getHfData());
            $this->load->view('navbar', $data);
            $this->load->view('esileht', $data);
            $this->load->view('footer', $this->getHfData());
	}
        public function kandidaadid() {
		$this->load->model('model_kand'); // load model
		$kandidaadid = $this->model_kand->getKandidaadid();
		$data['kandidaadid'] = $kandidaadid;		

        	$data['page_name'] = 'kandidaadid';
		$this->load->view('header',$this->getHfData());
		$this->load->view('navbar', $data);
		$this->load->view('kandidaadid', $data);
		$this->load->view('footer',$this->getHfData());
        }
        public function tulemused() {
            $data['page_name'] = 'tulemused';
            $this->load->view('header',$this->getHfData());
            $this->load->view('navbar', $data);
            $this->load->view('tulemused');
            $this->load->view('footer',$this->getHfData());
        }
        public function anna_haal() {
            $data['page_name'] = 'anna_haal';
            $this->load->view('header',$this->getHfData());
            $this->load->view('navbar', $data);
            $this->load->view('anna_haal',$data);
            $this->load->view('footer',$this->getHfData());
        }
}
