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

	public function games($year, $month)
	{
		$years = array('2011', '2012', '2013');
		$months = array('01', '02', '03', '04', '10', '11', '12');
		if(!in_array($year, $years)) die('Nope');
		if(!in_array($month, $months)) die('Nope');

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

	public function playoffs($season)
	{
		$seasons = array('1112', '1213');
		if(!in_array($season, $seasons)) die('Nope');

		if((int)$season == 1112)
		{
			$view_data['season'] = "2011-2012";
			$view_data['games'] = array();

			$playoff = $this->mongo_db
			->where(array('game_year' => 2012, 'game_month' => 4))
			->where_gte('game_day', 28)
			->order_by(array('game_day' => 'asc', 'game_id' => 'asc'))
			->get('games');

			foreach ($playoff as $game) {
				array_push($view_data['games'], $game);
			}

			$playoff = $this->mongo_db
			->where(array('game_year' => 2012, 'game_month' => 5))
			->order_by(array('game_day' => 'asc', 'game_id' => 'asc'))
			->get('games');

			foreach ($playoff as $game) {
				array_push($view_data['games'], $game);
			}

			$playoff = $this->mongo_db
			->where(array('game_year' => 2012, 'game_month' => 6))
			->where_lte('game_day', 21)
			->order_by(array('game_day' => 'asc', 'game_id' => 'asc'))
			->get('games');

			foreach ($playoff as $game) {
				array_push($view_data['games'], $game);
			}
		}
		elseif((int)$season == 1213)
		{
			$view_data['season'] = "2012-2013";
			$view_data['games'] = array();

			$playoff = $this->mongo_db
			->where(array('game_year' => 2013, 'game_month' => 4))
			->where_gte('game_day', 20)
			->order_by(array('game_day' => 'asc', 'game_id' => 'asc'))
			->get('games');

			foreach ($playoff as $game) {
				array_push($view_data['games'], $game);
			}

			$playoff = $this->mongo_db
			->where(array('game_year' => 2013, 'game_month' => 5))
			->order_by(array('game_day' => 'asc', 'game_id' => 'asc'))
			->get('games');

			foreach ($playoff as $game) {
				array_push($view_data['games'], $game);
			}

			$playoff = $this->mongo_db
			->where(array('game_year' => 2013, 'game_month' => 6))
			->where_lte('game_day', 21)
			->order_by(array('game_day' => 'asc', 'game_id' => 'asc'))
			->get('games');

			foreach ($playoff as $game) {
				array_push($view_data['games'], $game);
			}
		}

		//var_dump($view_data);die();
		$this->load->view('playoffs', $view_data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */