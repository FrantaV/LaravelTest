<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>user</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
    <div class="container-fluid">
        <a class="navbar-brand h1 text-white" href={{ route('user.index') }}>CRUDuser</a>
        <div class="justify-end ">
            <div class="col ">
                <a class="btn btn-sm btn-success" href={{ route('user.create') }}>Add user</a>
            </div>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="row">
        <div class="container h-100 mt-5">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <h3>Add a Post</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">First name</label>
                            <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"  value="{{ old('last_name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"  >
                        </div>
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}"  >
                        </div>
                        <div class="form-group">
                            <label for="email">Password confirmation</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}"  >
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <select class="form-control" name="company">
                                <option>Select company</option>
                                @foreach ($companies as $key => $value)
                                    <option value="{{ $value->id }}" {{ ( $value->id == old('company')) ? 'selected' : '' }}>
                                        {{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Create user</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
