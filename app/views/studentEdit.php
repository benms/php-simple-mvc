<?php require_once __VIEW_PATH . '/defHeader.php';?>

<h1>Edit Student card.</h1>

<form class="new_stud" id="new_stud" action="<?php echo __ROOT_URL;?>" accept-charset="UTF-8" method="get">
  <input type="hidden" name="rt" value="student&#47;update">

<?php require_once __VIEW_PATH . '/studentPartForm.php';?>

  <div class="actions">
    <input type="submit" name="dt-commit" value="Update student card" />
  </div>
</form>

<a href="<?php echo __ROOT_URL;?>">To the list of students</a>

<?php require_once __VIEW_PATH . '/defFooter.php';?>