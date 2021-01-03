<?php
	// connect db
	require('./config.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!-- fa -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<title>Home - Todo</title>
</head>
<body>
	<!-- get all todo data from db -->
	<?php

		$statement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
		$statement->execute();
		$result = $statement->fetchAll();
	?>
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="card shadow py-4">
					<div class="card-body">
						<h2 class="text-center">Todos List</h2>
						<a href="add.php" type="button" class="btn btn-primary d-inline-block mb-3 float-right"><i class="fas fa-plus"></i> Create</a>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Title</th>
									<th>Description</th>
									<th>Created at</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i=1; // set custom id in table
								// check result value
								if($result) {
									// loop through result
									foreach($result as $value) {
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $value['title'] ?></td>
									<td><?php echo $value['description'] ?></td>
									<td><?php echo date('d-m-Y', strtotime($value['created_at'])) ?></td>
									<td>
										<a href="edit.php?id=<?php echo $value['id']?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
										<a href="delete.php?id=<?php echo $value['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
									</td>
								</tr>	
								<?php	
								$i++; // increase i value in every loop
									}
								} ?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div>
	</div>
</body>
</html>