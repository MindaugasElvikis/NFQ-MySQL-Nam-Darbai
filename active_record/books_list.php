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
    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "nfq_namu_darbas");
        $this->conn->set_charset("UTF8");
    }

    public function getAll(){
        $q = "SELECT * FROM Books";

        $result = $this->conn->query($q);

        while ($r = $result->fetch_assoc()) {
            $knyga = new Knyga();

            $knyga->setBookId($r["bookId"]);
            $knyga->setTitle($r["title"]);
            $knyga->setGenre($r["genre"]);
            $knyga->setYear($r["year"]);

            $this->addBook($knyga);
        }
    }

    public function getIterator() {
        return new ArrayIterator($this->books);
    }

    public function addBook($book) {
        $this->books[] = $book;
    }
}