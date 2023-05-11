<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Create new course offer</h1>
        </div>

        <div class="form w-100 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-75">
                <form action="{{ route("courses.store") }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-6">

                            <div class="form-group mb-2">
                                <label for="language">Language</label>
                                <input id="language" name="language" type="text" class="form-control" required>
                            </div>

                            <div class="form-group mb-2">
                                <label for="head">Headquarter</label>
                                <input id="head" name="headquarter" type="text" class="form-control" required>
                            </div>

                            <div class="form-group mb-2">
                                <label for="start">Scheduled start</label><br>
                                <input id="start" name="start" type="date" class="form-control" required>
                            </div>

                        </div>
                        <div class="col-6">

                            <div class="form-group mb-2">
                                <label for="difficulty">Difficulty</label>
                                <select name="difficulty" id="difficulty" class="form-select" required>
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="B1">B1</option>
                                    <option value="B2">B2</option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label for="head">Price</label>
                                <input id="head" name="price" type="number" min="0" step="0.01" class="form-control" required>
                            </div>

                            <div class="form-group mb-2">
                                <label for="hours">Number of hours</label><br>
                                <input id="hours" name="hours" type="number" min="0" class="form-control" required>
                            </div>

                        </div>

                    </div>

                    <div class="form-group mb-2">
                        <label for="form">Form</label>
                        <select name="form" id="form" class="form-select" required>
                            <option value="Stationary">Stationary</option>
                            <option value="Remote">Remote</option>
                            <option value="Hybrid">Hybrid</option>
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="img">Image (optionally)</label>
                        <input type="file" id="img" name="img" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.ico">
                    </div>
                    <p>Please ensure that the images you upload have an aspect ratio of 1:1 and a resolution close to 300x300 pixels to prevent distortion.</p>

                    <div class="form-group mb-2">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>

                    <div class="w-100 text-center">
                        <button class="btn btn-dark mt-4" type="submit"><i class="fa fa-gear"></i>  Create</button>
                    </div>

                    @if ($errors->any())
                        <div class="mt-3">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                </form>

                @if ($errors->any())
                    <div class="mt-3">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
