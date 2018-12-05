<?php
require_once "DataHandler.php";

class DepartmentsModel {

    public function __construct() {
        $this->dataHandler = new DataHandler(DB_HOST, DB_DB, DB_USERNAME, DB_PASSWORD);
    }

    public function read($id = null) {

        if($id)
            return $this->dataHandler->readData(
                "SELECT * FROM `departments` WHERE `department_id` = :id",
                [
                    ":id" => $id
                ]
            );

        return $this->dataHandler->readData(
            "SELECT * FROM `departments`"
        );
    }

    public function delete($id = NULL) {
        if($id) {
            $this->dataHandler->deleteData(
                "DELETE FROM `departments` WHERE `department_id` = :id",
                [
                    ":id" => $id
                ]
            );
            return "record with id $id has been deleted";

        } else {
            return "no id has been given";
        }
    }

    public function update($id = NULL) {
        // $department_id = $_POST['department_id'];

        if (isset($_POST) && isset($_POST['submit']) && $id) {
            $department_name = $_POST['department_name'];
            $location_id = $_POST['location_id'];
            $manager_id = $_POST['manager_id'];

            $this->dataHandler->updateData(
                "UPDATE `departments`
                SET `department_name`= :department_name,`location_id`= :location_id,`manager_id`= :manager_id
                WHERE department_id = :id",
                [
                    ":department_name" => $department_name,
                    ":location_id" => $location_id,
                    ":manager_id" => $manager_id,
                    ":id" => $id,
                ]
            );
            return "showSuccess";
        }

        // show form
        else if($id) {
            return "showForm";

        } else {
            return "showFailure1";
        }

    }

}
