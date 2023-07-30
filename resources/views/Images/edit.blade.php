@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>اضافة صورة</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    @if($errors->any())
    <div class="alert alert-danger fw-bold" role="alert">
        <h4>{{$errors->first()}}</h4>
    @endif
    </div>
    <form action="{{route('images.update' , $image->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-styles">
            <div class="card-style-3 mb-30">
                <div class="card-content">
                    <div class="row">
                        @php
                            $counter = 0;
                        @endphp
                        <div class="col-12">
                        <div class="input-style-1">
                            <label for="type">النوع</label>
                            <input type="text" name="type" value="{{$image->type}}" readonly>
                        </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="name">الصورة</label>
                                <img src="{{$image->image_url}}" alt="error" style="width: 200px">
                                <input type="file" class="file" id="file" name="image">
                            </div>
                        </div>
                        
                        
              <div class="col-12">
                <div class="input-style-1">
                  <label for="link">اللينك</label>
                  <input type="text" class="form-control" name="link" id="link" value="{{$image->link}}" oninput="countCharacters(this,1)">
                  <div dir="ltr"><span id="2"></span></div>
                </div>
              </div>
              

                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <input type="submit" value="تعديل" class="main-btn primary-btn btn-hover w-25 text-center">
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </form> 
@endsection
