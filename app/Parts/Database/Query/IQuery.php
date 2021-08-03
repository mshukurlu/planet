<?php
namespace App\Parts\Database\Query;

interface IQuery
{
    public function all($table);
    public function where($column,$operator,$value);
    public function find($id);
    public function get();
    public function query();
    public function select($table,$columns,$conditions);
}
