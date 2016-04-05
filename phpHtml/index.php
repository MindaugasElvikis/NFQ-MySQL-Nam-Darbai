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
    include('connector.php');
    $result = $conn->query("SELECT * FROM Books");

    while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><a href='single.php?id=<?php echo $row["bookId"]; ?>'>"<?php echo $row["title"]; ?>"</a></td>
            <td><?php echo $row["year"]; ?></td>
            <td><?php echo $row["genre"]; ?></td>
        </tr>
    <?php }

    $conn->close();
    ?>
    </tbody>
</table>
</body>
</html>