<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Feed;
use App\Article;
use URL;

use Carbon\Carbon;

class RssController extends Controller
{
    //
    public function index(){
    	$feed = new Feed;
		 // create new feed
	    // $feed = App::make("feed");

	    $posts = Article::select()->latest()->take(20)->get();

	    // create new feed
	    // $feed = App::make("feed");

	    // multiple feeds are supported
	    // if you are using caching you should set different cache keys for your feeds

	    // cache the feed for 60 minutes (second parameter is optional)
	    // $feed->setCache(60, 'laravelFeedKey');

	    // check if there is cached feed and build new only if is not
	    if (!$feed->isCached()){
	       // creating rss feed with our most recent 20 posts
	       // $posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

	       // set your feed's title, description, link, pubdate and language
	       $feed->title = 'หัวข้อหลัก';
	       $feed->description = 'คำอธิบาย';
	       $feed->logo = 'http://yoursite.tld/logo.jpg';
	       $feed->link = url('rssfeeds');
	       $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
	       $feed->pubdate = $posts[0]->created_at;
	       $feed->lang = 'th';
	       $feed->setShortening(true); // true or false
	       $feed->setTextLimit(100); // maximum length of description text

	       foreach ($posts as $post){
	           // set item's title, author, url, pubdate, description, content, enclosure (optional)*
				$enclosure = ['title'=>'image','url'=>'http://foobar.dev/image_image.jpg','type'=>'image/jpeg'];
				$feed->add($post->title, "PAE", $post->id, Carbon::now() , $post->title, $post->body, $enclosure);
	       }

	    }

	    // first param is the feed format
	    // optional: second param is cache duration (value of 0 turns off caching)
	    // optional: you can set custom cache key with 3rd param as string
	    // return $feed->render('atom');
	    return $feed->render('rss');

	    // to return your feed as a string set second param to -1
	    // $xml = $feed->render('atom', -1);

	}


}
