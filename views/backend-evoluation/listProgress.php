<?php
include(__DIR__ .'/../../controller/trackerProgress.php');
$controller = new progressController();
$list = $controller->listProgress();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        .container {
            width: 80%;
            max-width: 1200px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
  <div class="container mt-4">
    <h1 class="text-center mb-4">Progress List</h1>
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">ID</th>
          <th scope="col">completion_percentage</th>
          <th scope="col">starting_date</th>
          <th scope="col">last_active_date</th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <a href="createProgress.php">+</a>
      <tbody>
      <?php
          $n = 1; // Initialize row counter
          foreach ($list as $prog) {
      ?>
        <tr>
          <th scope="row"><?php echo $n++; ?></th>
          <td><?php echo htmlspecialchars($prog['id']); ?></td>
          <td><?php echo htmlspecialchars($prog['completion_percentage']); ?></td>
          <td><?php echo htmlspecialchars($prog['starting_date']); ?></td>
          <td><?php echo htmlspecialchars($prog['last_active_date']); ?></td>
          <td>
            <form action="updateProgress.php" method="POST">
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($prog['id']); ?>">
              <button type="submit" class="btn btn-success">Update</button>
            </form>
          </td>
          <td>
            <form action="deleteProg.php" method="POST">
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($prog['id']); ?>">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
          <td>
          <form action="showNote.php" method="POST">
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($prog['id']); ?>">
              <button type="submit" class="btn btn-secondary">Grade</button>
            </form>
          </td>
        </tr>
      <?php
          }
      ?>
      </tbody>
    </table>
  </div>
</body>
</html>
