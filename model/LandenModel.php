<?php

require_once "DataHandler.php";

class LandenModel {

    public function __construct() {
        $this->dataHandler = new DataHandler("localhost", "landen", "root", "");
    }

    public function readContinenten() {
        return $this->dataHandler->readData(
            "SELECT continent, land, stad, stad_code, inwoners FROM `continenten` INNER JOIN `landen` ON `continenten`.`continent_code` = `landen`.`continent_code` INNER JOIN `steden` ON `steden`.`land_code` = `landen`.`land_code`"
        );
    }

    public function readStad($stad_code) {
        return $this->dataHandler->readData(
            "SELECT continent, land, stad, inwoners FROM `continenten` INNER JOIN `landen` ON `continenten`.`continent_code` = `landen`.`continent_code` INNER JOIN `steden` ON `steden`.`land_code` = `landen`.`land_code` WHERE `steden`.`stad_code` = :stad",
            [
                ":stad" => $stad_code
            ]
        );
    }

}