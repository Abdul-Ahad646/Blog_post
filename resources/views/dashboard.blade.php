<x-app-layout>
   


    <div class="jumbotron">
        <div class="text-center font-weight-bold">
            <h2>Name: {{Auth::user()->name}}</h2>
            <h2>Email: {{Auth::user()->email}}</h2>
        </div>
        <br>
        <br>
        <div class="row">
            @forelse($blogs as $blog)

            <div class="col-lg-4">
            <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-success">Edit</a>
            <a href="{{url('blog_destroy', $blog->id)}}" class="btn btn-danger">Delete</a>
                <div class="jumbotron border border-primary">
                    
                    <h1 class="text-center font-weight-bold">Title</h1>
                    <h1 class="text-center p-3 mb-2 bg-primary text-white" >{{$blog->title ?? ''}}</h1> <br>
                    <h1 class="text-center font-weight-bold">Content</h1>
                    <p>{{$blog->description ?? ''}}</p>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</x-app-layout>