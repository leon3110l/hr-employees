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

        $table = HTMLElements::table($data, "table");

        include "view/table.php";
    }

    public function departments($id = null) {
        $data = $this->departments->read($id);

        $table = HTMLElements::table($data, "table");

        include "view/table.php";
    }

    function departmentsDelete($id = null) {
        $data = $this->departments->delete($id);

        // $table = HTMLElements::table($data, "table");

        // include "view/table.php";
        echo $data;
    }
}
