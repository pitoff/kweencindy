<?php
	class Pages extends Controller{
		public function __construct(){
			$this->PostModel = $this->model('Post');
		}

		public function index(){

			$this->view('pages/index');
		}

		public function about(){
			$data = [
				'title' => 'welcome to about',
				'intro' => 'Hello I\'m cynthia CEO of BBKC, (BeatsByKweenCindy)',
				'offer_heading' => 'Our Services'
			];

			$this->view('pages/about', $data);
		}

		public function pricing(){
			$getPricing = $this->PostModel->getPricing();
			$data = [
				'pricing' => $getPricing
			];
			$this->view('pages/pricing', $data);
		}

		public function contact(){
			$this->view('pages/contact');
		}

	}