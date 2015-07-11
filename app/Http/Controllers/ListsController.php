<?php

namespace Todo\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use Todo\Http\Requests;
use Todo\Http\Controllers\Controller;
use Todo\Repositories\ListRepository;
use Todo\UserList;

class ListsController extends Controller
{

    /**
     * @var ListRepository
     */
    private $lists;

    /**
     * @var Guard
     */
    private $auth;

    /**
     * Constructor
     *
     * @param Guard $auth
     * @param ListRepository $lists
     */
    public function __construct(
        Guard $auth,
        ListRepository $lists
    )
    {
        $this->lists = $lists;
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if ( ! $user = $this->auth->user())
        {
            return redirect()->route('index');
        }

        $lists = UserList::with(['items'])->paginate(5);
        return view('lists.index', compact('lists', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if ( ! $user = $this->auth->user())
        {
            return redirect()->route('index');
        }

        return view('lists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = \Input::all();
        if ( ! $user = $this->auth->user())
        {
            return redirect()->route('index');
        }

        $rules = [
            'name' => 'required|max:50',
        ];

        $messages = [
            'name.required' => 'The list name is required',
        ];

        $validator = \Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $list = UserList::create([
            'user_id' => $user->id,
            'name' =>  $data['name']
        ]);


        if ( ! $list)
        {
            return redirect()->back()->withInput()->with('errors', 'You broke the site.');
        }

        return redirect()->route('lists.index')->with('success', 'List Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
