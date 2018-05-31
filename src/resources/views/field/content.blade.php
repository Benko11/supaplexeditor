@extends('field.master')
@section('content')
    <section class="level">
        {!! $level !!}
    </section>
    <section class="info">
        {!! $info !!}
    </section>

    @include('field.mainMenu')
@endsection