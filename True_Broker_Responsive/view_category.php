<?php
include 'header.php';
include 'db.php';

$id = $_GET['id'];

$query = "SELECT * FROM categories WHERE id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<h2><?php echo $data['category_name']; ?></h2>
<p><?php echo $data['category_description']; ?></p>
<img src="uploads/<?php echo $data['image']; ?>" width="300">
