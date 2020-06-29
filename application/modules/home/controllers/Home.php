<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Home_model');
	}

	public function index()
	{
		$data = $this->caching_lib->get('home');
		if (empty($data->slideshow)) {
			$data = [];
			$data['slideshow'] = $this -> Home_model -> __get_slideshow();
			$data['products'] = $this -> Home_model -> __get_products();
			$this->cache->memcached->save('home', json_encode($data), 3600 * 24);
		}

		$this->load->view('home', $data);
	}

	function overview($type,$id) {
		$body = '<div style="text-align:center;">';
		if ($type == 1) {
			$data = $this->caching_lib->delete('home:product:detail:' . $id);
			$data = $this->caching_lib->get('home:product:detail:' . $id);
			if (empty($detail[0]->gfile)) {
				$detail = $this -> Home_model -> __get_products_detail($id);
				$body .= '<img src="'.__get_upload_file($detail[0] -> gfile,2).'" style="min-width: 600px">';
				$this->cache->memcached->save('home:product:detail:' . $id, json_encode($detail), 3600 * 24);
			}
			else {
				$body .= '<img src="'.__get_upload_file($detail[0] -> gfile,2).'" style="min-width: 600px">';
			}
		}
		else if ($type == 2) {
			$body .= '<iframe width="800" height="500" src="https://www.youtube.com/embed/'.$id.'?controls=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		}
		else {
            $instagramFile = FCPATH . 'application/tmp/instagram.json';
            if (file_exists($instagramFile)) :
                $dataInstagram = json_decode(file_get_contents($instagramFile), true);
                if (!empty($dataInstagram['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'])) :
                    $dataInstagram = array_slice($dataInstagram['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'], 0, 5);
					$body .= '<img src="'.$dataInstagram[$id]['node']['display_url'].'" style="min-width: 600px">';
            	endif;
            endif;
		}
		$body .= '</div>';
		echo $body;
		die;
	}
}
