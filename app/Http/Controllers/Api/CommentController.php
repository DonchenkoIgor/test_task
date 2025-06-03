<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private const PAGINATION_PER_PAGE = 10;
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product) : JsonResponse
    {
        return response()->json(
            $product->comments()->with('user:id,name')
                ->latest()
                ->paginate(self::PAGINATION_PER_PAGE)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Product $product) : JsonResponse
    {
        $comment = $product->comments()->create([
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
        ]);

        return response()->json($comment->load('user'), 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment) : JsonResponse
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return response()->json(['message' => 'Comment deleted']);
    }
}
