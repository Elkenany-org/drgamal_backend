@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block " style="width: 100px">الشركات</h1>
    
  </div>
  @if ($companies->count() > 0)
    <table class="table" id="table">
          <thead style="border-bottom: #2f80ed 3px solid">
            <tr style="color: #2f80ed">
              <th scope="col" style="width: 5rem;">#</th>
              <th scope="col" style="width: 8rem;">الصورة</th>
              <th scope="col">السنة</th>
              <th scope="col">العنوان</th>
              <th scope="col">تاريخ الانشاء</th>
              <th scope="col">الخيارات</th>
            
            </tr>
          </thead>
            <tbody id="tbody">
              @include('Companies.rows')
            </tbody>
    </table>  
    <div class="pagination justify-content-center">
      {{$companies->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد شركات</div>
    @endif
    
  </div>

</div>
@endsection

<link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/daygrid.min.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid' ],
      events: [
        // Add your calendar events here
      ]
    });

    calendar.render();
  });
</script>