<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCommentRequest;
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

    public function index(Request $request, $idUser)
    {
        $user = $this->user->find($idUser);

        if (!$user) {
            return redirect()->back();
        }

        // busco todos os comentários
        $comments = $user->comments()->where('body', 'LIKE', "%$request->search%")->get();

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

    public function store(StoreUpdateCommentRequest $request, $idUser)
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

    public function destroy($idUser, $idComment)
    {
        $user = $this->user->find($idUser);

        if (!$user) {
            return redirect()->back();
        }

        $this->comment->destroy($idComment);

        return redirect()->route('comments.index', $user->id);
    }

    public function show($idUser, $idComment)
    {
        $user = $this->user->find($idUser);

        if (!$user) {
            return redirect()->back();
        }

        $comment = $this->comment->find($idComment);

        return view('users.comments.show', compact('user', 'comment'));
    }

    public function edit($idUser, $idComment)
    {
        $user = $this->user->find($idUser);

        if (!$user) {
            return redirect()->back();
        }

        $comment = $this->comment->find($idComment);

        return view('users.comments.edit', compact('user', 'comment'));
    }

    public function update(Request $request, $idUser, $idComment)
    {
        $user = $this->user->find($idUser);

        if (!$user) {
            return redirect()->back();
        }

        $comment = $this->comment->find($idComment);

        if (!$comment) {
            return redirect()->back();
        }

        // dd($data);

        $comment->update([
            "body" => $request->body,
            "visible" => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $user->id);
    }
}
