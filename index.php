<?php include "db.php"; ?>
<?php 

$query = "SELECT * FROM shouts ORDER BY id DESC";
$select_shouts = mysqli_query($connection, $query);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shout it</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <div id="container">
        <header>
            <h1>SHOUT IT!</h1>
        </header>
        <div id="shouts">
            <ul>
                <?php while($row = mysqli_fetch_assoc($select_shouts)) : ?>
                    <li class="shouts"> <span><?php echo $row['time'] ?> - </span><strong><?php echo $row['user'] ?></strong> : <?php echo $row['message'] ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div id="input">
           <?php if(isset($_GET['error_message'])) :?>
           <div class='error_message'><?php echo $_GET['error_message']; ?></div>
           <?php endif; ?>
            <form method="post" action="process.php">
                <input type="text" name="user" placeholder="Enter your name">
                <input type="text" name="message" placeholder="Enter A Message">
                <br/>
               <input class="shout-btn" type="submit" name="submit" value="Shout It Out">
            </form>
        </div>
    </div>
</body>
</html>
