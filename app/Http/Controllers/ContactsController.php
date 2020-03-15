<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Group;
use App\Http\Requests\ContactRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ContactsController extends Controller
{
    /**
     *  set pagination limit
     * @var int
     */
    private $limit = 5;

    private $upload_dir = '/public/uploads/';

    public function __construct()
    {
        $this->upload_dir = base_path() . $this->upload_dir;
    }

    public function index(Request $request)
    {
        if ($group_id = $request->get('group_id')){
            $groups = Group::all();
            $contacts = Contact::where('group_id', $group_id)->orderby('id', 'desc')->paginate($this->limit);
        }else{
            $contacts = Contact::orderby('id', 'desc')->paginate($this->limit);
        }

        return view('contacts.index', compact('contacts','groups'));
    }


    public function create()
    {
        $groups = Group::all()->map(function ($item){
            return collect($item)->only(['id', 'name']);
        });
        $contact = new Contact();
        return view('contacts.create', compact('groups','contact'));
    }

    /**
     * @param ContactRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(ContactRequest $request)
    {
        $data = $this->uploadProfileImage($request);
        Contact::create($data);
        return redirect('contacts')->with('success', 'Contact Save');
    }


    public function show($id)
    {
        //
    }


    public function edit(Contact $contact)
    {
        $groups = Group::all()->map(function ($item){
            return collect($item)->only(['id', 'name']);
        });
        return  \view('contacts.edit', compact('contact','groups'));
    }


    public function update(ContactRequest $request, $id)
    {
        $contact = Contact::find($id);
        $oldPhoto = $contact->photo;

        $data = $this->uploadProfileImage($request);
        $contact->update($data);

        if ($oldPhoto !== $contact->photo){
            $this->removePhoto($oldPhoto);
        }

        return redirect('contacts')->with('success', 'Your contact has been updated.');
    }


    public function destroy($id)
    {
        $contact = Contact::find($id);
        $this->removePhoto($contact->photo);
        $contact->delete($contact);
        return redirect('contacts')->with('success', 'Your contact has been deleted.');
    }

    public function uploadProfileImage(ContactRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = $photo->getClientOriginalName();
            $destination = base_path() . '/public/uploads/';
            $photo->move($destination, $fileName);
            $data['photo'] = $fileName;
        }
        return $data;
    }

    public function removePhoto($photo)
    {
        if (!empty($photo)){
            $file_path =  $this->upload_dir . $photo;
            if (file_exists($file_path)){
                unlink($file_path);
            }
        }
    }

}
