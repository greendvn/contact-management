<?php


namespace App\Http\Repositories;


interface ContactRepoInterface
{
    public function getAll();
    public function findById($id);
    public function create($obj);
    public function delete($obj);
    public function search($keywork);

}
