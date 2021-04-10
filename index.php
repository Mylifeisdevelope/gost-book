<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <label for="">Name</label><br>
        <input type="text" name="name"><br>
        <label for="">Text</label><br>
        <textarea name="text" cols="30" rows="10"></textarea><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbName = 'gb';
$mysql =  mysqli_connect( $host, $user, $password, $dbName ) or die( mysqli_error( $mysql ) );
mysqli_query( $mysql, "SET NAMES 'utf8'" );
$query = 'SELECT * FROM chat WHERE id>0';
$result = mysqli_query( $mysql, $query ) or die( mysqli_error( $mysql ) );
if ( isset( $_POST['submit'] ) ) {
    if ( !empty( $_POST['name'] ) || !empty( $_POST['text'] ) ) {
        header("LOCATION: newphp.php");
       $newName =  $_POST['name'];
       $newText =  $_POST['text'];
       $newMessage = $newUser = "INSERT INTO chat SET name= '". $newName ."', text = '". $newText ."'";
       mysqli_query($mysql,$newMessage) or die( mysqli_error( $mysql ) );
    }
}
for ( $data = []; $row = mysqli_fetch_assoc( $result );
$data[] = $row ); 
?>
<?php if (!empty($data)) : ?>
    <?php foreach($data as $elem) :?>
        <div class="messages">
            <p>Автор: <?php echo $elem['name']; ?> | дата <?php echo $elem['date']; ?></p>
            <span><?php echo $elem['text']; ?></p> </span>
        </div>
  <?php endforeach?>  
<?php endif; ?>


