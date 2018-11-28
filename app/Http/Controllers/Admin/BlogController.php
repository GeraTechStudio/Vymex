<?php

namespace App\Http\Controllers\Admin;
use App\Blog;
use App\BlogParts;
use App\Blog_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Dirape\Token\Token;	
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\FrontEnd\ViewController;

class BlogController extends ViewController
{
	/*Show all articles of blog*/
    public function getTileBlog(){
    	return view(Config('page-settings.Folder'). '.admin.blog.tile-blog')->with([
    		'sidebar' => $this->getSidebarAdmin(),
    		'cap' => $this->getСapAdmin(),
    		'blogs' => Blog::all(),
    		'blog_categories' => Blog_category::all()
    	]);
    }

    /*Create New article of Blog and redirect to managet him*/
    public function СreateBlog(){
    	$newBlog = new Blog;
    	$newBlog->blog_desk_SEO = 'E';
    	$newBlog->blog_key_SEO = 'E';
    	$newBlog->save();
    	Storage::makeDirectory('public/blogs/blog-' . $newBlog->id);
    	return redirect()->route('manager-blog', ['id'=>$newBlog->id]);
    }

    /*Editor Blog*/
    public function ManagerBlog($id){
    	$blog = Blog::find($id);
    	return view(Config('page-settings.Folder'). '.admin.blog.create-blog')->with([
    		'sidebar' => $this->getSidebarAdmin(),
    		'cap' => $this->getСapAdmin(),
    		'blog_data' => $blog,
    		'block_parts' => BlogParts::where('blog_id', $id)->get(),
    		'blog_categories' => Blog_category::all()
    	]);
    }

    /*Add and change Main Information for article*/
    protected function chnageMainInfo(Request $request){
    	$blog = Blog::find($request->blog_id);
    	switch ($request->dataType) {
    		case 'name_article':
    			if(strlen($request->dataValue) > 0 && strlen($request->dataValue) <= $request->dataBound){
    				$blog->blog_name = $request->dataValue;
    				$blog->blog_slug = $request->dataSlug;
    				$blog->save();
    				return Response::json(['access'=>'allow', 'success_code' => 'a9']);
    			}else{
    				return Response::json(['access'=>'denied', 'error_code' => 'a8']);
    			}
    			break;
    		case 'SEO_description':
    			if(strlen($request->dataValue) > 0 && strlen($request->dataValue) <= $request->dataBound){
    				$blog->blog_desk_SEO = $request->dataValue;
    				$blog->save();
    				return Response::json(['access'=>'allow', 'success_code' => 'a9']);
    			}else{
    				return Response::json(['access'=>'denied', 'error_code' => 'a8']);
    			}
    			break;
    		case 'SEO_keys':
    			if(strlen($request->dataValue) > 0 && strlen($request->dataValue) <= $request->dataBound){
    				$blog->blog_key_SEO = $request->dataValue;
    				$blog->save();
    				return Response::json(['access'=>'allow', 'success_code' => 'a9']);
    			}else{
    				return Response::json(['access'=>'denied', 'error_code' => 'a8']);
    			}
    			break;
    		case 'blog_show':
    			if($request->dataValue == 0){
    				$blog->blog_show = 0;
    				$blog->save();
    				return Response::json(['access'=>'allow', 'success_code' => 'a20']);
    			}else{
    				if($blog->blog_name != "E" && $blog->blog_desk_SEO != "E" && $blog->blog_key_SEO != "E" && $blog->blog_img != "E" && $blog->blog_category != 0){
    					$blog->blog_show = 1;
    					$blog->save();
    					return Response::json(['access'=>'allow', 'success_code' => 'a19']);
    				}else{
    					return Response::json(['access'=>'denied', 'error_code' => 'a18', 'blog_show' => 'cancel']);
    				}
    			}
    			break;
    	}
    }

