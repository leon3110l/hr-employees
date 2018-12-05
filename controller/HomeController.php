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

        $data = $this->addButtons($data);

        $table = HTMLElements::table($data, "table");

        include "view/table.php";
    }

    public function addButtons($array) {
        foreach ($array as $key => $value) {
            $array[$key]["actions"] = "<a href='".HTTP_DIR."/home/home/$value[employee_id]'>read</a>";
        }

        return $array;
    }

    public function departments($id = null) {
        $data = $this->departments->read($id);

        $table = HTMLElements::table($data, "table");

        include "view/table.php";
    }
}
