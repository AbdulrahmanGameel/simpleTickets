@extends('layouts/app')

@section('content')
<div class="container">
    <h1>Events</h1>
    <div class="row">
        <div class="col-md-4 scrollbar scrollbar-primary "id="list-tab">
            <section class="form-elegant scrollbar-light-blue">

            @if (count($events)>0)
            @foreach ($events as $event)
            <div class="list-group text-center"  role="tablist">

                <a href="?id={{$event->id}}" class="list-group-item list-group-item-action">
                    {!!$event->name!!}
                </a>                
            </div>
                    
            @endforeach
        
            @else
            <div class="alert text-center alert-danger" role="alert">
                No events Found!!
            </div>
            @endif
            </section>
        </div>
        <div class="col-md-6">
            @include('tickets')
        </div>
    </div>
</div>

@endsection