@extends('frontend.layout.app')
@section('main')
    <a href="{{ url()->previous() }}" class="btn btn-md btn-primary" style="margin-inline-start: 5%; margin-top:1%;"> Back</a>
    <section id="blog" class="blog">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-8">
                    <article class="blog-details">
                        <div class="post-img">
                            <img src="{{ asset('uploads/' . $data->movie_thumbnail) }}" alt="{{ $data->movie_name }}"
                                class="img-fluid">
                        </div>

                        <h2 class="title">{{ $data->movie_name }}</h2>
                        <div class="content">
                            <p>
                                {!! $data->dscription !!}
                            </p>

                            <p>
                                Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus
                                harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.
                            </p>

                        </div>
                    </article>
                </div>

                {{-- Checkout --}}
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-item search-form">
                            <h3 class="sidebar-title">Select Your Seats</h3>
                        </div>
                        <div class="sidebar-item categories">
                           <form action="{{route('login')}}" method="get">
                            @csrf
                                <div class="row">
                                    @for ($i = 1; $i <= 50; $i++)
                                        <div class="col-1">
                                            <label class="form-check-label align-item-center"
                                                for="{{ $i }}">{{ $i }}</label>
                                            <input type="checkbox" class="form-check-input" id="{{ $i }}"
                                                name="seats[]" value="{{$i}}">
                                    </div>
                                    @endfor
                                    <input type="hidden" name="movie_id" value="{{$data->id}}">
                                    <button type="sybmit" class="btn btn-success">Checkout</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
