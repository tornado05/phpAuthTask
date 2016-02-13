<?php

class Label
{
	public $value;
	public function RenderHTML(){
		return '<label>'.$this->value.'</label>';
	}
}