<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Company</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
    <div class="container-fluid">
        <a class="navbar-brand h1 text-white" href={{ route('company.index') }}>CRUDCompany</a>
        <div class="justify-end ">
            <div class="col ">
                <a class="btn btn-sm btn-success" href={{ route('company.create') }}>Add Company</a>
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
                    <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"  >
                        </div>
                        <div class="form-group">
                            <label for="logo_url">Logo URL</label>
{{--                            <input type="text" class="form-control" id="logo_url" name="logo_url" value="{{ old('logo_url') }}">--}}
                            <input type="file" class="form-control" name="logo_url" id="logo_url">
                        </div>
                        <img id="preview" src="#" alt="your image" class="mt-3" style="display:none;"/>
                        <div class="form-group">
                            <label for="website">Website url</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Create company</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        logo_url.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = logo_url.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>

</body>
</html>
