<?php

namespace App\Http\Controllers\FrontEnd;

use Config;
use App\Blog;
use App\BlogParts;
use App\Blog_category;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontEnd\ViewController;

class FrontEndController extends ViewController
{
    public function getApp(){
    	return view(Config('page-settings.Folder'). '.front-end.app')->with([
    		'header' => $this->getHeader('App', 'white')
    	]);
    }

    public function getBlog(){
    	return view(Config('page-settings.Folder'). '.front-end.blog')->with([
    		'header' => $this->getHeader('Blog', 'blue'),
    		'footer' => $this->getFooter(),
            'blogs' => Blog::where('blog_show', 1)->get(),
            'blog_categories' => Blog_category::all()
    	]);
    }
    public function getBlogArticle($slug){
        return view(Config('page-settings.Folder'). '.front-end.blog-article')->with([
            'header' => $this->getHeader('Blog', 'blue'),
            'footer' => $this->getFooter(),
            'blog' => Blog::where('blog_show', 1)->where('blog_slug', $slug)->first(),
            'blog_categories' => Blog_category::all(),
            'articles' => BlogParts::where('blog_id', Blog::where('blog_show', 1)->where('blog_slug', $slug)->first()->id)->get()
        ]);
    }
}
