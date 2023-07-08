@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">الصور و اللوجوهات</h1>
  </div>

  @if ($images->count() > 0)
    <table class="table" id="table">
          <thead style="border-bottom: #2f80ed 3px solid">
            <tr style="color: #2f80ed">
              <th scope="col" style="width: 5rem;">#</th>
              <th scope="col">الصورة</th>
              <th scope="col">النوع</th>
              <th scope="col">تاريخ الانشاء</th>
              <th scope="col">تاريخ التعديل</th>
              <th scope="col">الخيارات</th>
            </tr>
          </thead>
          <tbody id="tbody">
              @php
                  $counter =1;
              @endphp
            @foreach ($images as $image)
            <tr style="border-bottom: 1px double #5d657b">
              <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
              <td><img src="/images/home/{{$image->image}}" alt="error" style="width: 60px"></td>
              <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$image->type}}</p></td>
              <td style="word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word; max-width:  7rem;">{{($image->created_at)->format('d/m/Y   h:i:s')}}</p></td>
              <td style="word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word; max-width:  7rem;">{{($image->updated_at)->format('d/m/Y   h:i:s')}}</p></td>

              <td>
                <a class="btn btn-secondary ms-1 py-1" href="{{ route('images.edit', $image->id) }}">تغيير</a> 
                <a class="btn btn-danger ms-1 py-1" href="{{ route('images.delete', $image->id) }}">حذف</a>  
              </td>
            </tr>
            
                
            @endforeach
          </tbody>
    </table>  
    
    <div class="pagination justify-content-center">
      {{$images->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert"> لا يوجد صور او لوجوهات</div>
    @endif
    
  </div>
  
</div>
@endsection

