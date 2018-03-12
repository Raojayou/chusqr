@extends('layouts.app')

@section('content')
    <div class="grid-x grid-margin-x">
        @foreach($people->chunk(3) as $row)
            @foreach($row as $user)
                <div class="small-4 cell">
                    <div class="card">
                        <div class="card-section">
                            <h4><a href="/{{ $user->slug }}">&#64;{{ $user->slug }}</a></h4>
                            <table class="text-center">
                                <thead>
                                <tr>
                                    <th class="text-center"><a href="/{{ $user->slug }}/likes">Likes</a></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $user->likes->count() }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection