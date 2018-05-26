<?
	require 'config/config.php';
	require 'config/db.php';

	// Check for submit
	if(isset($_POST['submit'])){
		// get form data
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$body = mysqli_real_escape_string($conn, $_POST['body']);
		$author = mysqli_real_escape_string($conn, $_POST['author']);

		$query = "INSERT INTO posts (title, author, body) VALUES('$title', '$author', '$body') ";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}

?>

<? include('inc/header.php');?>

<body style="background-color:#EEEEEE";>

	<div class="container">
	<h1 class="display-1" >Добавить пост</h1><br><br>
		<form action="<?$_SERVER['PHP_SELF'];?>" method="POST">
		
			<div class="form-group">
				<label for="">Заголовок</label>
				<input type="text" name="title" id="title" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Автор</label>
				<input type="text" name="author" id="author" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Текст</label>
				<textarea type="text" name="body" id="body" class="form-control"></textarea>
			</div>
			<input type="submit" name="submit" value="Добавить" class="btn btn-primary">
		</form>
	</div>

<? include('inc/footer.php');?>
























