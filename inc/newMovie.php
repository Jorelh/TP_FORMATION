<?php 

class addMovie{

	private $data;
	private $tag = 'div';

	public function __construct($data){
		$this -> data = $data;

	}

	public function tag($string){
		return '<{$this -> tag}>{$string}</{$this -> tag}>';
	}

	public function input($name, $value){

		return $this -> tag('<input type="text" name="'.$name.'" value="'.$value.'">');
	}

	public function submit(){
		return '<button type="submit">Envoyer</button>';
	}
}

 ?>