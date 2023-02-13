@extends('layout.app')

@section('title', 'Nota secreta lida e destruida!')

@section('content')

    <div class="container">
        <div class="row mt-2 mb-4">
            <div class="col-md-8 mx-auto">
                <h3 class="mt-5">Conteúdo da nota</h3>

                <div class="alert alert-warning mt-3" role="alert">
                    Essa nota foi destruida. Se você quer mantê-la, copie antes antes de fechar essa janela.
                </div>

                <div class="mb-3">
                    <textarea class="form-control" id="note-text" rows="8">{{ $note_text }}</textarea>
                </div>

                <div class="mb-3">
                    <div class="d-grid">
                        <button id="copy-button" type="button" class="btn btn-outline-secondary">
                            Copiar nota
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#copy-button').click(function (e) {
                e.preventDefault();

                var note_text = document.getElementById("note-text");
                var copy_btn = document.getElementById("copy-button");

                /* Select the text field */
                note_text.select();
                note_text.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                navigator.clipboard.writeText(note_text.value);

                note_text.classList.add("is-valid");
                copy_btn.innerText = 'Copiado!';
            });
        });
    </script>
@endpush