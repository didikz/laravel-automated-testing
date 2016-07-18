<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = $this->user->orderBy('created_at', 'desc')->get();
        return view('users.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @param UserFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserFormRequest $request)
    {
        $data = $request->except('_token');
        $data['password'] = bcrypt($data['password']);
        if($this->user->create($data)) {
            flash('Data has been saved successfully', 'success');
            return redirect()->route('users.index');
        }
        flash('Error happened', 'danger');
        return redirect()->back();
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
        $user = $this->user->find($id);
        return view('users.edit', compact('user'));
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
        if($this->user->where('id', $id)->update($request->except(['_token', '_method']))) {
            flash('Data has been updated successfully', 'success');
            return redirect()->route('users.index');
        }
        flash('Error happened', 'danger');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->where('id', $id)->delete();
        flash('Data has been deleted successfully', 'success');
        return redirect()->route('users.index');
    }
}
