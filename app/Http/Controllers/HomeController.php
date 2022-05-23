<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\models\Post;
use Illuminate\Database\Eloquent\Relations\Relation;
use PhpParser\Node\Name\Relative;

class HomeController extends Controller
{
    var $posts;
    var $users;
    var $cats;
    public function __construct()
    {
        $this->middleware('auth');
        // $this->posts = DB::table('posts')->with('tags')->get();
        $this->posts = Post::with('tags')->get();
        $this->users = DB::table('users')->get();
        $this->cats = DB::table('categories')->get();
        
    }

    public function index()
    {
        $data['posts']=$this->posts;
        $data['users']=$this->users;
        $data['cats'] =$this->cats;
        return view('home')->with($data);
    }
}
