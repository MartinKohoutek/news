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
            <a href="#" class="category">{{ $item['subcategory']['subcategory_name'] }}</a>
            @else
            <a href="#" class="category">{{ $item['category']['category_name'] }}</a>
            @endif
            <h2><a href="single-post.html">{{ $item->news_title }}</a></h2>
            <ul class="post-tags">
                <li><i class="lnr lnr-user"></i>by <a href="#">{{ $item->user->name }}</a></li>
                <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
            </ul>
        </div>
    </div>
    @endforeach
</div>