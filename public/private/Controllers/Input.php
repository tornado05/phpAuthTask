<?php

class Input
{
	public $id;
	public $type;
	public $name;
	public $value;
	public function RenderHTML(){
		return '<input id="'.$this->id. 
		'" type="'.$this->type.
		'" name="'.$this->name.
		'" value="'.$this->value.'">';
	}
}