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
    include('knyga.php');

    if (!empty($_GET["id"])) {
        $knyga = new Knyga();
        $knyga->load($_GET["id"]);

        ?>
        <tr>
        <td>Authors</td>
        <td><?php echo $knyga->getAuthors(); ?></td>
        </tr>

        <tr>
            <td>Title</td>
            <td>"<?php echo $knyga->getTitle(); ?>"</td>
        </tr>

        <tr>
            <td>Year</td>
            <td><?php echo $knyga->getYear(); ?></td>
        </tr>

        <tr>
            <td>Genre</td>
            <td><?php echo $knyga->getGenre(); ?></td>
        </tr>
    <?php }

    $conn->close();
    ?>
    </tbody>
</table>
</body>
</html>