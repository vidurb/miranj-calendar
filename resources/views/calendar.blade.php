<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Miranj Calendar Exercise by Vidur</title>
    <meta name="description" content="HasGeek Calendar - Exercise for Miranj">
    <meta name="author" content="Vidur Butalia">
    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"/>
</head>
<body>
<main>
    <div class="container">
        <h1 class="d-block d-md-none text-right display-3">HasGeek Calendar</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="d-none d-md-block col-md-2">
                <div class="index__wrapper min-vh-100">
                    <div class="index min-vh-100 d-flex flex-column justify-content-around">
                        <h2 class="text-left">Index</h2>
                        {{--Generate index by iterating through \CarbonPeriod $calendar_range--}}
                        @foreach($calendar_range as $date)
                            {{--Print the year if first--}}
                            @if($loop->first)
                                @php $year = $date->year @endphp
                                <a class="h3 text-left d-block" href="#{{ $date->format('y') }}">{{ $date->year }}</a>
                            @endif
                            {{--Print the year when it changes--}}
                            @if($date->year != $year)
                                <a class="h3 text-left d-block" href="#{{ $date->format('y') }}">{{ $date->year }}</a>
                                @php $year = $date->year @endphp
                            @endif
                            <a class="h6 text-left d-block text-uppercase"
                               href="#{{ $date->format('y-m') }}">{{ $date->format('F') }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-10 listings">
                <h1 class="d-none d-md-block text-right display-3">HasGeek Calendar</h1>
                {{--Main loop - print all the events/conferences--}}
                @foreach($combined_events as $event)
                    {{--Print the year and month for the first event--}}
                    @if($loop->first)
                        @php
                            $year = $event->start_time->year;
                            $month = $event->start_time->month;
                        @endphp
                        <h1 class="w-100 text-right text-muted"><a
                                    id="{{ $event->start_time->format('y') }}">{{ $year }}</a></h1>
                        <h3 class="w-100 text-right text-muted py-2"><a
                                    id="{{ $event->start_time->format('y-m') }}">{{ $event->start_time->englishMonth }} &darr;</a>
                        </h3>
                    @endif
                    {{--Print the year and month when it changes. The headings generated are used as anchors for the index--}}
                    @if($event->start_time->year != $year)
                        @php
                            $year = $event->start_time->year;
                            $month = $event->start_time->month;
                        @endphp
                        <h1 class="w-100 text-right text-muted">{{ $event->start_time->addYear()->format('Y') }} &uarr;</h1>
                        <hr>
                        <h1 class="w-100 text-right text-muted"><a
                                    id="{{ $event->start_time->format('y') }}">{{ $year }} &darr;</a></h1>
                        <h3 class="w-100 text-right text-muted py-2"><a
                                    id="{{ $event->start_time->format('y-m') }}">{{ $event->start_time->englishMonth }}</a>
                        </h3>
                    @elseif($event->start_time->month != $month)
                        @php
                            $month = $event->start_time->month;
                        @endphp
                        <h3 class="w-100 text-right text-muted py-2"><a
                                    id="{{ $event->start_time->format('y-m') }}">{{ $event->start_time->englishMonth }} &darr;</a>
                        </h3>
                    @endif
                    {{--Include the event view for each event--}}
                    @include('event', ['event' => $event])
                @endforeach
            </div>
        </div>
    </div>
</main>
</body>
<script src="{{ asset('/js/app.js') }}"></script>
</html>