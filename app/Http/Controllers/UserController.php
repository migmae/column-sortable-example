<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{

    public function index(User $user)
    {
        try {
            $users = $user->with(['detail', 'company'])->select(['*', 'name as nick_name'])->sortable()->paginate(10);

            return view('user', ['users' => $users]);
        } catch (\Kyslik\ColumnSortable\Exceptions\ColumnSortableException $e) {
            dd($e);
        }
    }
}
