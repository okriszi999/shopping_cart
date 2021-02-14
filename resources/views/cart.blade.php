@extends('layouts.main')

@section('content')
    @php
    \Illuminate\Support\Facades\Session::forget('0');
    \Illuminate\Support\Facades\Session::forget('1');
    \Illuminate\Support\Facades\Session::forget('_token');
    \Illuminate\Support\Facades\Session::forget('_flash');
    \Illuminate\Support\Facades\Session::forget('_previous');
    @endphp
    @if(count(\Illuminate\Support\Facades\Session::all()) > 0)
    <div class="row">
        <div class="col-6">
            <ul class="list-group">
                @foreach(\Illuminate\Support\Facades\Session::all() as $key => $value)
                    <ul class="row list-group-horizontal">
                        <li class="col-6 list-group-item-">
                            {{ $key }}
                        </li>
                        <li class="col-6">
                            db:{{$value}}
                        </li>
                    </ul>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            @php
            $overall = 0;
                foreach (\Illuminate\Support\Facades\Session::all() as $key => $value){
                    $overall += \App\Models\Items::all()->where('name', '=', $key)->first()->price * $value;
                }
            @endphp
            <h3>Összesen: {{ $overall }} FT</h3>
        </div>
        <form action="{{ route('buy') }}">
            <input type="submit" value="megvétel">
        </form>
    </div>
    @else
        Nincs itt semmi
    @endif
@endsection
