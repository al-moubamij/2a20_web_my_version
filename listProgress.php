<tbody>
<?php
    $n = 1; // Initialize row counter
    foreach ($list as $prog) {
?>
  <tr>
    <th scope="row"><?php echo $n++; ?></th>
    <td><?php echo htmlspecialchars($prog['id']); ?></td>
    <td>
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: <?php echo htmlspecialchars($prog['completion_percentage']); ?>%;" aria-valuenow="<?php echo htmlspecialchars($prog['completion_percentage']); ?>" aria-valuemin="0" aria-valuemax="100">
          <?php echo htmlspecialchars($prog['completion_percentage']); ?>%
        </div>
      </div>
    </td>
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
  </tr>
<?php
    }
?>
</tbody> 