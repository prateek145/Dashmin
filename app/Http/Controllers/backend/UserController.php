<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //code...
            $users = User::latest()->get();
            // dd($users);
            return view('backend.users.index', compact('users'));
        } catch (\Exception $th) {
            //throw $th;
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $rules = [
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'email' => 'required',
        //     'mobile_no' => 'required',
        //     'password' => 'required',
        //     'repassword' => 'required',
        //     'department' => 'required|email',
        // ];

        // $custommessages = [];

        // $this->validate($request, $rules, $custommessages);
        try {
            //code...
            // dd($request->all());
            $data = $request->all();
            unset($data['_token']);
            unset($data['password']);
            unset($data['repassword']);
            // dd($data);
            $data['password'] = Hash::make($request->password);
            // dd($data);
            User::create($data);
            return redirect()
                ->route('users.index')
                ->with('success', 'User Created');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
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
        // dd($id);
        $user = User::find($id);
        return view('backend.users.edit', compact('user'));
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
        try {
            //code...
            // dd($request->all());
            $data = $request->all();
            unset($data['_token']);
            unset($data['password']);
            unset($data['repassword']);
            // dd($data);
            $data['password'] = Hash::make($request->password);
            // dd($data);
            $user = User::find($id);
            $user->update($data);
            return redirect()
                ->back()
                ->with('success', 'User Updated.');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //code...
            $user = User::destroy($id);
            return redirect()
                ->back()
                ->with('success', 'Successfully User Delete.');
            // dd($audit);
        } catch (\Exception $th) {
            //throw $th;
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }
}
