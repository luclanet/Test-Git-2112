<?php
class GitHub {

    public $base_url = "https://api.github.com";

    public function parseUrl($url) {
        $re = "/^(https|http):\\/\\/github.com\\/([a-zA-Z0-9\\-\\_]*)\\/([a-zA-Z0-9\\-\\_]*)(|\\/)$/";
        preg_match($re, $url, $matches);

        return array("owner" => $matches[2], "repo" => $matches[3]);
    }
    public function getCommits($owner, $repo) {
        return $this->_request("/repos/".$owner."/".$repo."/commits?per_page=1000");
    }
    public function getTopContributors($owner, $repo) {
        return array_reverse($this->_request("/repos/".$owner."/".$repo."/stats/contributors?per_page=100&order=asc&sort=total"));
    }
    public function getListBranches($owner, $repo) {
        return $this->_request("/repos/".$owner."/".$repo."/branches?per_page=100");
    }

    public function _request($url) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Test2112/1.0)");
        curl_setopt($ch, CURLOPT_URL, $this->base_url.$url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $response = curl_exec($ch);

        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == "200") {
            return json_decode($response, true);
        } else {
            return false;
        }
    }
}