<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCommentsFormRequest;
use App\Models\{Comment, User};
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;
    protected $user;

    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    public function index($idUser)
    {
        $user = $this->user->find($idUser);

        if (!$user) {
            return redirect()->back();
        }

        // busco todos os comentários
        $comments = $user->comments()->get();

        return view('users.comments.index', compact('user', 'comments'));
    }

    public function create($idUser)
    {
        $user = $this->user->find($idUser);

        if (!$user) {
            return redirect()->back();
        }

        return view('users.comments.create', compact('user'));
    }

    public function store(Request $request, $idUser)
    {
        $user = $this->user->find($idUser);

        if (!$user) {
            return redirect()->back();
        }

        $user->comments()->create([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $user->id);
    }
}
