<link rel="stylesheet" href="/css/admin.css">


<div class="container">

    <script src="/js/admin.js"></script>

    @foreach($categories as $category)


        <div class="row col-sm-3">

                <div class="card">
                    <div class="card-image ">
                        <img src="images/sample-1.jpg">
                        <span class="card-title">{{$category->title}}</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>

        </div>

    @endforeach
</div>
