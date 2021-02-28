<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the members.
     *
     * @return JsonResponse
     */
    public function list()
    {
        return response()->json(Member::all());
    }

    /**
     * Create member.
     *
     * @param MemberRequest $request
     * @return JsonResponse
     */
    public function create(MemberRequest $request)
    {
        $request = $request->all();
        $member = Member::create(
            [
                'first_name' => $request['firstName'],
                'last_name' => $request['lastName'],
                'phone' => $request['phone'],
                'amount_invest' => $request['amountInvest'],
                'email' => $request['email'],
                'password' => $request['password'],
                'agree' => $request['agree'],
                'subscribe' => $request['subscribe'],
                'on_vacation' => false
            ]
        );

        return response()->json($member);
    }

    /**
     * Update member.
     *
     * @param Request $request
     * @param string  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request = $request->all();

        $member = Member::findOrFail($id);
        $member->on_vacation = $request['onVacation'];
        $member->save();

        return response()->json(Member::findOrFail($id));
    }

}
