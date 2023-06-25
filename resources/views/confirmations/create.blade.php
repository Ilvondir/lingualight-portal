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

                    <label for="subject">Subject</label>
                    <input type="text" class="form-control @error("subject") is-invalid @enderror" id="subject" value="{{ old("subject") }}" name="subject" required>
                    @error ("subject")
                        <label for="subject" class="invalid-feedback">
                            <b>{{ $message }}</b>
                        </label>
                    @enderror


                    <label class="mt-3" for="message">Message</label>
                    <textarea name="message" id="message" class="form-control @error("message") is-invalid @enderror" rows="8" required>{{ old("message") }}</textarea>
                    @error ("message")
                        <label for="message" class="invalid-feedback">
                            <b>{{ $message }}</b>
                        </label>
                    @enderror



                    <label class="mt-3" for="competences">Competences</label>
                    <input type="file" id="competences" name="competences" class="form-control @error("competences") is-invalid @enderror" accept=".pdf,.zip,.rar,.7z" required>
                    <p>Please send your documents packed in one archive or send single pdf file. The field accepts files with the extension .pdf, .zip, .rar and .7z.</p>
                    @error ("competences")
                        <label for="competences" class="invalid-feedback">
                            <b>{{ $message }}</b>
                        </label>
                    @enderror


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