    /*Upload blog img*/
    protected function uploadBlogImg(Request $request){
    	if($request->hasFile('uploadBlogImg')){
    		$img = $request->file('uploadBlogImg');
    		$blog_img_name = (new Token())->Unique('blogs', 'blog_img', 30) . "." . $img->getClientOriginalExtension();

    		$img_full = Image::make($img->getRealPath());   
			$img_full->resize(1200, 750, function ($constraint) {
			    $constraint->upsize();
			});
			$img_full->save('storage/blogs/blog-' . $request->blog_id . '/' . $blog_img_name);

			$img_small = Image::make($img->getRealPath());   
			$img_small->resize(400, 250, function ($constraint) {
			    $constraint->upsize();
			});
			$img_small->save('storage/blogs/blog-' . $request->blog_id . '/small-' . $blog_img_name);
   			
			$blog = Blog::find($request->blog_id);
   			if($blog->blog_img != "E"){
   				unlink(storage_path('app/public/blogs/blog-' . $request->blog_id . '/' . $blog->blog_img));
   			}
   			
    		$blog->blog_img = $blog_img_name;
    		$blog->save();
    		return Response::json(['access'=>'allow', 'success_code' => 'v702', 'blog_img'=> url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $blog_img_name]);
    	}else{
    		return Response::json(['access'=>'denied', 'error_code' => 'a5']);
    	}
    }
    /*Get Category*/
    protected function getCategory(Request $request){
    	$blog = Blog::find($request->blog_id);
    	$categories = Blog_category::all();
    	if(!empty($categories)){
    		return Response::json(['access'=>'allow', 'categories' => $categories, 'blog_category_id' => $blog->blog_category]);
    	}else{
    		return Response::json(['access'=>'denied']);
    	}
    }
    /*Choose Cayegory*/
    protected function chooseCategory(Request $request){
    	$blog = Blog::find($request->blog_id);
    	$categories = Blog_category::find($request->category_id);
    	if(!empty($categories)){
    		$blog->blog_category = $request->category_id;
    		$blog->save();
    		return Response::json(['access'=>'allow', 'success_code' => 'a17', 'categories' => $categories]);
    	}else{
    		return Response::json(['access'=>'denied', 'error_code' => 'a10']);
    	}

    	
    }
    /*Create Category*/
    protected function createCategory(Request $request){
    	if(strlen($request->categoryName) <= 4){
    		return Response::json(['access'=>'denied', 'error_code' => 'a11']);
		}
		if(strlen($request->categoryName) > 160){
    		return Response::json(['access'=>'denied', 'error_code' => 'a12']);
		}
		$repeatCategory = Blog_category::where('category_name', $request->categoryName)->first();
		if(!empty($repeatCategory)){
			return Response::json(['access'=>'denied', 'error_code' => 'a13']);
		}
		$newCategory = new Blog_category;
		$newCategory->category_name = $request->categoryName;
		$newCategory->save();
		return Response::json(['access'=>'allow', 'success_code' => 'a14', 'newCategory'=> $newCategory]);
    }

    /*Edit Category*/
    protected function editCategory(Request $request){
    	if(strlen($request->categoryName) <= 4){
    		return Response::json(['access'=>'denied', 'error_code' => 'a11']);
		}
		if(strlen($request->categoryName) > 160){
    		return Response::json(['access'=>'denied', 'error_code' => 'a12']);
		}
		$editCategory = Blog_category::find($request->category_id);
		if($request->categoryName == $editCategory->category_name){
			return Response::json(['access'=>'allow', 'change' => 'notChange']);
		}
		$repeatCategory = Blog_category::where('category_name', $request->categoryName)->first();
		if(!empty($repeatCategory)){
			return Response::json(['access'=>'denied', 'error_code' => 'a13']);
		}
		$editCategory->category_name = $request->categoryName;
		$editCategory->save();
		return Response::json(['access'=>'allow', 'change' => 'Change', 'success_code' => 'a16']);
    }

    /*Delete Category*/
    protected function deleteCategory(Request $request){
    	$blogs = Blog::all();
    	foreach ($blogs as $blog) {
    		if($blog->blog_category == $request->category_id){
    			$blog->blog_category = 0;
    			$blog->save();
    		}
    	}
    	$delete_category = Blog_category::find($request->category_id);
    	if(!empty($delete_category)){
    		$delete_category->delete();
    		return Response::json(['access'=>'allow', 'success_code' => 'a15', 'deleteСategory'=> $request->category_id]);
    	}else{
    		return Response::json(['access'=>'denied', 'error_code' => 'a10']);
    	}
    }

    /*Add text block to article of Blog*/
    protected function uploadBlockText(Request $request){
    	$block_part = new BlogParts;
    	$block_part->blog_id = $request->blog_id;
    	$block_part->type = 'text';
    	$block_part->data = $request->BlockText;
    	$block_part->save();
    	return Response::json(['success_code' => 'a4', 'text_block' => $block_part->data, 'block_id' => $block_part->id]);
    }

    /*Add img block to article of Blog*/
    protected function uploadBlockImg(Request $request){
    	if($request->hasFile('upBlockImg')){
    		$block_part = new BlogParts;
    		$block_part->blog_id = $request->blog_id;
    		$block_part->type = 'img';
    		$img = $request->file('upBlockImg');
    		$block_img_name = (new Token())->Unique('blog_parts', 'img_name', 30) . "." . $img->getClientOriginalExtension();
    		$img_resize = Image::make($img->getRealPath());   

   			$img_resize->resize(null, 500, function ($constraint) {
			    $constraint->aspectRatio();
			});
   			$img_resize->save('storage/blogs/blog-' . $request->blog_id . '/' . $block_img_name);

   			switch ($request->imgType) {
   				case 1:
   					$block_part->data = '<div class="img-container"><img src="' . url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $block_img_name . '"></div>';
   					break;
   				case 2:
   					$block_part->data = '<div class="img-container" style="text-align:left;"><img src="' . url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $block_img_name . '" style="width:70%"></div>';
   					break;
   				case 3:
   					$block_part->data = '<div class="img-container" style="text-align:center;"><img src="' . url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $block_img_name . '" style="width:70%"></div>';
   					break;
   				case 4:
   					$block_part->data = '<div class="img-container" style="text-align:right;"><img src="' . url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $block_img_name . '" style="width:70%"></div>';
   					break;
   			}

    		$block_part->img_name = $block_img_name;
    		$block_part->save();
    		return Response::json(['access'=>'allow', 'success_code' => 'v702', 'img_block' => $block_part->data, 'block_id' => $block_part->id, 'block_type'=> $block_part->type]);
    	}else{
    		return Response::json(['access'=>'denied', 'error_code' => 'a5']);
    	}
    	
    }

