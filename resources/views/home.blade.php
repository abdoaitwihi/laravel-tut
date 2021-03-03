@extends('layouts.main') @section('content')
<main>
    <div class="container-fluid">
        <div class="container">
            <p>these are menu items</p>
            <div class="">
                @foreach ($menuItems as $key => $value)
                <div class="menu-item-container">
                    <div class="row m-0">
                        <div class="my-auto">
                            <img
                                class="image"
                                src="/assets/images/image1.jpg"
                                alt=""
                            />
                        </div>
                        <div class="col my-auto">
                            <h3>{{$value->title}}</h3>
                            <p>{{$value->price }}</p>
                            <p>{{$value->description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- @foreach ($menuItems as $key => $value)
            <div class="menu-item-container">
                {{$value->title}} <br />
                {{$value->price }} <br />
                {{$value->image}} <br />
                {{$value->description}} <br />
            </div>
            @endforeach -->
        </div>
    </div>
</main>
@endsection
