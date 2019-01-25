<div class="event">
    <h1>{{ $event->title }}</h1>
    <h6>{{ $event->venue }} <br> {{ $event->city }}</h6>
    <h6>{{ $event->start_time }} <br> {{ $event->end_time }}</h6>
    <p>{{ $event->blurb }}</p>
    <a href="{{ $event->url }}" class="btn">See More</a>
</div>