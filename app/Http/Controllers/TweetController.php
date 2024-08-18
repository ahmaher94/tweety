<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Elastic\Elasticsearch\Client as ElasticsearchClient;

class TweetController extends Controller
{

    protected $client = null;
    
    public function __construct(ElasticsearchClient $client)
    {
        $this->client = $client;
    }


    // protected $client = null;

    // public function __construct()
    // {
    //     $this->client = ElasticsearchClientBuilder::create()
    //     ->setElasticCloudId(env('ELASTICSEARCH_CLOUD_ID'))
    //     ->setApiKey(env('ELASTICSEARCH_API_KEY'))
    //     ->build();
    // }

    public function index()
    {

        $response = $this->client->info();

        echo $response->getStatusCode();
        
        $tweets = Tweet::latest()->get();
        return view('tweets.index', [
            "tweets" => auth()->user()->timeline()
        ]);
    }


    public function store(Request $request){

        $attributes = $request->validate(["body" => "required|max:255"]);
        
        Tweet::create([
            "user_id" => auth()->id(),
            "body" => $attributes["body"]
        ]);

        return redirect()->route('home');
    }
}
