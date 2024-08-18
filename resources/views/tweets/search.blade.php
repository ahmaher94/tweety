<x-app>


    @forelse ($tweets as $tweet)

    <div>


        <div class="lg:flex-1 lg:mx-10" style="max-width: 800px">

            <div class="flex p-4 border-b border-b-gray-500">
            
                <div>
                    <p class="text-sm mb-3">
                        {{ $tweet['_source']['tweet'] }}
                    </p>
        
                </div>
            </div>

        </div>
        
    </div>


    @empty
    No Tweets yet.
    @endforelse






</x-app>