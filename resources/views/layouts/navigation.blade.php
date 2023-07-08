<input type="text" class="mySearch mx-auto d-block" id="mySearch" onkeyup="search(this.value)" placeholder="بحث" title="Type in a category">
<ul>

    <li class="nav-item @if(request()->routeIs('About.edit')) active @endif">
        <a class="search " href="{{route('About.edit')}}">
              <span class="icon">
                <i class="fa-solid fa-circle-info"></i>
              </span>
            <span class="text">عن دكتور جمال</span>
        </a>
    </li>
    <li class=" nav-item @if(request()->routeIs('companies.index') || request()->routeIs('companies.create'))  active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_1"
        aria-controls="ddmenu_1" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-building"></i>
            </span>
            <span class="text">الشركات</span>
        </a>
        <ul id="ddmenu_1" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('companies.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
            </li>
            <li>
                <a href="{{ route('companies.create') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
        </ul>
    </li>
    
    <li class=" nav-item @if(request()->routeIs('images.index') || request()->routeIs('images.create'))  active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_2"
        aria-controls="ddmenu_2" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-image"></i>
            </span>
            <span class="text">الصور و اللوجوهات</span>
        </a>
        <ul id="ddmenu_2" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('images.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
            </li>
            <li>
                <a href="{{ route('images.create') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
        </ul>
    </li>
    <li class=" nav-item @if(request()->routeIs('News.index') || request()->routeIs('News.create') || request()->routeIs('News.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_3"
        aria-controls="ddmenu_3" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-newspaper fa-sm"></i>
            </span>
            <span class="text">الاخبار</span>
        </a>
        <ul id="ddmenu_3" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('News.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
            </li>
            <li>
                <a href="{{ route('News.create') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
        </ul>
    </li>
    <li class=" nav-item @if(request()->routeIs('achievements.index') || request()->routeIs('achievements.create')) active @else noneactive @endif nav-item-has-children">
            <a class="search collapsed"  class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_4"
            aria-controls="ddmenu_4" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-award"></i>
            </span>
            <span class="text">الشهادات</span>
        </a>
        <ul id="ddmenu_4" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('achievements.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
            </li>
            <li>
                <a href="{{ route('achievements.create') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
        </ul>
    </li>
    
    {{-- <li class=" nav-item @if(request()->routeIs('Articles.index') || request()->routeIs('Articles.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_10"
           aria-controls="ddmenu_10" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-newspaper"></i>
            </span>
            <span class="text">المقالات</span>
        </a>
        <ul id="ddmenu_10" class="dropdown-nav collapse" style="">
            <li>
                <a href="{{route('Articles.index')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
                <a href="{{route('Articles.create')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
            <li>
            </li>
        </ul>
    </li> --}}
        
    <li class=" nav-item @if(request()->routeIs('Jobs.index') || request()->routeIs('Jobs.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_3"
           aria-controls="ddmenu_3" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-briefcase"></i>
            </span>
            <span class="text">الوظائف</span>
        </a>
        <ul id="ddmenu_3" class="dropdown-nav collapse" style="">
            <li>
                <a href="{{route('Jobs.index')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
                <a href="{{route('Jobs.create')}}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
            <li>
            </li>
        </ul>
    </li>
    
    <li class=" nav-item @if(request()->routeIs('info.index') || request()->routeIs('info.archive')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_5"
        aria-controls="ddmenu_5" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-circle-info"></i>
            </span>
            <span class="text">البيانات</span>
        </a>
        <ul id="ddmenu_5" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('info.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
            </li>
            <li>
                <a href="{{ route('info.create') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
        </ul>
    </li>


    <li class="nav-item @if(request()->routeIs('contactus.index') || request()->routeIs('contactus.archive')) active @endif">
        <a class="search" href="{{route('contactus.index')}}">
              <span class="icon">
                <i class="fa-solid fa-message"></i>
              </span>
            <span class="text">الرسائل</span>
        </a>
    </li>
   
    @if (Auth::check() && Auth::user()->role == 'admin')
    <li class=" nav-item @if(request()->routeIs('users.index') || request()->routeIs('register_form')) active @else noneactive @endif nav-item-has-children">
        <a class="search collapsed"  data-bs-toggle="collapse" data-bs-target="#ddmenu_6"
        aria-controls="ddmenu_6" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="fa-solid fa-circle-info"></i>
            </span>
            <span class="text">المستخدمين</span>
        </a>
        <ul id="ddmenu_6" class="dropdown-nav collapse">
            <li>
                <a href="{{ route('users.index') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-eye m-0" style="font-size: 14px"></i></div>
                    عرض
                </a>
            </li>
            <li>
                <a href="{{ route('register_form') }}">
                    <div class="ico w-fit"><i class="fa-solid fa-plus m-0" style="font-size: 14px"></i></div>
                    اضافة
                </a>
            </li>
        </ul>
    </li>
    @endif

</ul>

<script>
    function search (input) 
    {
        input = input.toLowerCase()
        let links = document.querySelectorAll(".search")

        for (let index = 0; index < links.length; index++) {
            if (links[index].textContent.toLowerCase().includes(input)) {
                links[index].style.display = "flex"
            }   else {
                links[index].style.display = "none"
            }
        }
    }
</script>
    