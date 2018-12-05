<?php

require_once "model/LandenModel.php";
require_once "model/HTMLElements.php";

class HomeController {

    public function __construct() {
        $this->landen = new LandenModel();
    }

    public function home() {
        $continenten = $this->landen->readContinenten();

        foreach ($continenten as $key => $value) {
            $continenten[$key]["stad"] = "<a href='/HomeController/stad/$value[stad_code]'>$value[stad]</a>";
            unset($continenten[$key]["stad_code"]);
        }

        $output = [];
        foreach ($continenten as $key => $continent) {
            $new = $continent;
            unset($new["continent"]);
            unset($new["land"]);
            $new["inwoners"] = number_format($new["inwoners"], null, ",", ".");
            $output[$continent["continent"]][$continent["land"]][] = $new;
        }

        include "view/table.php";
    }

    public function stad($id) {
        $stad = $this->landen->readStad($id);

        echo HTMLElements::table($stad);
    }

}
