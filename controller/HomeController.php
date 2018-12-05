<?php

require_once "model/EmployeesModel.php";
require_once "model/HTMLElements.php";

class HomeController {

    public function __construct() {
        $this->employees = new EmployeesModel();
    }

    public function home($id = null) {
        $data = $this->employees->read($id);

        $table = HTMLElements::table($data, "table");

        include "view/table.php";
    }

}
