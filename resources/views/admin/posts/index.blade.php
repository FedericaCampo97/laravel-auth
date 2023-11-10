@extends('layouts.admin')

@section('content')

@if (session('message'))
<div class="alert alert-success alert-dismissible fade show mt-3 mb-0" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>Message:</strong> {{session('message')}}
</div>
@endif

<h1 class="my-5">My Post</h1>

<a href="/admin/posts/create"><button class="btn btn-primary mb-3"> Create new post </button></a>

<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    table-dark
    align-middle">
        <thead class="table-light">
            <caption>Posts</caption>
            <tr>
                <th>ID</th>
                <th>COVER IMAGE</th>
                <th>TITLE</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            @forelse($posts as $post)
            <tr class="table-primary">
                <td scope="row">{{$post->id}}</td>
                <td>
                    @if($post->cover_image)
                    <img width="100" src="{{asset('storage/' . $post->cover_image)}}" alt=" {{$post->title}} image">
                    @else
                    No image
                    @endif
                </td>
                <td>{{$post->title}}</td>
                <td>
                    <button class="btn btn-outline-primary">
                        <a href="{{route('admin.posts.show' , $post)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg>
                        </a>
                    </button>
                    <button class="btn btn-outline-primary">
                        <a href="{{route('admin.posts.edit' , $post)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>
                    </button>
                    <button class="btn btn-outline-primary">
                        <a href="{{route('admin.posts.edit' , $post)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                            </svg>
                        </a>
                    </button>



                </td>
            </tr>
            @empty
            <tr class="table-primary">
                <td scope="row">No posts here! </td>
            </tr>
            @endforelse

            {{$posts->links('pagination::bootstrap-5')}}
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>

@endsection