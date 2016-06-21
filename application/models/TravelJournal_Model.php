<?php
/**
 * Data Akses Obyek TravelJournal
 * @author Ketampanan
 *
 */
class TravelJournal_Model extends CI_Model {
	
	/**
	 * Mengambil semua data TravelJournal
	 */
	public function getTravelJournal() {
		$this->load->library('TravelJournal');
		
		$query = $this->db->query("SELECT trav.id_traveljournal, trav.id_user, trav.id_layout, trav.orign, 
				trav.date_orign, trav.destination, trav.date_return, trav.link_gambar, trav.date_created, trav.time_stamp, trav.last_ip, 
				x(trav.last_location) AS last_location_x, y(trav.last_location) AS last_location_y, act.total_budget 
				FROM tbl_traveljournal trav LEFT JOIN 
					(SELECT id_traveljournal, SUM(budget) AS total_budget FROM tbl_activities GROUP BY id_traveljournal) 
				as act ON trav.id_traveljournal = act.id_traveljournal ");
		
		return $query->result('TravelJournal');
	}
	
	/**
	 * Model Data Access Control TravelJournal
	 * @param unknown $id_user
	 * @param unknown $id_layout
	 * @param unknown $orign
	 * @param unknown $date_orign
	 * @param unknown $destination
	 * @param unknown $date_return
	 * @param unknown $gambar
	 * @param unknown $tipe_gambar
	 * @param unknown $last_ip
	 * @param unknown $last_location_x
	 * @param unknown $last_location_y
	 * @return string
	 */
	public function setTravelJournal($id_user, $id_layout, $orign, $date_orign, $destination, $date_return, $gambar, $tipe_gambar, $last_ip, $last_location_x, $last_location_y){
		$this->load->library('TravelJournal');
		
		$travelJournal = new TravelJournal;
		$travelJournal->set_traveljournal($id_user, $id_layout, $orign, $date_orign, $destination, $date_return, $tipe_gambar, $last_ip, $last_location_x, $last_location_y);
		
		$data = array(
				'id_traveljournal' => $travelJournal->get_id_traveljournal(),
				'id_user' => $travelJournal->get_id_user(),
				'id_layout' => $travelJournal->get_id_layout(),
				'orign' => $travelJournal->get_orign(),
				'date_orign' => $travelJournal->get_date_orign(false),
				'destination' => $travelJournal->get_destination(),
				'date_return' => $travelJournal->get_date_return(false),
				'link_gambar' => $travelJournal->get_link_gambar(),
				'date_created' => $travelJournal->get_date_created(false),
				'last_ip' => $travelJournal->get_last_ip()
		);
		
		if(file_put_contents(FCPATH.$travelJournal->get_link_gambar(),base64_decode($gambar))){
			return $this->db->set('last_location', $travelJournal->get_last_location(), false)
			->insert('tbl_traveljournal', $data);
		}else
			return "Error Uploading Image";
	}
}