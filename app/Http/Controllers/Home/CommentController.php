<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\StoreCommentRequest;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->user()->id;

        Comments::query()->create($validated);

        return back();
    }
}
