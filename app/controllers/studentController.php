<?php

Class studentController Extends baseController {

	public function index() {
		$rows = $this->registry->modelStudent->all();
		$this->registry->template->view_rows = $rows;
		$this->registry->template->show('studentList');
	}

	public function newrt() {
		$this->registry->template->show('studentNew');
	}

	public function create() {
		$mstudent = $this->registry->modelStudent;
		$local_req = $this->request;

		$mstudent->first_name = $local_req->get('stud_first_name');
		$mstudent->last_name = $local_req->get('stud_last_name');
		$mstudent->sex = $local_req->get('stud_sex');
		$mstudent->faculty = $local_req->get('stud_grp');
		$mstudent->group = $local_req->get('stud_faculty');
		$mstudent->save();

		$this->registry->template->view_flash = 'Stud was successfully created.';
		$this->index();
	}

	public function edit() {
		$local_req = $this->request;
		$mstudent = $this->registry->modelStudent;

		$mstudent->id = $local_req->get('id');

		$this->registry->template->view_row = $mstudent->find();
		$this->registry->template->show('studentEdit');
	}

	public function update() {
		$local_req = $this->request;
		$mstudent = $this->registry->modelStudent;

		$mstudent->id = $local_req->get('stud_id');
		$mstudent->first_name = $local_req->get('stud_first_name');
		$mstudent->last_name = $local_req->get('stud_last_name');
		$mstudent->sex = $local_req->get('stud_sex');
		$mstudent->group = $local_req->get('stud_grp');
		$mstudent->faculty = $local_req->get('stud_faculty');
		$mstudent->save();

		$this->registry->template->view_flash = 'Student was successfully created.';
		$this->index();
	}

	public function delete() {
		$local_req = $this->request;
		$mstudent = $this->registry->modelStudent;

		$id = $local_req->get('id');
		error_log('>>>>>>>>> delete ID = ' . $id);
		$mstudent->id = $id;
		$mstudent->delete();

		$this->registry->template->view_flash = 'Student with id=' . $id . ' was successfully deleted.';
		$this->index();
	}

	public function deletesel() {
		$local_req = $this->request;
		$mstudent = $this->registry->modelStudent;

		$items = $local_req->getReqSelItems();
		$mstudent->delete_selected($items);

		$this->registry->template->view_flash = "Selected students (" . implode($items, ', ') . ") was successfully deleted.";
		$this->index();
	}
}

?>
