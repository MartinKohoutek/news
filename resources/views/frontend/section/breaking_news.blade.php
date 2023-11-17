<style>
   
    #scroll5-left {
	position: relative;
	width: auto;
	height: 40px;
	padding-top: 8px;
	padding-left: 10px;
	margin: 0;
	padding-right: 10px;
	padding: 9px 20px 9px 10px;
	font-size: 18px;
	color: #fff;
	background-color: #212121;
	font-weight: 400;


}

#scroll5-left::before {
	position: absolute;
	right: -20px;
	bottom: 0;
	content: "";
	width: 0;
	height: 0;
	border-left: 20px solid #212121;
	border-top: 20px solid transparent;
	border-bottom: 20px solid transparent;
}

.scroll5-right {
	position: relative;
	height: 40px;
	width: 100%;
	background: #343a40;
	color: #000000;	
	line-height: 40px;
}

.scroll5-right a {
	font-size: 18px;
	color: white;	
	font-weight: 400;
	margin-right: 12px;
	display: inline-block;
}

.scroolbar5 {
	position: absolute;
	right: 0;
	top: 0px;
	height: 100%;
	float: right;
	width: 59px;
	height: 40px;
	background: #19232D;
	color: #fff;
	cursor: pointer;

}

.scroll-section5 {
        margin-bottom: 10px
    }

    .top_scroll5 {
        overflow: hidden
    }

    .scroll5-left {
        position: absolute;
        width: auto;
        line-height: 24px;
        z-index: 99
    }

    .scroolbar5 {
        padding: 6px;
        position: relative
    }

    .scroolbar5 {
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        float: right;
        width: 59px;
        height: 40px;
        background: #212121;
        color: #fff;
        cursor: pointer
    }

    .scroolbar5::after {
        position: absolute;
        top: 0;
        right: 100%;
        content: '';
        height: 0;
        width: 0;
        border-bottom: 40px solid #212121;
        border-left: 16px solid transparent;
        display: inline-block
    }

    .scroll5-right i {
        color: #01284f
    }

    .scroolbar5 button span {
        position: absolute;
        left: 0;
        top: -15px;
        bottom: -5px;
        right: 0;
        font-size: 40px;
        color: #fff;
        text-align: center
    }

    .scroolbar5>button {
        background: 0 0;
        border: transparent;
        cursor: pointer;
    }

    .alert {
        margin-bottom: 15px;
        margin-top: 10px;
        padding: 0;
    }

    .top_scroll2 {
        padding-left: 0;
        padding-right: 0;
    }

</style>

<div class="top-scroll-section5">
    <div class="container">
        <div class="alert" role="alert">
            <div class="scroll-section5">
                <div class="row">
                    <div class="col-md-12 top_scroll2">
                        <div class="scroll5-left">
                            <div id="scroll5-left">
                                <span> Breaking News :: </span>
                            </div>
                        </div>
                        @php
                            $breakingNews = \App\Models\NewsPost::where('status', 1)->where('breaking_news', 1)->limit(7)->latest()->get();
                        @endphp
                        <div class="scroll5-right">
                            <marquee direction="left" scrollamount="5px" onmouseover="this.stop()" onmouseout="this.start()">
                                @foreach ($breakingNews as $news)
                                <a href=" ">&#128312;{{ $news->news_title }}</a>
                                @endforeach
                            </marquee>
                        </div>
                        <div class="scroolbar5">
                            <button data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
