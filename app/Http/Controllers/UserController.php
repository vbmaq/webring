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
            $user->url = $request->get('url');

            $user->save();

            // redirect
            Session::flash('message', 'Successfully updated user!');
            return Redirect::to('admin/user');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser(Request $request){
        $user = User::find(auth()->user()->id);

        if ($request->get('name')) {
            $user->name = $request->get('name');
        }
        if ($request->get('email')) {
            $rules = array(
                'email'  => 'email',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('user/home')
                    ->withErrors($validator)
                    ->withInput($request->except('email'));
            }
            else {
                $user->email = $request->get('email');
                $user->email_verified_at = null;
                $user->save();
                $request->user()->sendEmailVerificationNotification();

            }
        }

        if ($request->get('password')){
            $rules = array(
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return Redirect::to('user/home')
                    ->withErrors($validator)
                    ->withInput($request->except('password'));
            }
            else {
                $user->password = bcrypt($request->get('password'));
            }

        }
        if ($request->get('url')) {
            $user->url = $request->get('url');
            $this->inspectUser($user);
        }

        $user->save();
        return Redirect::to('user/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

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

    public function inspect(){
        $data = User::inRandomOrder()
            ->where([
                'type' => 0,
                ])
            ->limit(5)
            ->get();

        foreach ($data as $user){
            $this->inspectUser($user);
        }
    }

    public function inspectUser($user){
        $url = $user->url;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $health = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $currentUser = User::find($user->id);
        if (!$health) {
            $currentUser->isActive=false;
        }
        else {
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $body = substr($response, $header_size);
            if (!$this->checkForURL($body)){
                $currentUser->isActive=false;
            }
            else {
                $currentUser->isActive=true;
            }
        }
        $currentUser->save();
    }

    public function checkForURL($body){
//        $url = '<a href="http://127.0.0.1:8000/">';
//        $url2 = '<a href="http://127.0.0.1:8000/look">';
        $url = '<a href="' . config('app.url') . '">';
        $url2 = '<a href="' . config('app.url') . 'look">';

        return (str_contains($body, $url) && str_contains($body, $url2));
    }
}

