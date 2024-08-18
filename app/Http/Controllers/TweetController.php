<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Elastic\Elasticsearch\Client as ElasticsearchClient;

use function PHPSTORM_META\type;

class TweetController extends Controller
{

    protected $client = null;
    
    public function __construct(ElasticsearchClient $client)
    {
        $this->client = $client;

        $response = $this->client->indices()->exists(['index' => 'tweets']);

        if($response->getStatusCode() == 404){
            $this->createIndex();
            echo 'index created';
        }
    }


    public function index()
    {
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

        $params = [
            'index' => 'tweets',
            'body' => [
                'tweet' => $attributes["body"],
                'user_id' => auth()->id()
            ]
        ];

        $response = $this->client->index($params);
        
        return redirect()->route('home');
    }

    protected function createIndex(){
        $this->client->indices()->create([
            'index' => 'tweets',
            'body' => [
                'mappings' => [
                    '_source' => [
                        'enabled' => true
                    ],
                    'properties' => [
                            'tweet' => [
                                'type' => 'text'
                            ],
                            'user_id' => [
                                'type' => 'integer'
                            ]
                    ]
                ]
            ]
        ]);
    }

    protected function search(Request $request){
        $searchValue = $request['search'];

        $params = [
            'index' => 'tweets',
            'body' => [
                'query' => [
                    'match' => [
                        'tweet' => $searchValue
                    ]
                ]
            ]
        ];

        $response = $this->client->search($params);

        return view('tweets.search', [
            "tweets" => $response['hits']['hits']
        ]);
    }
}
