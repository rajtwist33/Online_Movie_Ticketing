@extends('customer.layout.app')
@section('main')
    @if ($movie_list)
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row gy-4 posts-list">
                    @foreach ($movie_list as $movie)
                        <div class="col-xl-4 col-md-6">
                            <a href="{{route('customer.home.show',$movie->id)}}">
                                <article>
                                    <div class="post-img">
                                        <img src="{{ asset('uploads/' . $movie->movie_thumbnail) }}"
                                            alt="{{ $movie->movie_name }}" style="width: 100%; height: auto;">
                                    </div>
                                    <p class="post-category"></p>
                                    <h2 class="title">
                                        {{ $movie->movie_name }}
                                    </h2>
                                    <div class="d-flex align-items-center">
                                        {!! $movie->description !!}
                                    </div>
                                       <div class="d-flex text-dark align-item-start align-item-bottom"><p>Price: Rs.300</p></div>
                                </article>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
