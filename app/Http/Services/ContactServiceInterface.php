<?php


namespace App\Http\Services;


interface ContactServiceInterface
{
    public function getAll();
    public function create($request);
    public function delete($id);
    public function search($keywork);
    public function findById($id);

}
