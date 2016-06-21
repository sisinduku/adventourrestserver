<?php
require APPPATH . '/libraries/REST_Controller.php';

class TravelJournal_Rest extends REST_Controller {
	function __construct(){
		parent::__construct();
	}
	
	/**
	 * Rest Get resource TravelJournal
	 * Data yang didapatkan
	 * $id_traveljournal, $id_user, $id_layout, $orign, $date_orign, $destination, $date_return, $link_gambar, $date_created, $time_stamp, $last_ip, 
	 * $last_location, $last_location_x, $last_location_y, $total_budget
	 */
	public function travelJournals_get(){
		$this->load->model('TravelJournal_Model');
		
		$travelJournals = $this->TravelJournal_Model->getTravelJournal();
		$result = array();
		foreach ($travelJournals as $row){
			array_push($result, $row->get_traveljournal());
		}
		
		if ($result)
		{
			// Set the response and exit
			$this->response($result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
					'status' => FALSE,
					'message' => 'No TravelJournals were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
	}
	
	/**
	 * REST Post TravelJournal
	 * Yang perlu di-post adalah:
	 * id_user, id_layout, orign, date_orign, destination, date_return, gambar(base64), nama_gambar(beserta ekstensi), last_ip
	 * OPTIONAL : lokasi_x dan lokasi_y
	 */
	public function travelJournals_post()
	{
        $this->load->model('TravelJournal_Model');
        
        $id_user = $this->post('id_user');
		$id_layout = $this->post('id_layout');
		$orign = $this->post('orign');
		$date_orign = $this->post('date_orign');
		$destination = $this->post('destination');
		$date_return = $this->post('date_return');
		$gambar = $this->post('gambar');
		$nama_gambar = $this->post('nama_gambar');
		$last_ip = $this->post('last_ip');
		$last_location_x = $this->post('last_location_x');
		$last_location_y = $this->post('last_location_y');
		
        $result = $this->TravelJournal_Model->setTravelJournal($id_user, $id_layout, $orign, $date_orign, $destination, $date_return, $gambar, $nama_gambar, $last_ip, $last_location_x, $last_location_y);
        
        if($result == 1){	
        	$this->set_response(array('message'=>$result), REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }
        else{
        	$this->set_response(array('message'=>$result), 404);
        }

    }
}