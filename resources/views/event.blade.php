{{--The code below sets css variables from any custom colors a event may have--}}
<div class="event d-flex bg-white shadow my-3"
     style="@if(!empty($event->color_primary)) --event-color-primary: {{ $event->color_primary }}; @endif
     @if(!empty($event->color_primary_dark)) --event-color-dark: {{ $event->color_primary_dark }}; @endif
     @if(!empty($event->color_accent)) --event-color-accent: {{ $event->color_accent }}; @endif">
    {{--Print a single date if the event is on a single day--}}
    @if($event->start_time->isSameDay($event->end_time))
        <div class="event__datebox w-15 text-center align-self-stretch d-flex flex-column justify-content-center text-light">
            <h2 class="mb-0">{{ $event->start_time->format('d') }}
                <br>{{ $event->start_time->format('m') }}</h2>
        </div>
    {{--Print starting and ending dates if events spans multiple days--}}
    @else
        <div class="event__datebox w-15 text-center align-self-stretch d-flex flex-column justify-content-around text-light">
            <h2 class="mb-0 ">{{ $event->start_time->format('d') }}<br>{{ $event->start_time->format('m') }}</h2>
            <h2 class="mb-0 ">{{ $event->end_time->format('d') }}<br>{{ $event->end_time->format('m') }}</h2>
        </div>
    @endif
    <div class="w-85 pb-2">
        {{--Display banner, if any--}}
        @if(!empty($event->banner))
            <img src="{{ $event->banner }}" alt="A decorative banner image for the event"
                 class="img-fluid w-100">
        @endif
        <h3 class="p-2">{{ $event->title }}</h3>
        <div class="d-flex justify-content-between w-100 px-2">
            <h6>{{ $event->venue }}<br><span class="text-muted text-wrap">{{ $event->city }}</span></h6>
            <h6 class="text-right text-wrap">{{ $event->start_time->format('h:i l, jS F') }}<br>
                {{ $event->end_time->format('h:i l, jS F') }}
            </h6>
        </div>
        <p class="p-2">{{ $event->blurb }}</p>
        <a href="{{ $event->url }}" class="btn btn-outline-success m-2" target="_blank">Sign Up</a>
        {{--Display extra links if any--}}
        @if(!empty($event->funnel))
            <a href="{{ $event->funnel }}" class="btn btn-outline-danger m-2" target="_blank">Read More</a>
        @endif
        @if(!empty($event->google_maps_pin))
            <a href="{{ $event->google_maps_pin }}" class="btn btn-outline-primary m-2" target="_blank">Location</a>
        @endif
    </div>
</div>