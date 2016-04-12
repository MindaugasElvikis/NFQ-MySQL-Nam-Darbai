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
    <thead>
    <tr>
        <td>Title</td>
        <td>Year</td>
        <td>Genre</td>
    </tr>
    </thead>
    <tbody>
    <?php
    include('books_list.php');

    $knygos = new BooksList();
    $knygos->getAll();

    foreach($knygos as $knyga){
        ?>
        <tr>
            <td><a href='single.php?id=<?php echo $knyga->getBookId(); ?>'>"<?php echo $knyga->getTitle(); ?>"</a></td>
            <td><?php echo $knyga->getYear(); ?></td>
            <td><?php echo $knyga->getGenre(); ?></td>
        </tr>
        <?php
    }

    $conn->close();
    ?>
    </tbody>
</table>
</body>
</html>