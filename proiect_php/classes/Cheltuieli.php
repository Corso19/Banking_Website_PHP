<?php

class Cheltuieli extends Connection
{
    public $id;

    public function __construct($html = false)
    {
        $this->html = $html;
    }

    public function showAll()
    {
        $this->connect();

        $select = 'SELECT `id`,`title`, `value` FROM `cheltuieli` ;';

        $cheltuieli = $this->select($select);

        return $this->html->render('cheltuieli', $cheltuieli);
    }

    public function delete($array)
    {
        if (!is_array($array)) return false;
        $this->connect();

        foreach ($array as $id) {
            $this->delete("DELETE FROM `cheltuieli` WHERE `id`='" . $id . "'");
        }
    }
}
