<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Lots</title>
</head>
<body>
<div class="container">
    <a href="{{ route('home') }}" class="mt-3 btn btn-success">Go Home</a>
    <form class="mt-5" action="{{ url('update/lot/' . $categories[0]['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2 form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $lot->title }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="mb-2 form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" name="description" class="form-control" value="{{ $lot->description }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        @error('category_id')
            <div>
                Required!!! Category
            </div>
        @enderror
        @if($categories->isEmpty())
            <div>You need to create category</div>
        @else
            <div class="form-group">
                <label for="exampleInputPassword1">Category</label>
                <select name="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id === $lot->categories[0]['id']? 'selected' : ''}}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif
        <button type="submit" class="mt-2 btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

<style>
    .head-column {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
