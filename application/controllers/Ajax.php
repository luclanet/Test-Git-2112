<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller {

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
        echo "Nothing to see here";
    }
    public function ajax_last_commits() {
        $this->load->library("GitHub");
        $github_information = $this->github->parseUrl($this->input->json("url"));

        $this->toJson = $this->github->getCommits($github_information['owner'], $github_information['repo']);
        $this->output_json();
    }
    public function ajax_top_contributors() {
        $this->load->library("GitHub");
        $github_information = $this->github->parseUrl($this->input->json("url"));

        $this->toJson = $this->github->getTopContributors($github_information['owner'], $github_information['repo']);
        $this->output_json();
    }
    public function ajax_list_branches() {
        $this->load->library("GitHub");
        $github_information = $this->github->parseUrl($this->input->json("url"));

        $this->toJson = $this->github->getListBranches($github_information['owner'], $github_information['repo']);
        $this->output_json();
    }
}
