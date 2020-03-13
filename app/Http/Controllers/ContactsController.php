<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Group;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ContactsController extends Controller
{
    /**
     *  set pagination limit
     * @var int
     */
    private $limit = 5;

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        if ($group_id = $request->get('group_id')){
            $contacts = DB::table('contacts')->where('group_id', $group_id)->paginate($this->limit);
        }else{
            $contacts = Contact::paginate($this->limit);
        }
        return view('contacts.index', compact('contacts'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $groups = Group::all()->map(function ($item){
            return collect($item)->only(['id', 'name']);
        });
        return view('contacts.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
