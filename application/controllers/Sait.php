<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sait extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('HybridAuthLib');
        $this->load->library('form_validation');
        $this->load->helper('form');
        //echo current_url() == "http://valimised16.cs.ut.ee/index.php/sait;
        $disabled = ["sisene", "login", "endpoint", "logout", "pollResponse","getVotesLive","est","eng"]; // urlid, mida ei salvestata
        if (!in_array($this->router->fetch_method(), $disabled)) {
            $this->session->set_userdata('last_page', $this->router->fetch_method()); // salvestab kylastatud lehe
        }
        
        $this->lang->load('navbar_lang',$this->session->userdata('language'));

	$this->data["candidates"] = $this->lang->line('candidates');
	$this->data["results"] = $this->lang->line('results');
	$this->data["votenow"] = $this->lang->line('votenow');
	$this->data["startcampaign"] = $this->lang->line('startcampaign');
	$this->data["lang"] = $this->session->userdata('language');
    }

    private function getHfData() {
        $hfData['footer_tekst'] = 'eValimised 2016';
        $hfData['page_title'] = 'eValimised 2016';
        return $hfData;
    }

    private function isLoggedIn() {
        $this->data['providers'] = $this->hybridauthlib->getProviders();
        foreach ($this->data['providers'] as $d) {
            if ($d['connected'] == 1) {
                return true;
            }
        }
    }

    private function getLoggedAcc() {
        $this->data['providers'] = $this->hybridauthlib->getProviders();
        foreach ($this->data['providers'] as $provider => $d) {
            if ($d['connected'] == 1) {
                return $provider;
            }
        }
    }

    private function getLoggedAccData() {
        $this->data['providers'] = $this->hybridauthlib->getProviders();
        foreach ($this->data['providers'] as $provider => $d) {
            if ($d['connected'] == 1) {
                $d['user_profile'] = $this->hybridauthlib->authenticate($provider)->getUserProfile();
                return $d;
            }
        }
    }

    private function hasVoted() {
        $this->load->model('model_kand');
        $userData = $this->getLoggedAccData();
        $email = $userData['user_profile']->email;
        $vote = $this->model_kand->getGivenVote($email);
        return $vote;
    }

    public function index() {
        $this->lang->load('main_lang',$this->session->userdata('language'));

	$this->data["timeleft"] = $this->lang->line('timeleft');
	$this->data["days"] = $this->lang->line('days');
	$this->data["hours"] = $this->lang->line('hours');
	$this->data["minutes"] = $this->lang->line('minutes');
	$this->data["seconds"] = $this->lang->line('seconds');

        $this->load->model('model_kand');
        $this->data['page_name'] = 'esileht';
        $this->data['on_logitud'] = $this->isLoggedIn();
        if ($this->isLoggedIn()) {
            $this->data['teenus'] = $this->getLoggedAcc();
            $this->data['isik'] = $this->getLoggedAccData();
        }
        $this->data['enddate'] = $this->model_kand->getEndDate()[0]->EndDate;
        $this->data['staatus'] = $this->model_kand->getStaatus()[0]->Staatus;
        $hfData = $this->getHfData();
        $hfData['page_title'] = $this->lang->line('title');
        $this->load->view('header', $hfData);
        $this->load->view('navbar', $this->data);
        $this->load->view('esileht', $this->data);
        $this->load->view('footer', $this->getHfData());
    }

    public function kandidaadid() {
	$this->lang->load('kandidaadid_lang',$this->session->userdata('language'));

	$this->data["search"] = $this->lang->line('search');
	$this->data["searchbar"] = $this->lang->line('searchbar');
	$this->data["number"] = $this->lang->line('number');
	$this->data["name"] = $this->lang->line('name');
	$this->data["party"] = $this->lang->line('party');
	$this->data["region"] = $this->lang->line('region');
	$this->data["slogan"] = $this->lang->line('slogan');

        $this->load->model('model_kand'); // load model
        $kandidaadid = $this->model_kand->getKandidaadid();
        $this->data['kandidaadid'] = $kandidaadid;
        $this->data['page_name'] = 'kandidaadid';
        $this->data['on_logitud'] = $this->isLoggedIn();
        if ($this->isLoggedIn()) {
            $this->data['teenus'] = $this->getLoggedAcc();
            $this->data['isik'] = $this->getLoggedAccData();
        }
        $hfData = $this->getHfData();
        $hfData['page_title'] = $this->lang->line('title');
        $this->load->view('header', $hfData);
        $this->load->view('navbar', $this->data);
        $this->load->view('kandidaadid', $this->data);
        $this->load->view('footer', $this->getHfData());
    }

    public function tulemused() {
	$this->lang->load('tulemused_lang',$this->session->userdata('language'));

	$this->data["totalvotes"] = $this->lang->line('totalvotes');
	$this->data["wholecountry"] = $this->lang->line('wholecountry');
	$this->data["chooseregion"] = $this->lang->line('chooseregion');
	$this->data["chosenregion"] = $this->lang->line('chosenregion');
	$this->data["totalregionvotes"] = $this->lang->line('totalregionvotes');
	$this->data["chooseparty"] = $this->lang->line('chooseparty');
	$this->data["chosenparty"] = $this->lang->line('chosenparty');
	$this->data["totalpartyvotes"] = $this->lang->line('totalpartyvotes');
	$this->data["results"] = $this->lang->line('results');
	$this->data["number"] = $this->lang->line('number');
	$this->data["name"] = $this->lang->line('name');
	$this->data["party"] = $this->lang->line('party');
	$this->data["region"] = $this->lang->line('region');
	$this->data["votes_lang"] = $this->lang->line('votes');




        $this->load->model('model_kand'); // load model
        $kandidaadid = $this->model_kand->getKandidaadid();
        $erakonnad = $this->model_kand->getErakonnad();
        $piirkonnad = $this->model_kand->getPiirkonnad();
        $haaled = $this->model_kand->getVotes();
        $votes = [];
        $tot_votes = 0;
        foreach ($haaled as $haal) {
            $votes[$haal->id] = $haal->Haali;
            $tot_votes += $haal->Haali;
        }
        $this->data['kokku_haali'] = $tot_votes;
        $this->data['haaled'] = $votes;
        $this->data['kandidaadid'] = $kandidaadid;
        $this->data['erakonnad'] = $erakonnad;
        $this->data['piirkonnad'] = $piirkonnad;

        $this->data['page_name'] = 'tulemused';
        $this->data['on_logitud'] = $this->isLoggedIn();
        if ($this->isLoggedIn()) {
            $this->data['teenus'] = $this->getLoggedAcc();
            $this->data['isik'] = $this->getLoggedAccData();
        }
        $hfData = $this->getHfData();
        $hfData['page_title'] = $this->lang->line('title');
        $this->load->view('header', $hfData);
        $this->load->view('navbar', $this->data);
        $this->load->view('tulemused');
        $this->load->view('footer', $this->getHfData());
    }

    public function haaleta() {

	$this->lang->load('haaleta_lang',$this->session->userdata('language'));

	$this->data["votenow"] = $this->lang->line('votenow');
	$this->data["logforvoting"] = $this->lang->line('logforvoting');
	$this->data["login"] = $this->lang->line('login');
	$this->data["insertnumber"] = $this->lang->line('insertnumber');

        $this->data['page_name'] = 'haaleta';
        $this->data['on_logitud'] = $this->isLoggedIn();
        $this->load->model('model_kand'); // load model
        $this->data['enddate'] = $this->model_kand->getEndDate()[0]->EndDate;
        $this->data['staatus'] = $this->model_kand->getStaatus()[0]->Staatus;
        if ($this->isLoggedIn()) {
            $this->data['teenus'] = $this->getLoggedAcc();
            $this->data['isik'] = $this->getLoggedAccData();
            $this->data['haal'] = $this->hasVoted();
        }
        $hfData = $this->getHfData();
        $hfData['page_title'] = $this->lang->line('title');
        $this->load->view('header', $hfData);
        $this->load->view('navbar', $this->data);
        $this->load->view('haaleta', $this->data);
        $this->load->view('footer', $this->getHfData());
    }

    public function tyhistahaal() {
        $this->load->model('model_kand'); // load model
        if ($this->isLoggedIn()) {
            if ($this->hasVoted()) {
                $this->model_kand->insertVote(NULL, $this->getLoggedAccData()['user_profile']->email);
            }
        }
        $this->haaleta();
    }

    public function tyhistakand() {
        $this->load->model('model_kand'); // load model
        if ($this->isLoggedIn()) {
            $this->data['isik'] = $this->getLoggedAccData();
            $email = $this->data['isik']['user_profile']->email;
            $kand = $this->model_kand->getKandidaatByUserID($this->model_kand->getUID($email)[0]->Id);
            if ($kand != null) {
                $this->model_kand->eemaldaKandidaat($kand[0]->id);
            }
        }
        $this->kandideeri();
    }

    public function kasutaja() {

	$this->lang->load('settings_lang',$this->session->userdata('language'));

	$this->data["settings"] = $this->lang->line('settings');
	$this->data["firstname"] = $this->lang->line('firstname');
	$this->data["lastname"] = $this->lang->line('lastname');
	$this->data["email"] = $this->lang->line('email');

        $this->data['page_name'] = 'kasutaja';
        $this->data['on_logitud'] = $this->isLoggedIn();
        $hfData = $this->getHfData();
        $hfData['page_title'] = $this->lang->line('title');
        $this->load->view('header', $hfData);
        $this->load->view('navbar', $this->data);
        if ($this->isLoggedIn()) {
            $this->data['teenus'] = $this->getLoggedAcc();
            $this->data['isik'] = $this->getLoggedAccData();
            $this->load->view('kasutaja', $this->data);
        } else {
            $this->load->view('login', $this->data);
        }
        $this->load->view('footer', $this->getHfData());
    }

    public function kandideeri() {

	$this->lang->load('kandideeri_lang',$this->session->userdata('language'));

	$this->data["party"] = $this->lang->line('party');
	$this->data["region"] = $this->lang->line('region');
	$this->data["slogan"] = $this->lang->line('slogan');
	$this->data["start"] = $this->lang->line('start');
	$this->data["stop"] = $this->lang->line('stop');
        $slogan_error = $this->lang->line('slogan_error');

        $this->data['page_name'] = 'kandideeri';
        $this->data['on_logitud'] = $this->isLoggedIn();
        $this->load->model('model_kand');
        $this->data['enddate'] = $this->model_kand->getEndDate()[0]->EndDate;
        $this->data['staatus'] = $this->model_kand->getStaatus()[0]->Staatus;
        $erakonnad = $this->model_kand->getErakonnad();
        $erakonnad_n = array();
        foreach ($erakonnad as $ek) {
            $erakonnad_n[] = $ek->Erakond;
        }
        $piirkonnad = $this->model_kand->getPiirkonnad();
        $piirkonnad_n = array();
        foreach ($piirkonnad as $ek) {
            $piirkonnad_n[] = $ek->Piirkond;
        }
        $this->data['erakonnad'] = $erakonnad_n;
        $this->data['piirkonnad'] = $piirkonnad_n;
        $hfData = $this->getHfData();
        $hfData['page_title'] = $this->lang->line('title');
        $this->load->view('header', $hfData);
        $this->load->view('navbar', $this->data);
        if ($this->isLoggedIn()) {
            $this->data['teenus'] = $this->getLoggedAcc();
            $this->data['isik'] = $this->getLoggedAccData();
            $email = $this->data['isik']['user_profile']->email;
            $kand = $this->model_kand->getKandidaatByUserID($this->model_kand->getUID($email)[0]->Id);
            $this->data['kandideerib'] = false;
            if ($kand != null) {
                $this->data['kandideerib'] = true;
            }
            $this->form_validation->set_rules('piirkond', 'Piirkond', 'callback_combo_check');
            $this->form_validation->set_rules('erakond', 'Erakond', 'callback_combo_check');
            $this->form_validation->set_rules('loosung', 'lang:slogan', 'required|max_length[64]|callback_slogan_error['.$slogan_error.']');
            if ($this->form_validation->run() == FALSE) {
                //fail validation
                $this->load->view('kandideeri', $this->data);
            } else {
                //pass validation
                $erakond = $this->input->post('erakond');
                $piirkond = $this->input->post('piirkond');
                foreach ($piirkonnad as $pk) {
                    if ($pk->Piirkond == $piirkond) {
                        $piirkond = $pk->Id;
                    }
                }
                foreach ($erakonnad as $pk) {
                    if ($pk->Erakond == $erakond) {
                        $erakond = $pk->Id;
                    }
                }
                $email = $this->getLoggedAccData()['user_profile']->email;
                $this->data = array(
                    'fk_nimi' => $this->model_kand->getUID($email)[0]->Id,
                    'fk_erakond' => $erakond,
                    'fk_piirkond' => $piirkond,
                    'loosung' => $this->input->post('loosung')
                );

                //insert the form data into database
                $this->db->insert('Kandidaat', $this->data);

                //display success message
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Kandideerimine õnnestus!</div>');
                redirect('sait/kandideeri');
            }
        } else {
            $this->load->view('login', $this->data);
        }

        $this->load->view('footer', $this->getHfData());
    }
    public function slogan_error($slogan_error)
    {
        $this->form_validation->set_message('slogan_error', $slogan_error);
        return false;
    }
    public function sisene() {

	$this->lang->load('sisene_lang',$this->session->userdata('language'));

	$this->data["login"] = $this->lang->line('login');
	$this->data["loginfb"] = $this->lang->line('loginfb');
	$this->data["logingoogle"] = $this->lang->line('logingoogle');

        $this->data['page_name'] = 'login';
        $this->data['on_logitud'] = $this->isLoggedIn();
        $hfData = $this->getHfData();
        $hfData['page_title'] = $this->lang->line('title');
        $this->load->view('header', $hfData);
        $this->load->view('navbar', $this->data);
        if ($this->isLoggedIn()) {
            $this->data['teenus'] = $this->getLoggedAcc();
            $this->data['isik'] = $this->getLoggedAccData();
            $this->load->view('kasutaja', $this->data);
        } else {
            $this->load->view('login', $this->data);
        }
        $this->load->view('footer', $this->getHfData());
        //$this->load->view('kasutaja/home', $this->data);
    }

    function combo_check($str) {
        if ($str == 'Vali..') {
            $this->form_validation->set_message('combo_check', '%s on valimata!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function haal() { // haale andmine
        $post_data = $this->input->post('haaletus'); // id, kellele haal anti

        if ($this->isLoggedIn()) { // kerge turvakontroll
            if (preg_match('/^[0-9]+$/', $post_data)) { // kontrollime, et post inf oleks number
                $userData = $this->getLoggedAccData();
                $email = $userData['user_profile']->email;
                $this->load->model('model_kand'); // load model
                $this->model_kand->insertVote($post_data, $email);
            } else {
                echo "not_number:'" . $post_data . "'";
                // midagi teha
            }
        } else {
            header("HTTP/1.1 401 Unauthorized");
            exit;
        }
    }

    public function getVotesLive() {
	$this->load->model('model_kand');
	$haaled = $this->model_kand->getVotes();
	$kandidaadid = $this->model_kand->getKandidaadid();
	$votes = array();

	
	foreach($haaled as $haal) {
	    $votes[$haal->id] = $haal->Haali;
	}
	foreach($kandidaadid as $kand) {
		$kand->votes = 0;
		if(array_key_exists($kand->Number,$votes)) {
			$kand->votes = $votes[$kand->Number];
		}
		$votes[$kand->Number] = $kand;
	}
        $a = str_replace("[", "", json_encode($votes));
        $b = str_replace("]", "", $a);
        echo $b;

    }

    public function ajaxResponse() { // naitab kandidaati kes vastab numbrile
        $id = $_GET['q'];
        if (preg_match('/^[0-9]+$/', $id)) { // make sure id is number
            $this->load->model('model_kand'); // load model
            $kandidaadid = $this->model_kand->getKandidaatById($id);
            $a = str_replace("[", "", json_encode($kandidaadid));
            $b = str_replace("]", "", $a);
            echo $b;
        }
    }

    private function checkUser($user) { // kontrollib, kas kasutaja andmebaasis olemas. kui pole, ss lisab
        $this->load->model('model_kand');
        $user_exists = $this->model_kand->checkUser($user->email, $user->firstName, $user->lastName); // kontrollib, kas email eksisteerib andmebaasis. (email peaks unikaalne olema)
        return $user_exists;
    }

    public function pollResponse() {
        $userData = $this->getLoggedAccData();
        if ($this->isLoggedIn()) {
            $email = $userData['user_profile']->email;

            $this->load->model('model_kand'); // load model
            $votes = $this->model_kand->getVotes();
            $userID = $this->model_kand->getKandidaatByUserID($this->model_kand->getUID($email)[0]->Id);
            if ($userID == null) {
                echo "";
                return;
            }
            foreach ($votes as $vote) {
                if ($vote->id == $userID[0]->id) {
                    echo "Hääli: " . $vote->Haali;
                }
            }
        }
    }

    public function login($provider) {
        log_message('debug', "controllers.HAuth.login($provider) called");

        try {
            log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');
            $this->load->library('HybridAuthLib');

            if ($this->hybridauthlib->providerEnabled($provider)) {
                log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
                $service = $this->hybridauthlib->authenticate($provider);

                if ($service->isUserConnected()) {


                    log_message('debug', 'controller.HAuth.login: user authenticated.');

                    $user_profile = $service->getUserProfile();

                    log_message('info', 'controllers.HAuth.login: user profile:' . PHP_EOL . print_r($user_profile, TRUE));

                    $this->data['user_profile'] = $user_profile;

                    $ret = $this->checkUser($this->data['user_profile']);
                    if ($ret == 1) {  // kasutaja eksisteerib
                        //$this->index();
                    }
                    if ($this->session->userdata('last_page')) {
                        $this->load->helper('url');
                        $last = $this->session->userdata('last_page');
                        redirect("sait/$last", 'refresh');
                    } else {
                        $this->index();
                    }
                } else { // Cannot authenticate user
                    show_error('Cannot authenticate user');
                }
            } else { // This service is not enabled.
                log_message('error', 'controllers.HAuth.login: This provider is not enabled (' . $provider . ')');
                show_404($_SERVER['REQUEST_URI']);
            }
        } catch (Exception $e) {
            $error = 'Unexpected error';
            switch ($e->getCode()) {
                case 0 : $error = 'Unspecified error.';
                    break;
                case 1 : $error = 'Hybriauth configuration error.';
                    break;
                case 2 : $error = 'Provider not properly configured.';
                    break;
                case 3 : $error = 'Unknown or disabled provider.';
                    break;
                case 4 : $error = 'Missing provider application credentials.';
                    break;
                case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
//redirect();
                    if (isset($service)) {
                        log_message('debug', 'controllers.HAuth.login: logging out from service.');
                        $service->logout();
                    }
                    show_error('User has cancelled the authentication or the provider refused the connection.');
                    break;
                case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
                    break;
                case 7 : $error = 'User not connected to the provider.';
                    break;
            }

            if (isset($service)) {
                $service->logout();
            }

            log_message('error', 'controllers.HAuth.login: ' . $error);
            show_error('Error authenticating user.');
        }
    }

    public function logout() {
        $this->hybridauthlib->logoutAllProviders();
        $this->index();
    }

    public function eng() {
	$this->session->set_userdata('language', 'english');	
                    if ($this->session->userdata('last_page')) {
                        $this->load->helper('url');
                        $last = $this->session->userdata('last_page');
                        redirect("sait/$last");
                    } else {
                        $this->index();
                    }


    }

    public function est() {
	$this->session->set_userdata('language', 'estonia');	

                    if ($this->session->userdata('last_page')) {
                        $this->load->helper('url');
                        $last = $this->session->userdata('last_page');
                        redirect("sait/$last");
                    } else {
                        $this->index();
                    }

    }

    public function endpoint() {

        log_message('debug', 'controllers.HAuth.endpoint called.');
        log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: ' . print_r($_REQUEST, TRUE));

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
            $_GET = $_REQUEST;
        }

        log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
        require_once APPPATH . 'third_party/hybridauth/index.php';
    }

}
