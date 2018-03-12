<div class="card @isset($user) @if($user->id == $chusqer->user_id) mine @endif @endisset">
    <div class="card-divider">
        <p>Añadido por <a href="/{{ $chusqer->user->slug }}">{{ $chusqer->user->name }}</a> - <a
                    href="{{ url('/') }}/chusqers/{{ $chusqer['id'] }}">Leer más</a></p>
    </div>
    <p class="chusqer-content">
        <img src="{{ $chusqer->image }}" alt="">{{ $chusqer->content }}
    </p>
    <p class="chusqer-hashtags text-right">
        @foreach($chusqer->hashtags as $hashtag)
            <a href="/hashtag/{{ $hashtag->slug }}"><span class="label label-primary">{{ $hashtag->slug }}</span></a>
        @endforeach
    </p>
    @if(Auth::user() && Auth::user()->amI())
        <div class="card-section">
            @can('update', $chusqer)
                <a href="{{ Route('chusqers.edit', $chusqer) }}" class="button warning">Editar</a>
            @endcan

            @can('like', $chusqer)
                @if(Auth::check() && !Auth::user()->isMe($user))
                    @if( Auth::user()->isFollowing($user))
                        <form action="{{ $user->slug }}/dislike" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="alert button">Dislike</button>
                        </form>
                    @else
                        <form action="{{ $user->slug }}/like" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="success button">Like</button>
                        </form>
                    @endif
                @endif
            @endcan

            @can('delete', $chusqer)
                <form action="{{ Route('chusqers.delete', $chusqer->id) }}" method="POST" id="chusqer-actions-buttons">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="button alert">Borra</button>

                </form>
            @endcan
        </div>
    @endif
    {{--Manda al usuario a login cuando hace click en me gusta si no está logeado.--}}
    <form action="{{ route('login') }}">
        <button type="submit" class="button success">Me gusta</button>
    </form>
</div>