    /*Get info about block*/
    protected function getBlock(Request $request){
    	$block_part = BlogParts::where('blog_id', $request->blog_id)->where('id', $request->block_Id)->first();
    	return Response::json($block_part);
    }
    /*Change data block*/
    protected function changeBlockText(Request $request){
    	$block_part = BlogParts::where('blog_id', $request->blog_id)->where('id', $request->block_id)->first();
    	$block_part->data = $request->BlockText;
    	$block_part->save();
    	return Response::json(['access'=>'allow', 'success_code' => 'v702', 'text_block' => $block_part->data, 'block_id' => $block_part->id]);
    }

    protected function changeBlockImg(Request $request){
    	$block_part = BlogParts::where('blog_id', $request->blog_id)->where('id', $request->block_id)->first();
    	switch ($request->imgType) {
   				case 1:
   					$block_part->data = '<div class="img-container"><img src="' . url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $block_part->img_name . '"></div>';
   					break;
   				case 2:
   					$block_part->data = '<div class="img-container" style="text-align:left;"><img src="' . url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $block_part->img_name . '" style="width:70%"></div>';
   					break;
   				case 3:
   					$block_part->data = '<div class="img-container" style="text-align:center;"><img src="' . url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $block_part->img_name . '" style="width:70%"></div>';
   					break;
   				case 4:
   					$block_part->data = '<div class="img-container" style="text-align:right;"><img src="' . url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $block_part->img_name . '" style="width:70%"></div>';
   					break;
   			}
   		$block_part->save();
    	return Response::json(['access'=>'allow', 'success_code' => 'v702', 'img_block' => $block_part->data, 'block_id' => $block_part->id, 'block_type'=> $block_part->type]);
    }

    protected function reloadBlockImg(Request $request){
    	if($request->hasFile('upBlockImg')){
    		$block_part = BlogParts::where('blog_id', $request->blog_id)->where('id', $request->block_id)->first();
    		$img = $request->file('upBlockImg');
    		$block_img_name = (new Token())->Unique('blog_parts', 'img_name', 30) . "." . $img->getClientOriginalExtension();
    		$img_resize = Image::make($img->getRealPath());   
   			$img_resize->resize(null, 500, function ($constraint) {
			    $constraint->aspectRatio();
			});
   			$img_resize->save('storage/blogs/blog-' . $request->blog_id . '/' . $block_img_name);
   			unlink(storage_path('app/public/blogs/blog-' . $request->blog_id . '/' . $block_part->img_name));
   			switch ($request->imgType) {
   				case 1:
   					$block_part->data = '<div class="img-container"><img src="' . url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $block_img_name . '"></div>';
   					break;
   				case 2:
   					$block_part->data = '<div class="img-container" style="text-align:left;"><img src="' . url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $block_img_name . '" style="width:70%"></div>';
   					break;
   				case 3:
   					$block_part->data = '<div class="img-container" style="text-align:center;"><img src="' . url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $block_img_name . '" style="width:70%"></div>';
   					break;
   				case 4:
   					$block_part->data = '<div class="img-container" style="text-align:right;"><img src="' . url('storage') . '/blogs/blog-' . $request->blog_id . '/' . $block_img_name . '" style="width:70%"></div>';
   					break;
   			}

    		$block_part->img_name = $block_img_name;
    		$block_part->save();
    		return Response::json(['access'=>'allow', 'success_code' => 'v702', 'img_block' => $block_part->data, 'block_id' => $block_part->id, 'block_type'=> $block_part->type]);
    	}else{
    		return Response::json(['access'=>'denied', 'error_code' => 'a5']);
    	}
    }

    protected function deleteBlock(Request $request){
    	$block_part = BlogParts::where('blog_id', $request->blog_id)->where('id', $request->block_id)->first();
    	if(!empty($block_part)){
    		switch ($block_part->type) {
    			case 'img':
    				unlink(storage_path('app/public/blogs/blog-' . $request->blog_id . '/' . $block_part->img_name));
    				$block_part->delete();
    				break;
    			case 'text':
    				$block_part->delete();
    				break;
    		}
    		return Response::json(['access'=>'allow', 'success_code' => 'a6']);	
    	}else{
    		return Response::json(['access'=>'denied', 'error_code' => 'a7']);
    	}
    }
}
