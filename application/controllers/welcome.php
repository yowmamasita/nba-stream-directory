<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $view_data;

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//var_dump($view_data);die();
		$this->load->view('welcome_message');
	}

	public function games($year, $month, $quality = 'low')
	{
		$years = array('2011', '2012', '2013');
		$months = array('01', '02', '03', '04', '10', '11', '12');
		$qualitys = array('low', 'medium', 'high', 'full');
		if(!in_array($year, $years)) die('Nope');
		if(!in_array($month, $months)) die('Nope');
		if(!in_array($quality, $qualitys)) die('Nope');

		$month_n = array(
			1 => 'January',
			2 => 'February',
			3 => 'March',
			4 => 'April',
			5 => 'May',
			6 => 'June',
			7 => 'July',
			8 => 'August',
			9 => 'September',
			10 => 'October',
			11 => 'November',
			12 => 'December',
		);

		$view_data['month'] = $month_n[(int)$month];
		$view_data['year'] = $year;
		$view_data['quality'] = $quality;

		//regular season last day
		if((int)$month == 4 && (int)$year == 2012)
		{
			$view_data['last_day'] = 26;
		}
		elseif((int)$month == 4 && (int)$year == 2013)
		{
			$view_data['last_day'] = 17;
		}

		$view_data['games'] = $this->mongo_db
		->where(array('game_year' => (int)$year, 'game_month' => (int)$month))
		->order_by(array('game_day' => 'asc', 'game_id' => 'asc'))
		->get('games');
		//var_dump($view_data);die();

		$this->load->view('games', $view_data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */