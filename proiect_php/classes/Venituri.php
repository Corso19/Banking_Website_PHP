<?php

class Venituri extends Connection
{
    public $id;

    public function __construct($html = false)
    {
        $this->html = $html;
    }

    public function showAll()
    {
        $this->connect();

        $select = 'SELECT `id`,`title`, `value` FROM `venituri` ;';

        $venituri = $this->select($select);

        return $this->html->render('venituri', $venituri);
    }

    public function delete($array)
    {
        if (!is_array($array)) return false;
        $this->connect();

        foreach ($array as $id) {
            $this->delete("DELETE FROM `venituri` WHERE `id`='" . $id . "'");
        }
    }

    

}
