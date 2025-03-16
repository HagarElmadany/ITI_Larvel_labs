<x-layout :title="'Create Post'">
  {{-- display validion error --}}
  @if ($errors->any())
     <div role="alert" class="max-w-3xl mx-auto mb-4 rounded-sm border-s-4 border-red-500 bg-red-50 p-4">
         <strong class="block font-medium text-red-800"> Something went wrong </strong>
         <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
 
         </ul>
       </div>
    @endif
 
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Create New Post</h2>
            </div>

            <div class="px-6 py-4">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Title Input -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input
                            name="title"
                            type="text"
                            id="title"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border"
                        >
                    </div>
                    
                    <!-- Description Textarea -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea
                            name="description"
                            id="description"
                            rows="5"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border"
                        ></textarea>
                    </div>

                    {{-- upload image input --}}
                    <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Upload Image:</label>
                    <input type="file" name="image" accept="image/*"  class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border">
                    <div class="mb-4">

                    <!-- Post Creator Select -->
                    <div class="mb-6">
                        <label for="creator" class="block text-sm font-medium text-gray-700 mb-1">Post Creator</label>
                        <select
                            name="post_creator"
                            id="creator"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border bg-white"
                        >
                            {{-- <option value="1">hagar</option>
                            <option value="2">mahmoud</option> --}}
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 hover:cursor-pointer"
                        >
                            Submit
                        </button>
                    </div>
                    {{-- <pre>{{ var_dump($_FILES) }}</pre> --}}
                </form>
            </div>
        </div>
    </div>

</x-layout>