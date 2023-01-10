<?php

namespace App\Http\Controllers;

use App\Http\Resources\MemberResource;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMemberRequest;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function token()
    {
        return auth()->user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        //return auth()->user();
        $member = Member::all();
        return MemberResource::collection($member);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return MemberResource|string
     */
    public function store(StoreMemberRequest $request)
    {
        DB::beginTransaction();

        try {

             $request->validated();

            $member = Member::create($request->only('name', 'address'));
            if ($images = $request->file('image')) {
                foreach ($images as $image) {
                    $image->store('member', 'public');
                    $member->image()->create([
                        'member_id' => $member->id,
                        'file_path' => "storage/member/" . $image->hashName()
                    ]);
                }
            }
            DB::commit();
            return new MemberResource($member);
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return MemberResource
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return new MemberResource($member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return MemberResource
     */
    public function update(StoreMemberRequest $request, $id)
    {
        $validated = $request->validated();

        $member = Member::findOrFail($id);
        $member->name = $request->name;
        $member->address = $request->address;
        $member->image = $request->image;

        if ($member->save()) {
            return new MemberResource($member);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return MemberResource
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        if ($member->delete()) {
            return new MemberResource($member);
        }
    }
}
