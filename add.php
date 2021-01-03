<?php
	// connect db
	require 'config.php';
	// check POST data
	if($_POST) {
		$title = $_POST['title'];
		$description = $_POST['description'];

		$sql = "INSERT INTO todo(title, description) VALUES (:title, :description)";
		$statement = $pdo->prepare($sql);
		$result = $statement->execute(
			array(
				':title' => $title,
				':description' => $description,
			)
		);
		if($result) {
			echo"<script>alert('New Todo is added');window.location.href='index.php';</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- bootstrap css cdn -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!--  fa -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<title>Create - Todo</title>
</head>
<body>
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="card shadow py-3">
					<div class="card-body">
						<h2 class="text-center">Create new todo task</h2>
						<!-- add new todo form -->
						<form action="add.php" method="POST">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" name="title" id="title" class="form-control" required />
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<a href="./index.php" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Back</a>
								<button type="submit" class="btn btn-primary"><fas class="fas fa-plus"></fas> Create</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>