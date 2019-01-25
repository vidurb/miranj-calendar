<div class="conference">
    <img src="{{ $conference->banner }}" alt="">
    <h1>{{ $conference->title }}</h1>
    <h6>{{ $conference->venue }} <br> {{ $conference->city }}</h6>
    <h6>{{ $conference->start_time }} <br> {{ $conference->end_time }}</h6>
    <p>{{ $conference->blurb }}</p>
    <a href="{{ $conference->url }}" class="btn">See More</a>
</div>