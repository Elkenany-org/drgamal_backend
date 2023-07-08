@extends('layouts.app')

@section('content')

<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>الشكوي</h2>
            </div>
        </div>
    </div>
</div>
<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="card-content">            
            <div class="row">
                <div class="col-12">
                    <div class="input-style-1">
                    <label for="name">الاسم</label>
                    <input type="text" class="form-control" name="name"
                            id="name" placeholder="{{$message->name}}" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-style-1">
                    <label for="email">البريد الالكتروني</label>
                    <input type="text" class="form-control" name="email"
                            id="name" placeholder="{{$message->email}}" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-style-1">
                    <label for="message">الرسالة</label>
                    <textarea type="text" class="form-control" name="message" rows="8"
                            id="name" placeholder="{{$message->message}}" readonly></textarea>
                    </div>
                </div>

                <div class="col-12">
                    <div class="button-group d-flex justify-content-center flex-wrap">
                        <a href="{{ route('contactus.soft_delete', $message->id) }}" class="main-btn danger-btn btn-hover w-25 text-center">
                            حذف
                        </a>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>
@endsection
