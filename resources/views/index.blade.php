@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <h1 class="text-center mt-3">Список городов</h1>
    <ul class="list-unstyled">
    @foreach ($cities as $city)
        <li class="mb-2">
            <a href="{{ route('city.index', ['slug' => $city->slug]) }}" class="text-muted ms-3">
                @if ($selectedCity && $selectedCity->slug == $city->slug)
                    <strong>{{ $city->name }}</strong>
                @else
                    {{ $city->name }}
                @endif
            </a>
        </li>
    @endforeach
    </ul>
@endsection
