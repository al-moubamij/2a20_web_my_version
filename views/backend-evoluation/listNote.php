<?php
include 'C:\xampp\htdocs\projetWeb2A20\controller\noteController.php';
$noteController = new noteController();
$list = $noteController->listNote();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container mt-4">
    <h1 class="text-center mb-4">Note List</h1>
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">ID</th>
          <th scope="col">Full Name</th>
          <th scope="col">Matière</th>
          <th scope="col">Note</th>
          <th scope="col">Commentaire</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
        <a href="addNote.php">+</a>
      <tbody>
      <?php
          $n = 1; // Initialize row counter
          foreach ($list as $note) {
      ?>
        <tr>
          <th scope="row"><?php echo $n++; ?></th>
          <td><?php echo htmlspecialchars($note['id']); ?></td>
          <td><?php echo htmlspecialchars($note['full_name']); ?></td>
          <td><?php echo htmlspecialchars($note['matiere']); ?></td>
          <td><?php echo htmlspecialchars($note['note']); ?></td>
          <td><?php echo htmlspecialchars($note['commentaire']); ?></td>
          <td>
            <!-- Update Form -->
            <form action="update.php" method="POST">
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($note['id']); ?>">
              <button type="submit" class="btn btn-success">Update</button>
            </form>
          </td>
          <td>
            <!-- Delete Form -->
            <form action="delete.php" method="POST">
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($note['id']); ?>">
              <button type="submit" class="btn btn-danger">Delete</button>
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
