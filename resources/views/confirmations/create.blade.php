<!DOCTYPE html>
<html lang="en">

    @include("shared.header")

<body class="bg-dark text-white">
    @include("shared.navbar")

    <div class="container">

        <div class="row mt-4 mb-4 text-center">
            <h1>Send a confirmation request</h1>
        </div>

        <div class="form offset-lg-3 col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="rounded bg-black text-white p-5 w-100">
                <form action="{{ route("confirmation.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="mb-3 text-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>

                    <label class="mt-3" for="message">Message</label>
                    <textarea name="message" id="message" class="form-control" rows="8" required></textarea>


                    <label class="mt-3" for="competences">Competences</label>
                    <input type="file" id="competences" name="competences" class="form-control" accept=".zip,.rar,.7z" required>
                    <p>Please send your documents packed in one archive. The field accepts files with the extension .zip, .rar and .7z.</p>

                    <div class="w-100 text-center">
                        <button class="btn btn-dark mt-4" type="submit"><i class="fa fa-send"></i>  Send</button>
                    </div>

                </form>
            </div>
        </div>

        @include("shared.footer")
    </div>
</body>
</html>
