<?php

interface RenderableInterface {
	public function render();
}
	
class Form implements RenderableInterface {

	private $elements;

	public function addElement(RenderableInterface $element){
		$this->elements[] = $elements;
	}

	public function render(){

		$html = '<form>';

		foreach($this->elements as $element){
			$html .= $element->render();
		}

		$html .= '</form>';

		return $html;
	}
}

class Label implements RenderableInterface {
	private $text;
	public function __construct($text){
		$this->text = $text;
	}
	public function render(){
		return '<label>'.$this->text.'</label><br>';
	}
}

class InputText implements RenderableInterface {
	private $name;
	private $type;
	public function __construct($name, $type='text'){
		$this->name = $name;
		$this->type = $type;
	}
	public function render(){
		return '<input type=""' . $this->type.'" name="' . $this->name . '" /><br>';
	}
}