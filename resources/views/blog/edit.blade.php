@extends('blog.layouts.app')
@section('content')
<div class="jumbotron">
    <div class="p-6 text-gray-900">
        <button><a href="{{ route('dashboard') }}"
            class="font-semibold text-gray-600 hover:text-gray-400 dark:text-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-800">Dashboard</a></button>
    </div>
    <div class="row ">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="jumbotron border border-primary">
                
                    <form class="p-4" action="{{route('blog.update',$blog->id)}}" method="POST">
                        
                        @csrf
                        @method('PUT')
                        <input type="hidden" class="form-control border border-primary" name="user_id"
                            value="{{Auth::user()->id}}" >
                        <div class="form-group">
                            <label >Title</label>
                            <input type="text" class="form-control border border-primary" name="title"
                                id="exampleInputEmail1"  placeholder="Title" value="{{$blog->title}}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control border border-primary" name="description"
                            placeholder="Description" value="{{$blog->description}}">
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection('content')