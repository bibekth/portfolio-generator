@extends('dashboard.layouts.main')
@section('admin-content')
<aside>
    <div class="index-page">
        Your total portfolio is {{ count($portfolios) }}


        <form action="{{ route('dashboard.create.portfolio') }}" class="form-control container" method="POST">
            @csrf
            <input type="text" class="form-control" name="title" placeholder="Title">
            <button class="btn-success">Create a website</a></button>
        </form>

        <div class="">
            @foreach ($portfolios as $portfolio)
            <button class="btn btn-success"><a href="{{ route('dashboard.edit.portfolio', $portfolio->id) }}"><span class="text-light">{{ $portfolio->id }} - {{ $portfolio->title }}</span></a></button>
            @endforeach
        </div>
    </div>
</aside>
@endsection
