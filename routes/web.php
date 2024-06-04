<?php

use App\Http\Requests\ProductRequest;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use \App\Models\Comment;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',function (){
 return view('layout.product.create');
})->name('create');

Route::get('/insert',function (productRequest $request){
    $input=[
        /*this key are column name in  database and value are input name in html tag*/
        'title'=>$request->title,
        'descript'=>$request->descript,
        'price'=>$request->price,
        'is_active'=>$request->is_active

    ];
    DB::table('products')->insert($input);
    /*methode of insert need (key:value) */
})->name('store');


Route::get('/{id}/edit',function ($id){
    $product=DB::table('products')->find($id);
    if(!$product){
        abort(404);
    }
    /*passing to edit blade*/
    return view('layout.product.update',compact('product'));
})->name('edit');

/*this route for update action*/
Route::match(['put','patch'],'{id}',function (productRequest $request,$id){

    $input=[
        /*this key are column name in  database and value are input name in html tag*/
        'title'=>$request->title,
        'descript'=>$request->descript,
        'price'=>$request->price,
        'is_active'=>$request->is_active

    ];
    DB::table('products')->where('id',$id)->update($input);
})->name('update');


Route::get('index',function (){
    $products=DB::table('products')->get();
    return view('layout.product.indexpro',compact('products'));
})->name('index');
/*this route for article*/
Route::get('saveArticle',function (){
    return view('layout.article.create_article');

});
Route::get('article',function(App\Http\Requests\ArticelRequest $articelRequest){
   /*Article::create($articelRequest->all());*/
    $input=[
        'title'=>$articelRequest->title,
        'content'=>$articelRequest->get('content'),
    ];
    $article=DB::table('articles')->insert($input);
})->name('article');
Route::get('{id}/article',function ($id){
    $article=Article::with('comments')->findOrFail($id);
    return view('layout.article.show',compact('article'));
})->name('show.article');

Route::match(['put','patch'],'{id}/comment',function (App\Http\Requests\CommentRequest $request,$id){
    /*Comment::create($request->all());*/
    $input=[
        'article_id'=>$id,
        'comment'=>$request->comment,
        'author'=>$request->author,
    ];
    $comment=DB::table('comments')->insert($input);
    return redirect()->back();
})->name('comment');

/*Salalalam*/
