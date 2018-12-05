<?php

require_once "model/DepartmentsModel.php";
require_once "model/EmployeesModel.php";
require_once "model/HTMLElements.php";

class HomeController {

    public function __construct() {
        $this->employees = new EmployeesModel();
        $this->departments = new DepartmentsModel();
    }

    public function home($id = null) {
        $data = $this->employees->read($id);

        foreach ($data as $key => $value) {
            $data[$key]["actions"] = "<a class='btn btn-primary' href='".HTTP_DIR."/home/home/$value[employee_id]'>read</a>";
        }

        $table = HTMLElements::table($data, "table");

        include "view/table.php";
    }

    public function departments($id = null) {
        $data = $this->departments->read($id);

        foreach ($data as $key => $value) {
            $data[$key]["actions"] = "<a class='btn btn-primary' href='".HTTP_DIR."/home/departments/$value[department_id]'>read</a>";
            $data[$key]["actions"] .= "<a class='btn btn-warning' href='".HTTP_DIR."/home/departmentsUpdate/$value[department_id]'>update</a>";
            $data[$key]["actions"] .= "<a class='btn btn-danger' href='".HTTP_DIR."/home/departmentsDelete/$value[department_id]'>delete</a>";
        }

        $table = HTMLElements::table($data, "table");

        include "view/table.php";
    }

    public function departmentsDelete($id = null) {
        $data = $this->departments->delete($id);

        // $table = HTMLElements::table($data, "table");

        // include "view/table.php";
        echo $data;
    }

    public function departmentsUpdate($id = null) {
        $status = $this->departments->update($id);

        if ($status == "showSuccess") {
            header("location: ".  HTTP_DIR . "/home/departments/$id");
        }

        else if ($status == "showForm") {
            $data = $this->departments->read($id);
            $data = $data[0];
            include "view/updateForm.php";
        }

        else if ($status == "showFailure1") {

        }
    }
}
