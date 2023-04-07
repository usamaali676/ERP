<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\Jsonify;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use Jsonify;
   public function index()
   {
    DB::beginTransaction();
    try {
        $data = User::all();
        return self::jsonSuccess(message: '', data: $data);
    }
    catch (Exception $exception) {
        DB::rollBack();
        return self::jsonError($exception->getMessage());
    }
   }
}
