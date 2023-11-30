@php
    $firstThree = App\Models\NewsPost::where('first_section_three', 1)->where('status', 1)->latest()->limit(2)->get();
@endphp
<div class="news-headline">
    <span class="title-notifier">
        Heading News
    </span>
    @foreach ($firstThree as $key => $item)
    <div class="news-post image-post main-post">
        <img src="{{ asset($item->image) }}" alt="" style="height: 375px; object-fit:cover">
        <div class="hover-box">
            @if ($item->subcategory_id != null)
            <a href="{{ url('/news/subcategory/'.$item->subcategory_id.'/'.$item->subcategory->subcategory_slug) }}" class="category">{{ $item['subcategory']['subcategory_name'] }}</a>
            @else
            <a href="{{ url('/news/category/'.$item->category_id.'/'.$item->category->category_slug) }}" class="category">{{ $item['category']['category_name'] }}</a>
            @endif
            <h2><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-user"></i>by <a href="{{ url('/reporter/all/news/'.$item->user->id) }}">{{ $item->user->name }}</a></li>
                @php
                    $countComments = App\Models\Review::where('status', 1)->where('news_id', $item->id)->count();
                @endphp
                <li><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug.'#comments') }}"><i class="lnr lnr-book"></i><span>{{ $countComments }} comments</span></a></li>
            </ul>
        </div>
    </div>
    @endforeach
</div>