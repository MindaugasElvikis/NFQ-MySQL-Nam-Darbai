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
    include('repository.php');

    if (!empty($_GET["id"])) {
        $knyga = new Repository();

        $kn = $knyga->getById($_GET["id"]);

        ?>
        <tr>
            <td>Authors</td>
            <td><?php echo $kn->getAuthors(); ?></td>
        </tr>

        <tr>
            <td>Title</td>
            <td>"<?php echo $kn->getTitle(); ?>"</td>
        </tr>

        <tr>
            <td>Year</td>
            <td><?php echo $kn->getYear(); ?></td>
        </tr>

        <tr>
            <td>Genre</td>
            <td><?php echo $kn->getGenre(); ?></td>
        </tr>
    <?php }

    $conn->close();
    ?>
    </tbody>
</table>
</body>
</html>