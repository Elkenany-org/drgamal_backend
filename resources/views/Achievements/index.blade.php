@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">الشهادات</h1>

    <form class="display: flex;justify-content: center;align-items: center;" id="search-form" action="{{route('achievements.search')}}" method="get">
      <input class="mySearch" style="width:15rem;" type="text" name="description" id="search-input" placeholder="ادخل كلمات بالوصف...">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form>
    
  </div>

  @if ($achievements->count() > 0)
    <table class="table" id="table">
          <thead style="border-bottom: #2f80ed 3px solid">
            <tr style="color: #2f80ed">
              <th scope="col" style="width: 5rem;">#</th>
              <th scope="col">الصورة</th>
              <th scope="col">الوصف</th>
              <th scope="col">تاريخ الانشاء</th>
              <th scope="col">تاريخ التعديل</th>
              <th scope="col">الخيارات</th>
            </tr>
          </thead>
          <tbody id="tbody">
              @php
                  $counter =1;
              @endphp
            @foreach ($achievements as $achievement)
            <tr style="border-bottom: 1px double #5d657b">
              <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
              <td><img src="{{$achievement->image}}" alt="error" style="width: 60px"></td>
              <td style="max-width:  7rem;"><p class=" title" 
                style="overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; white-space: pre-wrap; padding-left: 45px;">
                {{$achievement->description}}</p>
              </td>
              <td style="word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word; max-width:  7rem;">{{($achievement->created_at)->format('d/m/Y   h:i:s')}}</p></td>
              <td style="word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word; max-width:  7rem;">{{($achievement->updated_at)->format('d/m/Y   h:i:s')}}</p></td>

              <td>
                <a class="btn btn-secondary ms-1 py-1" href="{{ route('achievements.edit', $achievement->id) }}">تعديل</a> 
                <a class="btn btn-danger ms-1 py-1" href="{{ route('achievements.delete', $achievement->id) }}">حذف</a>  
              </td>
            </tr>
            
                
            @endforeach
          </tbody>
    </table>  
    
    <div class="pagination justify-content-center">
      {{$achievements->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert"> لا يوجد شهادات</div>
    @endif
    
  </div>
  
</div>
@endsection

