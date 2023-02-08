@extends('layout.app')

@section('title', 'Mostrar nota secreta e destruir')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-7 mx-auto">
                <h1 class="mb-4">Nota secreta criada com sucesso!</h1>
                <div class="form-text mb-3">
                    Aqui está o link para a nota:
                </div>
                <div class="input-group mb-3">
                    <input type="hidden" id="secret-note-url" value="{{ $note_url }}">
                    <input type="text"
                           class="form-control"
                           id="copy-input"
                           value="{{ $note_url }}"
                           placeholder="Nota URL"
                           aria-label="Nota URL"
                           aria-describedby="copy-button"
                           disabled>
                    <button class="btn btn-outline-secondary"
                            type="button"
                            id="copy-button"
                            title="Copie para area de transferencia">
                        Copie a nota para área de transferência                    </button>
                </div>

            </div>
        </div>

        {{-- TODO Add button "Destroy note now" --}}
        {{-- TODO Add button "E-mail link" --}}

    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#copy-button').click(function (e) {
                e.preventDefault();

                var copy_input = document.getElementById("copy-input");
                var copy_btn = document.getElementById("copy-button");

                /* Select the text field */
                copy_input.select();
                copy_input.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                navigator.clipboard.writeText(copy_input.value);

                copy_input.classList.add("is-valid");
                copy_btn.innerText = 'Copied!';
            });
        });
    </script>
@endpush
