<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
// use App\Traits_next\TwoFactorAuth;
use App\Traits\EmpUserTrait;
class UsersController extends Controller
{
    // use TwoFactorAuth; 
    use EmpUserTrait;   

}
