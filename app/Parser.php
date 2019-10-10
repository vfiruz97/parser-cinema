<?php

namespace App;

use PHPHtmlParser\Dom;

/**
* Парсер HTML тег
*
* @class Parser
* @param $dom
* @param $url
**/

class Parser
{
	protected $dom;
	protected $url;
	
	public function __construct($url)
	{
		$this->dom = new Dom;
		$this->url = $url;
	}
	
	public function getHtml()
	{
		return $this->dom->loadFromUrl($this->url) ?? '';
	}
	
	public function find(string $str)
	{
		return $this->dom->find($str) ?? '';
	}
	
	public function getParseBaseData()
	{
		$html = $this->getHtml();
		$contents = $html->find('#evcal_list')[0]->find('.evo_event_schema');
		$result = $this->getBaseFields($contents);
		
		return $result;
	}
	
	protected function getBaseFields($arr) 
	{
		$arrSchedules = [];
		foreach ($arr as $element)
		{
			$urlForGetPrice = $element->find('a')[0]->getAttribute('href') ?? '';
			$arrSchedules[] = 
			[
				'url' => $urlForGetPrice,
				'title' => $element->find('span')[0]->text ?? '',
				'start_at' => $element->find('meta')[2]->getAttribute('content') ?? '',
				'end_at' => $element->find('meta')[3]->getAttribute('content') ?? '',
				'price' => $this->getPrice($urlForGetPrice),
			];
		}
		
		return $arrSchedules;
	}
	
	public function getPrice($url)
	{
		$html = (new Dom())->loadFromUrl($url);
		$contents = $html->find('#evcal_list')[0]->find('.eventon_desc_in')->find('p') ?? '';
		
		$res = $contents[count($contents) - 1] ?? '';
		return (string) $res;
	}
}