<?php
if(!DEFINED('BASEPATH'))
	exit('<h1>Error 403</h1><p>Acceso restringido</p>');
	
class News extends CI_Controller{

	//URL del sitio (configuraci�n)
	public $site_url;
	public $css_path; //css
	public $js_path; //js
	public $images_path; //images
	public $flash_path; //flash
	public $content_path; //content
	
	public function __construct(){
		parent::__construct();
		$this->site_url = $this->config->item('base_url');
		$this->css_path = $this->site_url."static/css/";
		$this->js_path = $this->site_url."static/js/";
		$this->images_path = $this->site_url."static/images/";
		$this->content_path = $this->site_url."static/content/";
		$this->flash_path = $this->site_url."static/flash/";
		
		$this->load->Model('news_model');
		
	}
	
	public function index(){
		$info['base_url'] = $this->site_url;
		$info['css_path'] = $this->css_path;
		$info['js_path'] = $this->js_path;
		$info['images_path'] = $this->images_path;
		$info['flash_path'] = $this->flash_path;
		$info['content_path'] = $this->content_path;
		$info['site_title'] = $this->config->item('site_title');
		
		$info['news'] = $this->news_model->general_news();
		$info['date_news'] = $this->news_model->date_news();
		$info['load_date'] = $this->load->helper('date');
		
		$this->load->view('global/head', $info);
		$this->load->view('news', $info);
		$this->load->view('global/footer', $info);
	}
	
	public function page($id = 0){
		echo $id;
	}
	
	public function news($id = 0, $mensaje = "")
	{
		$this->load->view('view-news');
	}
	
}
?>