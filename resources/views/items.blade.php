@extends('layouts.main')

@section('content')
    @if(!count($items) == 0)

            <form method="post" action="{{ route('items.session_store') }}">
                <div class="row bg-gradient">
                @csrf
                @foreach($items as $item)
                    <div class="col-sm-6 col-md-4 col-12 h-75">
                        <div class="bg-gradient mb-0 bg-light p-2 rounded-top h5 text-dark fw-bold text-uppercase text-center">
                            {{ $item->name }}
                        </div>
                        <hr class="m-0">
                        <div class="h-100 bg-white">
                            <img class="img-fluid w-100 d-block mx-auto" src="{{ asset('img/' . $item->img) }}" alt="">
                        </div>
                        <div class="text-center bg-gradient bg-secondary py-2">
                            <p class="m-0">ár: {{ $item->price }}</p>
                            <br>
                            <div class="btn btn-success h-75" onclick="document.getElementById('{{$item->id}}-value').value++">+</div>
                            <input type="number" name="{{ $item->id }}" value="0" min="0" id="{{$item->id}}-value">
                            <div class="btn btn-danger" onclick="document.getElementById('{{$item->id}}-value').value <= 0 ? document.getElementById('{{$item->id}}-value').value : document.getElementById('{{$item->id}}-value').value--">-</div>
                            <br>
                        </div>
                    </div>
                @endforeach
                    <div class="col-12 mt-5">
                        <input type="submit" value="kosárba" class="btn btn-primary mx-auto ">
                    </div>
                </div>

            </form>

    @else
        <p class="display-3">
            Sajnos nincsenek termékek
        </p>
    @endif


@endsection
