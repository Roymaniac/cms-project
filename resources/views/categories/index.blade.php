@extends('layouts.app')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="text">Dashboard</div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-primary">Create New Category </a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-light table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category ->name }}</td>
                    <td>{{ $category ->description }}</td>
                    <td>
                        <a href=" categories/{{ $category ->id }}/edit" class="btn btn-xl btn-outline-primary">Edit</a>
                        <form method="post" action="api/categories/{{ $category ->id }}" style=" display: inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-xl btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div>
            {{ $categories->links() }}
        </div>
    </div>
</main>
@endsection
