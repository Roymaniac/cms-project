@extends('layouts.app')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="text">Dashboard</div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('post.create') }}" class="btn btn-sm btn-outline-primary">Create New Post </a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-light table-bordered table-sm">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    {{-- <th scope="col">Image</th> --}}
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Category</th>
                    <th scope="col">User</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>

                    {{-- <td>{{ $post ->id }}</td> --}}
                    {{-- <td><img src="{{ asset('storage/' . $post ->image_url) }}" id="img-view" />
                    </td> --}}
                    <td>{{ $post ->title }}</td>
                    <td>{{ $post ->content }}</td>
                    <td>{{ $post->category_id }}</td>
                    <td>{{ $post->user_id }}</td>
                    <td><button class="btn btn-round disabled">{{ $post->status }}</button></td>

                    <td>
                        <a href=" posts/{{ $post ->id }}/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form method="post" action="api/posts/{{ $post ->id }}" style=" display: inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div>
            {{ $posts->links() }}
        </div>
    </div>
</main>
@endsection
