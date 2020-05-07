<?php

require 'classes.php';

$book1 = new Book("LivroTeste1", "Galhardo1");
$book2 = new Book("LivroTeste2", "Galhardo2");
$book3 = new Book("LivroTeste3", "Galhardo3");

// echo "TITLE: " . $book->getTitle();

$booklist = new BookList();
$booklist->addBook($book1);
$booklist->addBook($book2);
$booklist->addBook($book3);

// echo "TOTAL DE LIVROS: " . $booklist->count();
// echo "<hr>";

// $booklist->removeBook($book2);

// echo "TOTAL DE LIVROS: " . $booklist->count();
// echo "<hr>";

$livro1 = $booklist->current();
echo "Livro 1: " . $livro1->getTitle(). " - " . $livro1->getAuthor() . "<br>";

$booklist->next();

$livro2 = $booklist->current();
echo "Livro 2: " . $livro2->getTitle(). " - " . $livro2->getAuthor() . "<br>";

$booklist->reset();

$livro3 = $booklist->current();
echo "Livro 3: " . $livro3->getTitle(). " - " . $livro3->getAuthor() . "<br>";


while($booklist->valid()){

	$livro = $booklist->current();

	echo "TITULO: " . $livro->getTitle();
	echo "<br>";
	echo "AUTHOR: " . $livro->getAuthor();

	$booklist->next();
}