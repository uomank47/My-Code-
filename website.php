<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Games Wiki</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<h1 class="text-center mt-3">Games Wiki</h1>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary mt-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Games Wiki</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search">
        <button class="btn btn-outline-success">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container mt-4">

  <h2 class="mb-3 text-center">Games Table</h2>

  <!-- TABLE -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Game Name</th>
        <th>Rating</th>
      </tr>
    </thead>

    <tbody>
	<!-- PHP AND DATABASE CONTENT  -->
      <?php
        include("db.php");
        $sql = "SELECT * FROM videogames ORDER BY released_date";
        $results = mysqli_query($mysqli, $sql);

        while($a_row = mysqli_fetch_assoc($results)):
      ?>
        <tr>
          <td><?= $a_row['game_name'] ?></td>
          <td><?= $a_row['rating'] ?></td>
		<td><a class="btn btn-outline-danger" href="delete-games.php?id=<?= $a_row['game_id'] ?>" role="button">Delete</a></td>

        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <!-- ADD GAME BUTTON -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGameModal">
    Add Game
  </button>

</div>

<!-- MODAL -->
<div class="modal fade" id="addGameModal" tabindex="-1" aria-labelledby="addGameModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addGameModalLabel">Add New Game</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="add-game.php" method="post">
        <div class="modal-body">

          <div class="mb-3">
            <label class="col-form-label">Game Name:</label>
            <input type="text" class="form-control" name="GameName" required>
          </div>

          <div class="mb-3">
            <label class="col-form-label">Description:</label>
            <textarea class="form-control" name="GameDescription" required></textarea>
          </div>

          <div class="mb-3">
            <label class="col-form-label">Rating:</label>
            <input type="number" class="form-control" name="rating" min="0" max="10" required>
          </div>

          <div class="mb-3">
            <label class="col-form-label">Release Date:</label>
            <input type="date" class="form-control" name="release_date" required>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Game</button>
        </div>
      </form>

    </div>
  </div>
</div>

</body>
</html>
