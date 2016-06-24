@foreach($travelList as $item)
    <div class="media">
        <div class="media-left">
            <a href="{{ $item->url }}">
                <img class="media-object" src="{{ $item->cover_image }}" alt="{{ $item->title }}" width="80" height="80">
            </a>
        </div>
        <div class="media-body">
            <a href="{{ $item->url }}"><h4 class="media-heading">{{ $item->title }}</h4></a>
            <p>{{ $item->begin_date->diffForHumans() }}</p>
            {{ $item->description }}
            <p><a role="button" href="{{ $item->url }}" class="btn2 btn-secondary-outline m-b-1"><span class="glyphicon glyphicon-pencil"></span>查看全文</a></p>
        </div>
    </div>
@endforeach