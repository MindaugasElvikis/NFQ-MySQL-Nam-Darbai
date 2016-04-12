<?php
/**
 * Created by PhpStorm.
 * User: mindaugas
 * Date: 16.4.5
 * Time: 17.22
 */

class Knyga {
    protected $bookId;
    protected $title;
    protected $genre;
    protected $authors;
    protected $year;
    protected $conn;

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }
    /**
     * @return mixed
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @param mixed $authors
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;
    }

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "nfq_namu_darbas");
        $this->conn->set_charset("UTF8");
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param mixed $bookId
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function load($id){
        $q = "SELECT GROUP_CONCAT(Authors.name SEPARATOR ';') AS authors, title, year, genre FROM Books
                  LEFT JOIN Book_authors ON Books.bookId=Book_authors.bookId
                  LEFT JOIN Authors ON Book_authors.authorId=Authors.authorId
                  WHERE Books.bookId=" . $id . " GROUP BY Books.title";

        $result = $this->conn->query($q)->fetch_assoc();

        $this->setBookId($result["id"]);
        $this->setTitle($result["title"]);
        $this->setGenre($result["genre"]);
        $this->setAuthors($result["authors"]);
        $this->setYear($result["year"]);
    }


}