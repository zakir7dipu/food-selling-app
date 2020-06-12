<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="logo-area">
                    @if(auth()->user())
                    <button class="btn btn-sm btn-warning logo_edit_dtn"><i class="fa fa-edit"></i></button>
                    @endif
                    <a href="/"><img src="{{ asset('upload/images/logos/'.$logo) }}" alt="logo"></a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="custom-navbar">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="main-menu">
                    <ul>
                        <li class="active">
                            @if(auth()->user())
                                <a href="{{ url('/dashboard') }}">Dashboard</a>
                            @endif
                        </li>
                        <li class="active"><a href="/">home</a></li>
                        <li><a href="javascript:void(0)" id="about_us_btn">about</a></li>
                        <li><a href="{{ route('menu') }}">menu</a></li>
                        <li><a href="javascript:void(0)" id="contact_us_btn">contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
