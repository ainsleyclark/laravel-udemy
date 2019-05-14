@extends('layouts.app')


@section('content')

    <h1>
        This is the contact view
    </h1>

    @if (count($people))

        <ul>

            @foreach($people as $person)

                <li>{{$person}}</li>

            @endforeach

        </ul>

    @endif


@endsection