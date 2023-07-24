@extends('backend.layouts.main')
@section('style')
    <style>

    </style>
@endsection
@section('body')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><a href="{{ route('manage_movie.index') }}" class="btn btn-dark"> <i
                            class="bi bi-arrow-left-short"></i> Back</a> </h3>
            </div>
            <div class="card-body mb-5">
                @include('backend.message.success')
                <div class="col-12 mt-3">
                    <div class="form-group">
                        <div class="card ">
                            <div class="card-header">
                                <h2> Movie Name: <strong class="text-primary ml-3">{{ $data->movie_name }}</strong></h2>
                            </div>
                            <div class="card-header">
                                <h3>Movie Description</h3>
                            </div>
                            <div class="card-body">
                                {!! $data->description !!}
                                <a href="{{ asset('uploads/' . $data->movie_thumbnail) }}" target="blank"><img
                                        src="{{ asset('uploads/' . $data->movie_thumbnail) }}" alt="" srcset=""
                                        style="float:right; max-width:20%; height:auto; border:1px solid black; margin:10px;"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Write Somethings !',
                tabsize: 2,
                height: 100
            });
        });
        setTimeout(function() {
            $('#initalHidden').fadeOut('fast');
        }, 3000);
    </script>
@endsection
