<?php require_once __VIEW_PATH . '/defHeader.php';?>

<p id="notice">
  <?php echo isset($view_flash) ? $view_flash : '';?>
</p>

<h1>The list of students</h1>
<p>
  <?php echo isset($view_out) ? $view_out : '';?>
</p>

<form class="new_stud" id="new_stud" action="<?php echo __ROOT_URL;?>" accept-charset="UTF-8" method="get">
  <input type="hidden" name="rt" value="student&#47;deletesel">

<table>
  <thead>
    <tr>
      <th></th>
      <th>First_name</th>
      <th>Last_name</th>
      <th>Sex</th>
      <th>Grp</th>
      <th>Faculty</th>
      <th colspan="2"></th>
    </tr>
  </thead>

    <tbody>
    <?php
if (isset($view_rows)) {
	while ($row = $view_rows->fetch(PDO::FETCH_LAZY)) {
		?>
      <tr>
      <td><input type="checkbox" name="dt-stud_check_<?php echo $row['id'];?>"/></td>
        <td><?php echo $row['first_name'];?></td>
        <td><?php echo $row['last_name'];?></td>
        <td><?php echo $row['sex'];?></td>
        <td><?php echo $row['grp'];?></td>
        <td><?php echo $row['faculty'];?></td>
        <td><a href="<?php echo __ROOT_URL . '?rt=student/edit&dt-id=' . $row['id'];?>">Edit</a></td>
        <td><a href="<?php echo __ROOT_URL . '?rt=student/delete&dt-id=' . $row['id'];?>">Destroy</a></td>
      </tr>
    <?php
}
}
?>
  </tbody>
</table>

<br>

<div class="actions">
    <input type="submit" name="dt-commit" value="Delete selected students" />
  </div>
</form>
<p>
<a href="<?php echo __ROOT_URL . '?rt=student/newrt';?>" >New Stud</a>
<a href="<?php echo __ROOT_URL;?>">To the list of students</a>
</p>

<?php require_once __VIEW_PATH . '/defFooter.php';?>
