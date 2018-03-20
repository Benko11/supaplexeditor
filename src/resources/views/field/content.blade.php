@extends('field.master')
@section('content')
    @php
        require_once 'parts/field.php';
    @endphp
    @foreach ($files as $file)
        @include('components.'.$file)
    @endforeach
@endsection