<?
	require 'config/config.php';
	require 'config/db.php';

	// Check for submit
	if(isset($_POST['submit'])){
		// get form data
		$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$body = mysqli_real_escape_string($conn, $_POST['body']);
		$author = mysqli_real_escape_string($conn, $_POST['author']);

		$query = "UPDATE posts SET title='$title', author='$author', body='$body' WHERE id={$update_id}";


		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}

	$id = mysqli_real_escape_string($conn, $_GET['id']);

	// Create query
	$query = " SELECT * FROM posts WHERE id= ".$id;

	// Get Result
	$result = mysqli_query($conn, $query);

	//Fetch data
	$post = mysqli_fetch_assoc($result);
	// var_dump($posts);

	// Free result
	mysqli_free_result($result);

	// Close
	mysqli_close($conn);

?>

<? include('inc/header.php');?>

<body style="background-color:#EEEEEE";>

	<div class="container">
	<h1 class="display-1" >Добавить пост</h1><br><br>
		<form action="<?$_SERVER['PHP_SELF'];?>" method="POST">
		
			<div class="form-group">
				<label for="">Заголовок</label>
				<input type="text" name="title" id="title" class="form-control" value="<?echo $post['title']; ?>">
			</div>
			<div class="form-group">
				<label for="">Автор</label>
				<input type="text" name="author" id="author" class="form-control" value="<?echo $post['author']; ?>" >
			</div>
			<div class="form-group">
				<label for="">Текст</label>
				<textarea type="text" name="body" id="body" class="form-control" ><?echo $post['body']; ?></textarea>
			</div>
			<input type="hidden" name="update_id" value="<?echo $post['id']; ?>" >
			<input type="submit" name="submit" value="submit" class="btn btn-primary">
		</form>
	</div>

<? include('inc/footer.php');?>
























