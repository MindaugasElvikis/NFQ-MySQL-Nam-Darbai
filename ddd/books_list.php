<?php
/**
 * Created by PhpStorm.
 * User: mindaugas
 * Date: 16.4.5
 * Time: 18.48
 */
include('knyga.php');

class BooksList implements IteratorAggregate {
    protected $books = [];

    public function getIterator() {
        return new ArrayIterator($this->books);
    }
    public function addBook($book) {
        $this->books[] = $book;
    }
}