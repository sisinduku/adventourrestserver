<?php
/**
 * Kelas Abstraksi TravelJournal
 * @author Ketampanan
 *
 */
class TravelJournal {
	private $id_traveljournal, $id_user, $id_layout, $orign, $date_orign, $destination, $date_return, $link_gambar, $date_created, $time_stamp, $last_ip, $last_location, $last_location_x, $last_location_y, $total_budget;
	private $api;
   	/**
   	 * Getter id_traveljournal
   	 */
   	public function get_id_traveljournal(){
   		return $this->id_traveljournal;
   	}
   	
   	public function set_id_traveljournal(){
   		$this->api = & get_instance();
   		$this->api->load->helper('security');
   		
   		$time = strtotime("now");
		$timestamp = date("Y-m-d h:i:s", $time);
		$id_traveljournal = do_hash($this->id_user.$timestamp, 'sha1');
		$this->id_traveljournal = $id_traveljournal;
   	}
   	
   	/**
   	 * Getter id_user
   	 */
   	public function get_id_user(){
   		return $this->id_user;
   	}
   	
   	/**
   	 * Getter id_layout
   	 */
   	public function get_id_layout(){
   		return $this->id_layout;
   	}
   	
   	/**
   	 * Getter orign
   	 */
   	public function get_orign(){
   		return $this->orign;
   	}
   	
   	/**
   	 * Getter date_orign
   	 */
   	public function get_date_orign($format = true){
   		if ($format) {
   			$time = strtotime($this->date_orign);
   			$result = date("d-m-Y", $time);
   			return $result;
   		}else 
   			return $this->date_orign;
   	}
   	
   	/**
   	 * Setter date_orign
   	 */
   	public function set_date_orign($date_orign){
   		$date = strtotime($date_orign);
		$date = date("Y-m-d", $date);
		$this->date_orign = $date;
   	}
   	
   	/**
   	 * Getter destination
   	 */
   	public function get_destination(){
   		return $this->destination;
   	}
   	
   	/**
   	 * Getter date_return
   	 */
   	public function get_date_return($format = true){
   		if ($format){
   			$time = strtotime($this->date_return);
   			$result = date("d-m-Y", $time);
   			return $result;
   		}else
   			return $this->date_return;
   	}
   	
   	/**
   	 * Setter date_return
   	 */
   	public function set_date_return($date_return){
   		$date = strtotime($date_return);
		$date = date("Y-m-d", $date);
		$this->date_return = $date;
   	}
   	
   	/**
   	 * Getter link_gambar
   	 */
   	public function get_link_gambar(){
   		return $this->link_gambar;
   	}
   	
   	/**
   	 * Setter link_gambar
   	 * @param string $tipe_gambar ekstensi gambar
   	 */
   	public function set_link_gambar($tipe_gambar){
   		// Menyusun nama file gambar yang akan disimpan
   		$this->api = & get_instance();
   		$this->api->load->helper('security');
   		
   		$nama_file = do_hash($this->get_id_traveljournal(), 'sha1');
   		
   		$full_name = $nama_file.".".$tipe_gambar;
   		$this->link_gambar = "assets/uploads/traveljournal/cover/".$full_name;
   	}
   	
   	/**
   	 * Getter date_created
   	 */
   	public function get_date_created($format = true){
   		if ($format) {
   			$time = strtotime($this->date_created);
   			$result = date("d-m-Y", $time);
   			return $result;
   		}else 
   			return $this->date_created;
   	}
   	
   	/**
   	 * Setter date_created
   	 */
   	public function set_date_created(){
   		$time = strtotime("now");
   		$date = date("Y-m-d", $time);
		$this->date_created = $date;
   	}
   	
   	/**
   	 * Getter time_stamp
   	 */
   	public function get_time_stamp(){
   		return $this->time_stamp;
   	}
   	
   	/**
   	 * Getter last_ip
   	 */
   	public function get_last_ip(){
   		return $this->last_ip;
   	}
   	
   	/**
   	 * Getter last_location
   	 */
   	public function get_last_location(){
   		return $this->last_location;
   	}
   	
