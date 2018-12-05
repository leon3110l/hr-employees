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

}
