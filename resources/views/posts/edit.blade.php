<x-layout title="Update Post">
    <section class="bg-gray-100">
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
              <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                  <label class="sr-only" for="name">Title</label>
                  <input
                    class="w-full rounded-lg border border-gray-200 p-3 text-sm"
                    placeholder="Title"
                    type="text"
                    name="title"
                    value="{{$post['title']}}"
                  />
                </div>
      
                
                <div>
                    <label class="sr-only" for="message">Description</label>
                    
                    <textarea
                    class="w-full rounded-lg border border-gray-200 p-3 text-sm"
                    placeholder="Description"
                    rows="6"
                    name="description"
                    >{{$post['description']}}</textarea>
                </div>
                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                    <select name="posted_by" id="" class="border border-gray-200 rounded p-2">
                        {{-- <option value="hagar" @if ($post['posted_by'] === 'hagar') selected @endif>hagar</option>
                        <option value="lina" @if ($post['posted_by'] === 'lina') selected @endif>lina</option> --}}
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if ($post->posted_by == $user->id) selected @endif>
                            {{ $user->name }}
                        </option>                        
                        @endforeach
                    </select>
                </div>

                {{-- edit image --}}
                <div class="form-group">
                  <label>current image</label><br>
                  @if ($post->image)
                    <img src="{{ asset('storage/posts/' . basename($post->image)) }}" alt="Post Image"width="200"><br>
                  @endif
                  <label>upload new image </label>
                  <input type="file" name="image" class="form-control">
              </div>
                
                <div class="mt-4">
                  <button
                    type="submit"
                    class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto"
                  >
                    Submit
                  </button>
                </div>
              </form>
            </div>
        </div>
      </section>
    </x-layout>