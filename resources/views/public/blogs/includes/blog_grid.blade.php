<div class="col-sm-12 col-lg-6 col-md-6 col-xs-12 blog">
    <div class="row">
        <div class="col-5 img_blog">
            <a href="#" class="link_img">
                <img
                    src="{{asset($item->feature_img)}}">
            </a>
        </div>
        <div class="col-7">
            <div class="post-title">
                <a href="{{route('bai-viet.show', [$item->slug])}}" class="blog-grid-title color_dark" style="font-weight: 600;">
                    {{$item->name}}
                </a>
            </div>
            <div class="post_meta date-time">
                <span class="far fa-clock"></span> {{date('Y/m/d H:i:s', strtotime($item->created_at))}}
            </div>
            <div class="post_content blog-grid-short-desc">
                {!!$item->content!!}</div>
            <div class="post_more">
                <a class="more-btn" href="{{route('bai-viet.show', [$item->slug])}}">Xem thêm</a>
            </div>
        </div>
    </div>
</div>