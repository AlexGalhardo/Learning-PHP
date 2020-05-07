<?php

/**
 * Uma classe para criar outras classes
 */

class Facebook {

	public function createPost(){
		return new Post();
	}

}

class Post {

	private $author;
	private $message;

	public function setAuthor($authorName){

	}
	public function getAuthor(){
		return $this->author;
	}
	public function setMessage($message){
		$this->message = $message;
	}
	public function getMessage(){
		return $this->message;
	}
}

