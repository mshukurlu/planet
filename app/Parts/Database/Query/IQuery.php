<?php
namespace App\Parts\Database\Query;

interface IQuery
{
    public function all();
    public function where($column,$operator,$value);
    public function find($id);
    public function get();
}
