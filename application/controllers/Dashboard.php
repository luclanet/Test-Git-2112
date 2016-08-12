<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

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
    public function index()
    {
        $this->load->view('dashboard/index', $this->toView);
    }
    public function last_commits()
    {
        $this->load->view('dashboard/last_commits', $this->toView);
    }
    public function top_contributors()
    {
        $this->load->view('dashboard/top_contributors', $this->toView);
    }
    public function list_branches()
    {
        $this->load->view('dashboard/list_branches', $this->toView);
    }
}
