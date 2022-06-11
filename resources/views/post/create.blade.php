@extends('layouts.app')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="text">Create New Post</div>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-5">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file" name="image_url">
        </div>
        <div class="form-group mb-3 mt-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group mb-3 mt-3">
            <label>Content</label>
            <input type="text" name="content" class="form-control">
        </div>
        <div class="form-group mb-3 mt-3">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value=""></option>
            </select>
        </div>
        <div class="form-group mb-3 mt-3">
            <label>User</label>
            <select name="user_id" class="form-select">
                <option value="{{ $user->id }}"></option>
            </select>
        </div>
        <div class="form-group mb-3 mt-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option selected>choose one</option>
                <option value="">Published</option>
                <option value="">Archived</option>
                <option value="">Draft</option>
            </select>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </form>

</main>


@endsection
