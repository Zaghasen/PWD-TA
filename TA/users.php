<?php

require 'functions.php';

if (!is_logged_in()) {
	redirect('login.php');
}

$rows = db_query("SELECT * FROM users");

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
	<style>
		body {
			min-height: 100vh;
			justify-content: center;
			background: url(assets/images/bcgym.jpg);
			background-size: cover;
			background-position: center;
		}

		.card-profile {
			background-color: white;
			padding: 20px;
			border-radius: 10px;
		}

		.button-container {
			text-align: center;
			margin-top: 20px;
		}
	</style>
</head>

<body>
	<p>MEMBER Z.KI GYM</p>
	<div class="button-container">
		<a href="index.php">
			<button class="p-1 text-center btn-sm btn btn-info text-white">Profile</button>
		</a>
		<a href="halamanawal.php">
			<button class="p-1 text-center btn-sm btn btn-primary text-white">Home</button>
		</a>
	</div>

	<div class="container">
		<?php if (!empty($rows)): ?>
			<?php $counter = 0; ?>
			<?php foreach ($rows as $row): ?>
				<?php if ($counter % 5 == 0): ?>
					<div class="row">
					<?php endif; ?>
					<div class="col-md-2 border rounded mx-auto mt-5 card-profile" style="width:200px;">
						<a href="index.php?id=<?= $row['id'] ?>">
							<div class="col-md-12 text-center">
								<img src="<?= get_image($row['image']) ?>" class="img-fluid rounded"
									style="width: 180px;height:180px;object-fit: cover;">
								<div>
									<div><?= esc($row['email']) ?></div>
									<div><?= esc($row['firstname']) ?> 		<?= esc($row['lastname']) ?></div>
								</div>
							</div>
						</a>
					</div>
					<?php $counter++; ?>
					<?php if ($counter % 5 == 0 || $counter == count($rows)): ?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php else: ?>
			<div class="text-center alert alert-danger">That profile was not found</div>
			<a href="index.php">
				<button class="btn btn-primary m-4">Home</button>
			</a>
		<?php endif; ?>
	</div>
</body>

</html>