   	/**
   	 * Setter last_location
   	 */
   	public function set_last_location($location_x, $location_y){
   		$location = 'POINT(' . $location_x . " " . $location_y . ')';
   		$this->last_location = 'PointFromText("'.$location.'")';
   	}
   	
   	/**
   	 * Getter last_location_x
   	 */
   	public function get_last_location_x(){
   		return $this->last_location_x;
   	}
   	
   	/**
   	 * Getter last_location_y
   	 */
   	public function get_last_location_y(){
   		return $this->last_location_y;
   	}
   	
   	/**
   	 * Getter total_budget
   	 */
   	public function get_total_budget(){
   		if ($this->total_budget != ""){
   			$result = "Rp. ".number_format($this->total_budget , 0, ',', '.');
   			return $result;
   		}
   		else 
   			return null;
   	}
   	
   	public function __get($attribute){
   		switch ($attribute){
   			case 'id_traveljournal' :
   				return $this->get_id_traveljournal();
   				break;
   			case 'id_user' :
   				return $this->get_id_user();
   				break;
   			case 'id_layout' :
   				return $this->get_id_layout();
   				break;
   			case 'orign' :
   				return $this->get_orign();
   				break;
   			case 'date_orign' :
   				return $this->get_date_orign();
   				break;
   			case 'destination' :
   				return $this->get_destination();
   				break;
   			case 'date_return' :
   				return $this->get_date_return();
   				break;
   			case 'date_created' :
   				return $this->get_date_created();
   				break;
   			case 'time_stamp' :
   				return $this->get_time_stamp();
   				break;
   			case 'last_ip' :
   				return $this->get_last_ip();
   				break;
   			case 'last_location_x' :
   				return $this->get_last_location_x();
   				break;
   			case 'last_location_y' :
   				return $this->get_last_location_y();
   				break;
   			case 'total_budget' :
   				return $this->get_total_budget();
   				break;
   			default :
   				return null;
   				break;
   		}
   	}
   	
   	/**
   	 * Fungsi untuk mengambil semua property TravelJournal
   	 * @return multitype:NULL data
   	 */
   	public function get_traveljournal(){
   		$data = array('id_traveljournal' => $this->get_id_traveljournal(),
   				'id_user' => $this->get_id_user(),
   				'id_layout' => $this->get_id_layout(),
   				'orign' => $this->get_orign(),
   				'date_orign' => $this->get_date_orign(),
   				'destination' => $this->get_destination(),
   				'date_return' => $this->get_date_return(),
   				'date_created' => $this->get_date_created(),
   				'link_gambar' => $this->get_link_gambar(),
   				'time_stamp' => $this->get_time_stamp(),
   				'last_ip' => $this->get_last_ip(),
   				'last_location_x' => $this->get_last_location_x(),
   				'last_location_y' => $this->get_last_location_y(),
   				'total_budget' => $this->get_total_budget()
   		);
   	
   		return $data;
   	}
   	
   	/**
   	 * Setting TravelJournal
   	 * @param unknown $id_user
   	 * @param unknown $id_layout
   	 * @param unknown $orign
   	 * @param unknown $date_orign
   	 * @param unknown $destination
   	 * @param unknown $date_return
   	 * @param unknown $tipe_gambar
   	 * @param unknown $last_ip
   	 * @param string $last_location_x
   	 * @param string $last_location_y
   	 */
   	public function set_traveljournal($id_user, $id_layout, $orign, $date_orign, $destination, $date_return, $tipe_gambar, $last_ip, $last_location_x = null, $last_location_y = null){
   		$this->id_user = $id_user;
   		$this->set_id_traveljournal();
   		$this->id_layout = $id_layout;
   		$this->orign = $orign;
   		$this->set_date_orign($date_orign);
   		$this->destination = $destination;
   		$this->set_date_return($date_return);
   		$this->set_link_gambar($tipe_gambar);
   		$this->set_date_created();
   		$this->last_ip = $last_ip;
   		if ($last_location_x != null && $last_location_y != null){
   			$this->last_location_x = $last_location_x;
   			$this->last_location_y = $last_location_y;
   			$this->set_last_location($this->last_location_x, $this->last_location_y);
   		}
   	}
}