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
    <div class="head-column">
        <h1 class="mt-5 mb-5">Lot Project</h1>

        @if (session('message'))
            <div class="alert alert-success mt-2"> {{ session('message') }} </div>
        @endif
        <div class="head-column-buttons">
            <a href="{{ route('create.lot') }}" class="btn btn-success">Create Lot</a>
            <a href="{{ route('create.category') }}" class="btn btn-warning">Create Category</a>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lots as $lot)
        <tr>
            <th>{{ $lot->id }}</th>
            <td>{{ $lot->title }}</td>
            <td>{{ $lot->description }}</td>
            <td>
                @foreach($lot->categories as $category)
                    <span>{{ $category->title }}</span>
                @endforeach
            </td>
            <td>
                <a href="{{ url('edit/lot/' . $lot->id) }}" class="btn btn-success">Edit</a>
                <a href="{{ url('delete/lot/' . $lot->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
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
