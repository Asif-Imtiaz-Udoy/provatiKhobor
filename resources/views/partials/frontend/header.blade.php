 <!-- advertisement section start -->
 @if (!empty($advertisements))
     <div class="container-fluid" id="dialog">
         <div class="row p-3">
             @foreach ($advertisements as $advertisement)
                 @if ($advertisement->ad_category == 1)
                     @if ($advertisement->ad_type == 1)
                         <div class="d-flex justify-content-center">
                             <a class="text-center m-auto" href="{{ $advertisement->link }}">
                                 <img class="img-fluid"
                                     src="{{ url('/images/advertisements', $advertisement->ad_image) }}" alt="" />
                             </a>
                         </div>
                     @else
                         {{ $advertisement->ad_script }}
                     @endif
                 @endif
             @endforeach
         </div>
     </div>
 @endif
 <!-- advertisement section end -->

 <!-- head start -->
 <header>
     <div class="head">
         <div class="container">
             <div class="row">
                 <div class="col-md-4 col-sm-12 d-flex align-items-end justify-content-around">
                     <div class="d-flex mb-2">
                         <span class="pe-3">
                             <a href="#"><i class="fa-solid fa-location-dot pe-2"></i>লন্ডন</a>
                         </span>
                         <span class="pe-1">
                             <a href="#">
                                 <i class="fa-solid fa-calendar-day pe-1"></i><span id='day-name'></span>
                             </a>
                         </span>
                         <span class="pe-3">
                             <a href="#">@php echo bangla_date(time(),"en") @endphp</a>
                         </span>

                     </div>
                 </div>
                 <div class="col-6 col-md-4 col-sm-6">
                     <div class="head-logo text-lg-center">
                         <a href="{{ route('home') }}">
                             <img class="img-fluid" src="{{ url('assets/frontend/images/logo/logo.png') }}"
                                 alt="unmamed">
                         </a>

                     </div>
                 </div>
                 <div class="col-6 col-md-4 col-sm-6 d-flex align-items-lg-end">
                     <div class="head-logo2 d-flex align-items-center justify-content-end">
                         <img class="img-fluid pe-3 w-50 h-50"
                             src="{{ url('assets/frontend/images/test/sky-png.png') }}" alt="sky.png">

                         <div class="live-sec" style="position: relative">
                             <div class="pulse d-flex justify-content-center align-items-center">
                                 <div class="boder2">
                                     <div class="boder3">

                                     </div>
                                 </div>
                             </div>
                         </div>
                         <p class="live fst-italic ps-2 pt-3 text-center" id="live">LIVE</p>
                         <a class="ps-2 search" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!-- head end -->

 <!-- nav start -->
 <section>
     <div class="nav-sec bg-info">
         <div class="container">
             <nav class="navbar navbar-expand-lg navbar-light">
                 <div class="container">
                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                         data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                         aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                             <li class="nav-item">
                                 <a class="nav-link active fs-5" aria-current="page" href="{{ route('home') }}"><i
                                         class="zmdi zmdi-home "></i></a>
                             </li>
                             @if (!empty($categories))
                                 @foreach ($categories as $key => $category)
                                     @if ($key < 8)
                                         <li class="nav-item">
                                             <a class="nav-link fs-5"
                                                 href="{{ route('categoryDetails', $category->id) }}"><b>{{ $category->name }}</b></a>
                                         </li>
                                     @endif
                                 @endforeach
                                 <li class="nav-item dropdown has-megamenu">
                                     <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDropdown"
                                         role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                         <B>অন্যান্য</B>
                                     </a>
                                     <div class="dropdown-menu megamenu" role="menu">
                                         <div class="container d-flex justify-content-between flex-wrap">
                                             @foreach ($categories as $key => $category)
                                                 @if ($key >= 7)
                                                     <a class="dropdown-item w-25 text-center"
                                                         href="{{ route('categoryDetails', $category->id) }}">{{ $category->name }}</a>
                                                 @endif
                                             @endforeach
                                         </div>
                                     </div>
                                 </li>
                             @endif
                         </ul>
                     </div>
                 </div>
             </nav>
         </div>

     </div>



     <script>
         function dayName() {
             const d = new Date();
             let day = d.getDay();
             const todayName = document.getElementById('day-name');

             if (day == 0) {
                 todayName.innerText = 'রবিবার,';
             }
             if (day == 1) {
                 todayName.innerText = 'সোমবার,';
             }
             if (day == 2) {
                 todayName.innerText = 'মঙ্গলবার,';
             }
             if (day == 3) {
                 todayName.innerText = 'বুধবার,';
             }
             if (day == 4) {
                 todayName.innerText = 'বৃহস্পতিবার,';
             }
             if (day == 5) {
                 todayName.innerText = 'শুক্রবার,';
             }
             if (day == 6) {
                 todayName.innerText = 'শনিবার,';
             }
         }
         dayName();
     </script>
 </section>
 <!-- nav end -->
