<?
require 'config/config.php';
require 'config/db.php';

// Create query
$query = " SELECT * FROM posts ORDER BY created_at DESC";

// Get Result
$result = mysqli_query($conn, $query);

//Fetch data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free result
mysqli_free_result($result);

// Close
mysqli_close($conn);

?>

<? include('inc/header.php');?>

<body style="background-color:#EEEEEE";>
<div class="container">
<? foreach ($posts as $post): ?>
	<div class="jumbotron">
		<p class="display-4"><?echo $post['title']; ?></p>
			<p class="lead"><?echo $post['body']; ?></p>
		<hr class="my-4">
			<div class="wrap"><p><div class="left"> <?echo $post['author']; ?></div> <div class="right"><?echo $post['created_at']; ?></div></p></div>
			<p class="lead">
				<a class="btn btn-primary btn-lg" href="<?echo ROOT_URL; ?>post.php?id=<?echo $post['id']; ?>" role="button">Далее</a>
			</p>
	</div>
<?endforeach;?>
</div>

<? include('inc/footer.php');?>
