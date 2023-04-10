<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermCollection;
use App\Http\Resources\PermResource;
use Illuminate\Http\Request;
use App\Models\perm;
use App\Traits\Jsonify;
use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\DB;

class PermController extends Controller
{
    use Jsonify;
    public function index()
    {
        DB::beginTransaction();
        try{
            $data = (new PermCollection(Perm::with(['roles'])->get()));
            return self::jsonSuccess(message: 'Permissions', data: $data);
        }
        catch(Exception $exception){
            DB::rollBack();
            return self::jsonError($exception->getMessage());
        }
    }
}
