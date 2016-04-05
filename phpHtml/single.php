<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'/>
</head>
<body>
<header>
    <h1>Books</h1>
</header>

<table>
    <tbody>
    <?php
    include('connector.php');

    if (!empty($_GET["id"])) {
        $q = "SELECT GROUP_CONCAT(Authors.name SEPARATOR ', ') AS authors, title, year, genre FROM Books
                  LEFT JOIN Book_authors ON Books.bookId=Book_authors.bookId
                  LEFT JOIN Authors ON Book_authors.authorId=Authors.authorId
                  WHERE Books.bookId=" . $_GET["id"] . " GROUP BY Books.title";

        $result = $conn->query($q)->fetch_assoc();

        ?>
        <tr>
        <td>Authors</td>
        <td><?php echo $result["authors"]; ?></td>
        </tr>

        <tr>
            <td
            '>Title</td>
            <td>"<?php echo $result["title"]; ?>"</td>
        </tr>

        <tr>
            <td>Year</td>
            <td><?php echo $result["year"]; ?></td>
        </tr>

        <tr>
            <td>Genre</td>
            <td><?php echo $result["genre"]; ?></td>
        </tr>
    <?php }

    $conn->close();
    ?>
    </tbody>
</table>
</body>
</html>