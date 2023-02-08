@php
    use Illuminate\Support\Facades\App;
@endphp

<nav class="navbar bg-light border-bottom">
    <div class="container justify-content-center">
        <div class="col-lg-9">
            <a class="ml-0 navbar-brand text-primary" href="{{ route('home') }}">
                <img src="{{ asset('assets/logo_full.png') }}" 
                     alt="logotipo Nasajon. Fundo transparente com letras azuis escrito Nasajon"
                     style="width: 45%">
            </a>
            <span class="navbar-text d-none d-md-inline">Notas secretas que irão se auto-destruir depois de lidas.</span>
        </div>
        <div class="col-3 d-none d-md-block">
            <ul class="nav float-end">
{{--                <li class="nav-item text-end">--}}
{{--                    <a class="nav-link text-dark" href="{{ route('page.note.new') }}">--}}
{{--                        Nova nota--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item dropdown text-end">
                    <a href="{{ route('page.note.new') }}" class="btn btn-outline-success" type="submit">Nova nota</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
