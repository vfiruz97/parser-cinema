<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPHtmlParser\Dom;
use App\Parser;
use App\ScheduleCinema;

class ScheduleController extends Controller
{
	protected $url = 'https://cityopen.ru/afisha/sterlitamakskoe-gosudarstvennoe-teatralno-kontsertnoe-obedinenie/';

	public function index()
	{
		$items = ScheduleCinema::all();
		return view('schedule.index', compact('items'));
	}

	public function upload()
	{
		
		$dom = new Parser($this->url);
		$arr = $dom->getParseBaseData();

		
		foreach ($arr as $cinema) 
		{
			$schedule = new ScheduleCinema();
			$schedule->title 	= $cinema['title'];
			$schedule->price 	= $cinema['price'];
			$schedule->start_at = $cinema['start_at'];
			$schedule->end_at 	= $cinema['end_at'];

			$res = $schedule->save();
			unset($schedule);
		}

		if ($res) return "Успешно сохранено";
		else return "Ошибка сохранения";

	}
}
