<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public $notification;
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;

    }
    public function index(Request $request)
    {
        if(auth('customer')->user()){
            $user_id = auth('customer')->user()->id;
            $guard = 'customer';
        }else {
            $user_id = auth('employee')->user()->id;
            $guard = 'employee';
        }
        $notification = $this->notification->where([
            'user_id'=>$user_id,
            'guard'=>$guard,
        ])->latest()->paginate(10);
        return $this->apiResponse(NotificationResource::collection($notification));
    }


}

