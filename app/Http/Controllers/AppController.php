<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function authors()
    {
        $data = $this->Api_call('https://symfony-skeleton.q-tests.com/api/v2/authors?orderBy=id&direction=ASC&limit=12&page=1');
        $authors = $data['items'];
        return view('authors.authors', ['authors' => $authors]);

    }

    public function authors_detail($author_id)
    {
        $author = $this->Api_call('https://symfony-skeleton.q-tests.com/api/v2/authors/' . $author_id);
        
        return view('authors.author_detail', ['author' => $author]);
    }

    public function book()
    {
        $data = $this->Api_call('https://symfony-skeleton.q-tests.com/api/v2/authors?orderBy=id&direction=ASC&limit=12&page=1');
        $authors = $data['items'];
        return view('authors.books.create', ['authors' => $authors]);
    }

    public function profile()
    {
        $user = $this->Api_call('https://symfony-skeleton.q-tests.com/api/v2/me');
        return view('profile', ['user' => $user]);
    }

    public function create_book(Request $request)
    {
        
        $author = [];
        $author['author'] = array("id" => $request->author);
        $author['title'] = $request->title;
        $author['release_date'] = $request->release_date;
        $author['description'] = $request->description;
        $author['isbn'] = $request->isbn;
        $author['format'] = $request->format;
        $author['number_of_pages'] = (int)$request->number_of_pages;
        
        $data = $this->Api_call('https://symfony-skeleton.q-tests.com/api/v2/books' , "POST" , $author);
        return redirect()->back()->with('message', 'created!');
        
    }

    public function Api_call($url , $method = "GET" , $params = [])
    {
        $access_token = session('token_key');
        if($method == "GET")
        {
            $response =  Http::withOptions(['verify' => false])->withHeaders([
                'Authorization' => 'Bearer ' . $access_token,
            ])->get($url);

        }else{
            $response =  Http::withOptions(['verify' => false])->withHeaders([
                'Authorization' => 'Bearer ' . $access_token,
            ])->post($url, $params);
        }
        return $response->json();
    }
}
