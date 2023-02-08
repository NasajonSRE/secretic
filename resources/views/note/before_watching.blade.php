@extends('layout.app')

@section('title', 'Ler e destruir?')

@php
    use App\Models\Note;
    /** @var Note $note */
@endphp

@section('content')

    <div class="container">
        <div class="row mt-2 mb-4">
            <div class="col-md-8 mx-auto">

                @if ($note === null)
                    <div class="alert alert-danger mt-5" role="alert">
                        Nota secreta não existe, ela já foi lida, ou expirou.
                    </div>
                @else
                    <h3 class="mt-5">Ler e destruir?</h3>
                    <p>Você irá ler e destruir a nota com o id <strong>{{ $note->slug }}</strong>.</p>
                    <form action="{{ route('note.decrypt', $note->slug) }}" method="POST">
                        @csrf
                        @if ($note->password)

                            <div class="my-3">
                                <input type="password"
                                       class="form-control"
                                       name="decrypt_password"
                                       placeholder="Entre com a senha para a nota"
                                       required>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger mt-3" role="alert">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                        @endif
                        <input class="btn btn-primary"
                               type="submit"
                               value="Sim, mostre-me a nota"
                               onclick="disableButton(this)">
                        <button type="button" class="btn btn-outline-secondary" disabled>Não, não agora</button>

                    </form>
                @endif

            </div>
        </div>
    </div>
@endsection



