<?php


namespace App\Http\Services;


use App\Contact;
use App\Http\Repositories\ContactRepoInterface;

class ContactService implements ContactServiceInterface
{
    protected $contacRepo;

    public function __construct(ContactRepoInterface $contacRepo)
    {
        $this->contacRepo = $contacRepo;
    }


    public function getAll()
    {
        return $this->contacRepo->getAll();
    }

    public function create($request)
    {
        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->address = $request->address;
        if(!$request->hasFile('avatar')){
            $contact->avatar= $request->avatar;
        } else {
            $avatar = $request->avatar;
            $avatarName = date('Y-m-d H:i:s').$avatar->getClientOriginalName();
            $request->avatar->storeAs('public/images/contact',$avatarName);
            $contact->avatar = $avatarName;
        }
        $this->contacRepo->create($contact);

    }

    public function delete($id)
    {
        $contact = $this->contacRepo->findById($id);
        $this->contacRepo->delete($contact);
    }

    public function search($request)
    {
        $keywork = $request->search;
        return $this->contacRepo->search($keywork);
    }

    public function findById($id)
    {
        return $this->contacRepo->findById($id);
    }
}
