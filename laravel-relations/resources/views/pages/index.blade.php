@extends('layouts.main-layout')

@section('content')
    <main>
        <h1>Cars</h1>
        <a href="{{ route('create') }}" class="btn">New Car</a>
        @foreach ($brands as $brand)
            <h2>{{ $brand -> name }}</h2>
            <ul>
                @foreach ($brand -> cars as $car)
                    <li>
                        <strong>
                            {{ $car -> name }}
                        </strong>
                        <ul>
                            @foreach ($car -> pilots as $pilot)
                                <li>
                                    <a href="{{ route('show', $pilot -> id) }}">
                                        <i>
                                             {{ $pilot -> firstname }} {{ $pilot -> lastname }}
                                        </i> 
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </main>
@endsection