<?php
$view_id = isset($view_row->id) ? $view_row->id : '';
$view_first_name = isset($view_row->first_name) ? $view_row->first_name : '';
$view_last_name = isset($view_row->last_name) ? $view_row->last_name : '';
$view_sex = isset($view_row->sex) ? $view_row->sex : '';
$view_grp = isset($view_row->grp) ? $view_row->grp : '';
$view_faculty = isset($view_row->faculty) ? $view_row->faculty : '';
?>

  <input type="hidden" name="dt-stud_id" value="<?php echo $view_id;?>">
  <div class="field">
    <label for="stud_first_name">First name</label><br>
    <input type="text" name="dt-stud_first_name" id="stud_first_name" value="<?php echo $view_first_name;?>" />
  </div>
  <div class="field">
    <label for="stud_last_name">Last name</label><br>
    <input type="text" name="dt-stud_last_name" id="stud_last_name" value="<?php echo $view_last_name;?>" />
  </div>
  <div class="field">
    <label for="stud_sex">Sex is Man?</label><br>
    <input name="dt-stud_sex" type="hidden" value="female" />
    <input type="checkbox" value="male" name="dt-stud_sex" id="stud_sex" <?php echo ($view_sex == 'male') ? 'checked' : '';?> />
  </div>
  <div class="field">
    <label for="stud_grp">Group</label><br>
    <input type="text" name="dt-stud_grp" id="stud_grp" value="<?php echo $view_grp;?>" />
  </div>
  <div class="field">
    <label for="stud_faculty">Faculty</label><br>
    <input type="text" name="dt-stud_faculty" id="stud_faculty" value="<?php echo $view_faculty;?>" />
  </div>
