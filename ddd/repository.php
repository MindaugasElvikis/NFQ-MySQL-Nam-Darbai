<?php
/**
 * Created by PhpStorm.
 * User: mindaugas
 * Date: 16.4.5
 * Time: 17.57
 */
include ('books_list.php');

class Repository{

    protected $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "nfq_namu_darbas");
        $this->conn->set_charset("UTF8");
    }

    public function getById($id){
        $q = "SELECT GROUP_CONCAT(Authors.name SEPARATOR ', ') AS authors, title, year, genre FROM Books
                  LEFT JOIN Book_authors ON Books.bookId=Book_authors.bookId
                  LEFT JOIN Authors ON Book_authors.authorId=Authors.authorId
                  WHERE Books.bookId=" . $id . " GROUP BY Books.title";

        $result = $this->conn->query($q)->fetch_assoc();

        $knyga = new Knyga();

        $knyga->setBookId($result["id"]);
        $knyga->setTitle($result["title"]);
        $knyga->setGenre($result["genre"]);
        $knyga->setAuthors($result["authors"]);
        $knyga->setYear($result["year"]);

        return $knyga;
    }

    public function getAll()
    {
        $query = "SELECT * FROM Books";
        $result = $this->conn->query($query);
        $booksList = new BooksList();
        while ($r = $result->fetch_assoc())
        {
            $knyga = new Knyga();
            $knyga->setBookId($r["bookId"]);
            $knyga->setTitle($r["title"]);
            $knyga->setYear($r["year"]);
            $knyga->setGenre($r["genre"]);
            $booksList->addBook($knyga);

        }

        return $booksList;
    }

}