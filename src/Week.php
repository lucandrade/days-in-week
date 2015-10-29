<?php

namespace Lucandrade;

class Week
{
	protected $days = [
		'segunda' => 1,
		'terca'   => 2,
		'quarta'  => 4,
		'quinta'  => 8,
		'sexta'   => 16,
		'sabado'  => 32,
		'domingo' => 64
	];

	public function getDays()
	{
		return $this->days;
	}

	/**
	 * Return day integer representation
	 * @param int $integer
	 * @return string $day
	 */
	public function getDayFromInteger($integer)
	{
		$days = $this->getDays();
		$day = false;
		foreach ($days as $dayName => $int) {
			if ($int == $integer) {
				$day = $dayName;
			}
		}
		return $day;
	}

	/**
	 * Return days from integer
	 * @param int $integer
	 * @return array $days
	 */
	public function getDaysFromInteger($integer)
	{
		$foundDays = [];
		$days = $this->getDays();
		foreach ($days as $dayName => $int)
		{
			if ($int & $integer) {
				$foundDays[] = $dayName;
			}
		}
		return $foundDays;
	}
}