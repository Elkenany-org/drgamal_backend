@php
$counter =1;
@endphp
@foreach ($companies as $company)
<tr style="border-bottom: 1px double #5d657b">
    <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
        <td><img src="{{$company->image}}" alt="error" style="width: 60px"></td>
        <td><img src="{{$company->logo}}" alt="error" style="width: 60px"></td>
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 90px;"><p style=" overflow-wrap: break-word">{{$company->link}}</p></td>

        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 90px;"><p style=" overflow-wrap: break-word">{{$company->year}}</p></td>
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p style=" overflow-wrap: break-word">{{$company->title}}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p style=" overflow-wrap: break-word">{{($company->created_at)->format('d/m/Y   h:i:s')}}</p></td>
        
   
    <td>
        <a class="btn btn-secondary ms-1 py-1" href="{{ route('companies.edit', $company->id) }}">تعديل</a>
        <a class="btn btn-danger ms-1 py-1" href="{{ route('companies.delete', $company->id) }}">حذف</a>  
    </td>
</tr>
@endforeach