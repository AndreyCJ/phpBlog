<?
	require('config/config.php');
	require('config/db.php');

		// Check for delete
		if(isset($_POST['delete'])){
			// get form data
			$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
	
			$query = "DELETE FROM posts WHERE id={$delete_id} ";
	
	
			if(mysqli_query($conn, $query)){
				header('Location: '.ROOT_URL.'');
			} else {
				echo 'ERROR: '. mysqli_error($conn);
			}
		}
	

	// get ID
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

<?include('inc/header.php');?>


<body style="background-color:#EEEEEE";>
	<div class="container">
		<div class="jumbotron">
  			<h2 class="display-4"><? echo $post['title']; ?></h2>
  			<p class="lead"><?echo $post ['body']; ?></p>
			  <hr>
			  <form action="<?echo $_SERVER['PHP_SELF']; ?>" class="float-right" method="POST">
			  	<input type="hidden" name="delete_id" value="<?echo $post['id']; ?>" >
				<input type="submit" name="delete" value="Удалить" class="btn btn-danger" >
			  </form>
			  <a href="<?echo ROOT_URL?>editpost.php?id=<?php echo $post['id'];?>" class="btn btn-deflault">Изменить</a>
  			<hr class="my-4">
  			<p>Создан <? echo $post['created_at']; ?> by <?echo $post['author']; ?></p>
  				<p class="lead">
    				<a class="btn btn-primary btn-lg" href="<?echo ROOT_URL;?>" role="button">Назад</a>
  				</p>
		</div>	
	</div>
<? include('inc/footer.php');?>























