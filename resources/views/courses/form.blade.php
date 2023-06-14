<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">

            @if (!str_contains(request()->path(), 'edit'))
                <h1>Create new course offer</h1>
            @else
                <h1>Edit your course offer</h1>
            @endif

        </div>

        <div class="form offset-lg-2 col-12 col-lg-8 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-100">
                <form action="@if (!str_contains(request()->path(), 'edit')) {{ route("courses.store") }} @else {{ route("course.update", ["id"=>$c->id]) }} @endif" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf

                    @if ($errors->any())
                        <div class="mb-3 text-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input id="name" name="name" @if (str_contains(request()->path(), 'edit')) value="{{ $c->name }}" @else value="{{ old("name") }}" @endif type="text" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">

                            <div class="form-group mb-2">
                                <label for="language">Language</label>
                                <input id="language" name="language" @if (str_contains(request()->path(), 'edit')) value="{{ $c->language }}" @else value="{{ old("language") }}" @endif type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <label for="difficulty">Difficulty</label>
                                <select name="difficulty" id="difficulty" class="form-select" required>
                                    <option value="A1" @if (str_contains(request()->path(), 'edit')) @if ($c->difficulty_id==1) selected @endif @endif>A1</option>
                                    <option value="A2" @if (str_contains(request()->path(), 'edit')) @if ($c->difficulty_id==2) selected @endif @endif>A2</option>
                                    <option value="B1" @if (str_contains(request()->path(), 'edit')) @if ($c->difficulty_id==3) selected @endif @endif>B1</option>
                                    <option value="B2" @if (str_contains(request()->path(), 'edit')) @if ($c->difficulty_id==4) selected @endif @endif>B2</option>
                                    <option value="C1" @if (str_contains(request()->path(), 'edit')) @if ($c->difficulty_id==5) selected @endif @endif>C1</option>
                                    <option value="C2" @if (str_contains(request()->path(), 'edit')) @if ($c->difficulty_id==6) selected @endif @endif>C2</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <label for="head">Headquarter</label>
                                <input id="head" name="headquarter" @if (str_contains(request()->path(), 'edit')) value="{{ $c->headquarter }}" @else value="{{ old("headquarter") }}" @endif type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <label for="price">Price</label>
                                <input id="price" @if (str_contains(request()->path(), 'edit')) value="{{ $c->price }}" @else value="{{ old("price") }}" @endif name="price" type="number" min="0" step="0.01" class="form-control" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <label for="start">Scheduled start</label><br>
                                <input id="start" name="start" @if (str_contains(request()->path(), 'edit')) value="{{ $c->scheduled_start }}" @else value="{{ old("start") }}" @endif type="date" class="form-control" required>
                            </div>

                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-2">
                                <label for="hours">Number of hours</label><br>
                                <input id="hours" @if (str_contains(request()->path(), 'edit')) value="{{ $c->hours }}" @else value="{{ old("hours") }}" @endif name="hours" type="number" min="0" class="form-control" required>
                            </div>

                        </div>

                    </div>

                    <div class="form-group mb-2">
                        <label for="form">Form</label>
                        <select name="form" id="form" class="form-select"  required>
                            <option value="Remote" @if (str_contains(request()->path(), 'edit')) @if ($c->form_id==2) selected @endif @endif>Remote</option>
                            <option value="Hybrid" @if (str_contains(request()->path(), 'edit')) @if ($c->form_id==3) selected @endif @endif>Hybrid</option>
                        </select>
                    </div>

                    @if (!str_contains(request()->path(), 'edit'))
                        <div class="form-group mb-2">
                            <label for="img">Image (optionally)</label>
                            <input type="file" id="img" name="img" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.ico">
                        </div>
                        <p>Please ensure that the images you upload have an aspect ratio of 1:1 and a resolution close to 300x300 pixels to prevent distortion. This operation is irreversible! You cannot change the course image after that!</p>
                    @endif
                    <div class="form-group mb-2">
                        <label for="description">Description</label>
                        <textarea class="form-control"  id="description" name="description" rows="8" required>@if (str_contains(request()->path(), 'edit')){{ $c->description }} @else {{ old("description") }} @endif</textarea>
                    </div>

                    <div class="w-100 text-center">
                        <button class="btn btn-dark mt-4" type="submit">@if (str_contains(request()->path(), 'edit'))<i class="fa fa-pencil"></i>  Update @else <i class="fa fa-gear"></i>  Create @endif</button>
                    </div>

                </form>
            </div>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
