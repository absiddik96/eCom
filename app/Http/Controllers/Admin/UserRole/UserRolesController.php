<?php

namespace App\Http\Controllers\Admin\UserRole;

use Session;
use Illuminate\Http\Request;
use App\Models\Admin\UserRole;
use App\Http\Controllers\Admin\AdminBaseController;

class UserRolesController extends AdminBaseController
{
    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            return view('admin.userRole.index')
                    ->with('roles',UserRole::all());
        }


        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $this->validate($request,[
                'name' => 'required|min:2|max:150|unique:user_roles',
                'role_for' => 'required|numeric',
            ]);

            $role = new UserRole();
            $role->name = strtolower($request->name);
            $role->slug = str_slug($request->name);
            $role->role_for = $request->role_for;

            if ($role->save()) {
                Session::flash('success', 'User role create successfull.');
            }

            return redirect()->back();
        }



        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Admin\UserRole  $userRole
         * @return \Illuminate\Http\Response
         */
        public function edit(UserRole $userRole)
        {
            return view('admin.userRole.edit')
                    ->with('role',$userRole);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Admin\UserRole  $userRole
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, UserRole $userRole)
        {
            $this->validate($request,[
                'name' => 'required|min:2|max:150|unique:user_roles,name,'.$userRole->id,
                'role_for' => 'required|numeric',
            ]);

            $userRole->name = strtolower($request->name);
            $userRole->slug = str_slug($request->name);
            $userRole->role_for = $request->role_for;

            if ($userRole->save()) {
                Session::flash('success', 'User role update successfull.');
            }

            return redirect()->route('user-role.index');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Admin\UserRole  $userRole
         * @return \Illuminate\Http\Response
         */
        public function destroy(UserRole $userRole)
        {
            if (count($userRole->users)) {
                Session::flash('info', 'This role belongs to some user. You can not delete it.');
                return redirect()->route('user-role.index');
            }

            if ($userRole->delete()) {
                Session::flash('success', 'User role delete successfull.');
            }

            return redirect()->route('user-role.index');
        }
    }
