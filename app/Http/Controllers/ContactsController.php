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
        Contact::create($request->all());
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


    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());
        return redirect('/contacts')->with('success', 'Your contact has been updated.');    }


    public function destroy($id)
    {
        //
    }
}
