<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msg extends CI_Controller {

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
                $this->load->helper('form');
                $this->load->helper('url');
               
		$this->load->view('welcome_message');
	}
        
        public function send()
	{
                $this->load->helper('form');
                $this->load->helper('url');
                $this->load->library('PHPRequests');
                $this->load->helper('string');
                $this->load->library('encryption');
                $this->load->model('link2ipfs');
                $this->load->database();
                
                $msg = $this->input->post('message');
                
                $link = random_string('alnum', 3);
                
                $this->encryption->initialize(
                        array(
                                'cipher' => 'aes-256',
                                'mode' => 'ctr',
                                'key' => md5($link)
                        )
                );
                
                $url='http://172.16.32.7:5001/api/v0/add';
                
                $cipher = $this->encryption->encrypt($msg);
                
                $execRes=shell_exec('/usr/bin/printf "'.$cipher.'" > /tmp/web/data.buff');
                $execRes=shell_exec("/usr/local/bin/curl -F file=@/tmp/web/data.buff $url");
                
                $answer=json_decode($execRes);
                
                $hash=$answer->Hash;
                
                $this->link2ipfs->setLink(md5($link), $this->encryption->encrypt($hash));
                
                $pageData = array (
                   'link' => $link,  
                   'hash' => $hash
                );
                  
                
		$this->load->view('write', $pageData);
	}
        
        public function r()
	{
                $this->load->helper('form');
                $this->load->helper('url');
                $this->load->library('PHPRequests');
                $this->load->helper('string');
                $this->load->library('encryption');
                $this->load->model('link2ipfs');
                $this->load->database();
                
                
                $link = $this->uri->segment(3);
                
                $this->encryption->initialize(
                        array(
                                'cipher' => 'aes-256',
                                'mode' => 'ctr',
                                'key' => md5($link)
                        )
                );
                
                $linkHash=$this->link2ipfs->getLink(md5($link));
                
                $hash=$this->encryption->decrypt($linkHash[0]->hash);
                
                $response = Requests::get('http://172.16.32.7:8080/ipfs/'.$hash);
                $cipher=$response->body;
                
                $msg=$this->encryption->decrypt($cipher);
                
                $pageData = array (
                   'msg' => $msg,  
                   'hash' => $hash
                );
                  
                
		$this->load->view('read', $pageData);
	}
}
