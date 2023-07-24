@extends('backend.layouts.main')
@section('body')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><a href="{{ route('manage_movie.index') }}" class="btn btn-dark"> <i
                            class="bi bi-arrow-left-short"></i> Back</a> </h3>
            </div>
            <form action="{{ route('manage_movie.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include('backend.message.success')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Movie Name</label>
                        <input type="text" name="movie_name"
                            value="{{ $data->movie_name ? $data->movie_name : old('movie_name') }}" class="form-control"
                            id="exampleInputEmail1" placeholder="Enter Movie name">
                    </div>
                    <div >
                        <a href="{{ asset('uploads/' . $data->movie_thumbnail) }}" target="blank"><img
                                src="{{ asset('uploads/' . $data->movie_thumbnail) }}" alt="" srcset=""
                                style="float:start; max-width:20%; height:auto; border:1px solid black; margin:10px;"></a>
                    </div>

                    <div class="form-group">
                        <img id="blah" src="#" style="max-width: 20%; height
                        auto;" />
                        <br>
                        <label for="exampleInputEmail1">Movie Thumbnail</label>
                        <input type="file" name="movie_thumbnail" id="imgInp" class="form-control"
                            id="exampleInputEmail1" placeholder="Enter Movie name">
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Movie Description</label>
                            <input type="hidden" name="data_id" value="{{$data->id}}">
                            <textarea id="summernote" name="description">{!! $data->description ? $data->description : old('descrition') !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer mb-5">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
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
