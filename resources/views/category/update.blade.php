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
    <a href="{{ route('home') }}" class="btn btn-success">Go Home</a>
    <form class="mt-5">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Category</label>
            <select name="category">
                <options></options>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
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
