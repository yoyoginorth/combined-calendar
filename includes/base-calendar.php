<?php
/**
 * Author: ryotsun
 * Date: 2018/05/20
 * Time: 22:03
 */

class BaseCalendar
{
	protected $year;
	protected $month;
	protected $start_of_week;

	const WEEK_DAYS = 7;

	function __construct()
	{
		$this->set_date(date("Y"), date("n"));
		$this->set_start_of_week(get_option('start_of_week'));
	}

	/**
	 * @param $year
	 * @param $month
	 */
	protected function set_date($year, $month)
	{
		$this->year = $year;
		$this->month = $month;
	}

	/**
	 * @param $day
	 */
	protected function set_start_of_week($day)
	{
		$this->start_of_week = $day;
	}

	/**
	 * @param $year
	 * @param $month
	 * @return string
	 */
	public function show_cal($year = null, $month = null)
	{
		if ($year && $month) {
			$this->set_date($year, $month);
		}

		$cal_array = $this->get_completed_cal_array();
		$cal_html = $this->get_cal_with_html($cal_array);

		return $cal_html;
	}

	/**
	 * @return array Calendar Array
	 */
	protected function get_completed_cal_array()
	{
		$cal = $this->get_cal_array();
		return $cal;
	}

	/**
	 * @return array Specific Month
	 */
	protected function get_cal_array()
	{
		$cal = array();
		$week = 0;
		$date_count = date('j', mktime(0, 0, 0, $this->month + 1, 0, $this->year));

		for ($i = 1; $i <= $date_count; $i++) {
			$w = date('w', mktime(0, 0, 0, $this->month, $i, $this->year));

			// set empty string until comes 1st date
			if ($i === 1) {
				if ($this->start_of_week < $w) {
					for ($j = 0; $j < $w - $this->start_of_week; $j++) {
						$cal[$week][] = '';
					}
				} else if ($this->start_of_week > $w) {
					for ($j = 0; $j < self::WEEK_DAYS - $this->start_of_week + $w; $j++) {
						$cal[$week][] = '';
					}
				}
			}

			$cal[$week][] = $i;

			if (count($cal[$week]) === self::WEEK_DAYS) {
				$week++;
			}
		}

		return $cal;
	}

	/**
	 * @param $cal
	 * @return string
	 */
	protected function get_cal_with_html($cal)
	{
		$tag = '<table>';
		$tag .= '<caption>' . __(date("F", strtotime($this->month . "/1/" . $this->year)), CalendarFramework::TEXT_DOMAIN) . '</caption>';
		$tag .= '<tr>';

		$week_header = $this->get_week_header();
		for ($i = 0; $i < self::WEEK_DAYS; $i++) {
			$tag .= '<th>' . $week_header[$i] . '</th>';
		}
		$tag .= '</tr>';
		for ($i = 0, $l = count($cal); $i < $l; $i++) {
			$tag .= '<tr>';

			for ($j = 0, $m = count($cal[$i]); $j < $m; $j++) {
				$tag .= '<td>' . $cal[$i][$j] . '</td>';
			}

			$tag .= '</tr>';
		}
		$tag .= '</table>';

		return $tag;
	}

	/**
	 * @return array
	 */
	protected function get_week_header()
	{
		$week_header = array(
			__("Sunday", CalendarFramework::TEXT_DOMAIN),
			__("Monday", CalendarFramework::TEXT_DOMAIN),
			__("Tuesday", CalendarFramework::TEXT_DOMAIN),
			__("Wednesday", CalendarFramework::TEXT_DOMAIN),
			__("Thursday", CalendarFramework::TEXT_DOMAIN),
			__("Friday", CalendarFramework::TEXT_DOMAIN),
			__("Saturday", CalendarFramework::TEXT_DOMAIN),
		);

		$tmp_suffix_array = array();

		for ($i = 0; $i < self::WEEK_DAYS; $i++) {
			if ($i < $this->start_of_week) {
				array_push($tmp_suffix_array, $week_header[0]);
				array_shift($week_header);
			}
		}

		return array_merge($week_header, $tmp_suffix_array);
	}
}
