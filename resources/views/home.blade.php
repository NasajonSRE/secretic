@extends('layout.app')

@section('title', 'Crie notas secretas que irão se auto-destruir depois de lidas')

@section('content')

    <div class="container">

        <form action="{{ route('note.create') }}" method="POST" id="create_note_form">
            @csrf

            <div class="row mt-5">
                <div class="col-md-6 mx-auto">

                    <div class="text-center">
                        <label for="text" class="lh-sm fw-semibold form-label h1 mb-4">Nova nota secreta</label>
                    </div>

                    <textarea class="form-control"
                              name="text"
                              id="text"
                              placeholder="digite sua nota aqui..."
                              style="height: 160px"></textarea>

                </div>
            </div>

            <div class="row mt-2 mb-4">
                <div class="col-md-6 mx-auto">
                    <div id="textareaHelp" class="form-text">
                        Você pode criar uma nota secreta com <a href="{{ route('page.note.new') }}">configurações adicionais</a>.
                    </div>
                </div>
            </div>

            <div class="row my-5 justify-content-center">
                <div class="col-6">
                    <div class="d-grid">
                        <button id="create_note_form__submit_btn" type="submit" class="btn btn-lg btn-primary">
                            Crie uma nota
                        </button>
                    </div>
                </div>
            </div>

        </form>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/note/create.js')}}"></script>

    {{-- Disable submit button if note is empty --}}
    <script>
        $(document).ready(function(){
            $('#create_note_form__submit_btn').prop('disabled',true);
            $('#text').keyup(function(){
                $('#create_note_form__submit_btn').prop('disabled', this.value == "" ? true : false);
            })
        });
    </script>
@endpush
