@extends('layouts/app')

@section('content')
<div class="container">
    <h1>Events</h1>
    <div class="row">
        <div class="col-4">
            @if (count($events)>0)
            @foreach ($events ?? '' as $event)
            <div class="list-group text-center" id="list-tab" role="tablist">

                <a href="?id={{$event->id}}" class="list-group-item list-group-item-action">
                    {!!$event->name!!}
                </a>                
            </div>
                    
            @endforeach
        
            {{$events ?? ''->links()}}
            @else
            <div class="alert text-center alert-danger" role="alert">
                No events Found!!
            </div>
            @endif

        </div>
        <div class="col-8">
            {{-- //asfisdgba --}}
            @include('tickets')

        </div>
    </div>
</div>

@endsection