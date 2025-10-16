<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * BlogController
 *
 * Handles displaying blog posts to the public
 */
class BlogController extends Controller
{
    /**
     * Display all published blog posts.
     *
     * @return View
     */
    public function index(): View
    {
        $posts = Post::with('author')
            ->published()
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('blog.index', compact('posts'));
    }

    /**
     * Display a single blog post.
     *
     * @param string $slug
     * @return View
     */
    public function show(string $slug): View
    {
        $post = Post::with('author')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('blog.show', compact('post'));
    }
}
