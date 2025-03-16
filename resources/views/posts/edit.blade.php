<x-layout title="Update Post">
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
                  @if ($errors->has('title'))
                 <div class="text-danger">{{ $errors->first('title') }}</div>
                  @endif
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
                  {{-- hidden input to send postcreator if user don,t change it --}}
                <input type="hidden" name="post_creator" value="{{ $post->user_id }}">
                <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                    <select name="posted_by" id="" class="border border-gray-200 rounded p-2">
                        {{-- <option value="hagar" @if ($post['posted_by'] === 'hagar') selected @endif>hagar</option>
                        <option value="lina" @if ($post['posted_by'] === 'lina') selected @endif>lina</option> --}}
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('post_creator', $post->user_id) == $user->id ? 'selected' : '' }}>
                          {{ $user->name }}
                      </option>                       
                        @endforeach
                    </select>
                    @if ($errors->has('post_creator'))
                    <small class="text-danger">{{ $errors->first('post_creator') }}</small>
                    @endif
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