<?php


namespace App\Http\Repositories;


use App\Contact;

class ContactRepo implements ContactRepoInterface
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function getAll()
    {
        return $this->contact->all();
    }

    public function findById($id)
    {
        return $this->contact->findOrFail($id);
    }

    public function create($obj)
    {
        $obj->save();
    }

    public function delete($obj)
    {
        $obj->delete();
    }

    public function search($keywork)
    {
        return Contact::where('first_name','LIKE','%'.$keywork.'%')->orWhere('last_name','LIKE','%'.$keywork.'%')->get();
    }
}
