<x-layout title="View Post">

   <!-- Container -->
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
       <div class="max-w-3xl mx-auto space-y-6">
           <!-- Post Info Card -->
           <div class="bg-white rounded border border-gray-200">
               <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                   <h2 class="text-base font-medium text-gray-700">Post Info</h2>
               </div>
               <div class="px-4 py-4">
                   <div class="mb-2">
                       <h3 class="text-lg font-medium text-gray-800">Title :- <span class="font-normal">{{$post->title}}</span></h3>
                   </div>
                   <div>
                       <h3 class="text-lg font-medium text-gray-800">Description :-</h3>
                       <p class="text-gray-600">{{$post->description}}</p>
                   </div>
                   <!-- Add Post Image -->
                   @if ($post->image)
                   {{-- <p>{{ asset('storage/posts/' . basename($post->image)) }}</p> --}}
                   <img src="{{ asset('storage/posts/' . basename($post->image)) }}" alt="Post Image">
                   @else
                   <p>No image available</p>
                    @endif

               </div>
           </div>

<br>
           <!-- Post Creator Info Card -->
           <div class="bg-white rounded border border-gray-200">
               <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                   <h2 class="text-base font-medium text-gray-700">Post Creator Info</h2>
               </div>
               <div class="px-4 py-4">
                   <div class="mb-2">
                       <h3 class="text-lg font-medium text-gray-800">Name :- <span class="font-normal">{{ $post->user ? $post->user->name : 'No User Found' }}</span></h3>
                   </div>
                   <div class="mb-2">
                       <h3 class="text-lg font-medium text-gray-800">Email :- <span class="font-normal">{{ $post->user ? $post->user->email : 'No User Found' }}</span></h3>
                   </div>
                   <div>
                       <h3 class="text-lg font-medium text-gray-800">Created At :- <span class="font-normal"><p>Created At :- {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l jS \of F Y h:i:s A') }}</p>
                       </span></h3>
                   </div>
               </div>
           </div>

           <!-- comments-->
            <div class="mt-6">
                <h2 class="text-lg font-semibold">Comments:</h2>
                @foreach($post->comments as $comment)
                    <div class="border p-3 my-2 rounded">
                        <p>{{ $comment->content }}</p>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded mt-2">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
            <!-- Add comment-->
            <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-4">
                @csrf
                <textarea name="content" class="border p-2 w-full" placeholder="Add a comment..." required></textarea>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Submit</button>
            </form>


           <!-- Back Button -->
           <div class="flex justify-end">
                <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-600 text-white font-medium rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                   Back to All Posts
               </a>
           </div>
       </div>
   </div>
</x-layout>
