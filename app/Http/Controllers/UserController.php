<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\Console\Input\Input;


class UserController extends Controller
{
//    https://www.digitalocean.com/community/tutorials/simple-laravel-crud-with-resource-controllers

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();

        return View::make('admin.index')
            ->with('user', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return View::make('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/user/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $user = new User();
            $user->name       = $request->get('name');
            $user->email      = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->url = $request->get('url');

            $user->save();

            // redirect
            Session::flash('message', 'Successfully created user!');
            return Redirect::to('admin/user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $user = User::find($id);

        return View::make('admin.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);

        return View::make('admin.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        #todo: Password
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/user/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $user = User::find($id);
            $user->name       = $request->get('name');
            $user->email      = $request->get('email');
//            $user->password = $request->get('password');
            $user->url = $request->get('url');

            $user->save();

            // redirect
            Session::flash('message', 'Successfully updated user!');
            return Redirect::to('admin/user');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $shark = User::find($id);
        $shark->delete();

        // redirect
        Session::flash('message', 'Successfully deleted user!');
        if (auth()->user()->type='admin')
            return Redirect::to('admin/user');
        else
            return Redirect::to('/');
    }

    public function look(){
        $data = User::inRandomOrder()
            ->where('isActive', true)
            ->limit(1)
            ->get();
        return Redirect::to($data[0]->url);
    }
}

