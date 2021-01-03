<?php
	// connect db
	require('./config.php');
	// check POST data
	if($_POST) {
		// get values from post request
		$title = $_POST['title'];
		$description = $_POST['description'];
		$id = $_POST['id'];

		$statement = $pdo->prepare("UPDATE todo SET title='$title', description='$description' WHERE id='$id'");
		$result = $statement->execute();

		if($result) {
			echo"<script>alert('New Todo is updated!');window.location.href='index.php';</script>";
		}

	} // execution for get method 
	else {

		$statement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
		$statement->execute();
		$result = $statement->fetchAll();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<!-- fa -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
		<title>Edit - Todo</title>
	</head>
	<body>
		<div class="container mt-4">
			<div class="row">
				<div class="col-md-10 mx-auto">
					<div class="card shadow py-2">
						<div class="card-body">
							<h2 class="text-center">Edit new todo task</h2>
							<form action="" method="POST">
								<input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
								<div class="form-group">
									<label for="title">Title</label>
									<input type="text" name="title" id="title" class="form-control" value="<?php echo $result[0]['title'] ?>" required />
								</div>
								<div class="form-group">
									<label for="description">Description</label>
									<textarea name="description" id="" cols="30" rows="10" class="form-control"><?php echo $result[0]['description'] ?></textarea>
								</div>
								<div class="form-group">
									<a href="./index.php" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Back</a>
									<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>