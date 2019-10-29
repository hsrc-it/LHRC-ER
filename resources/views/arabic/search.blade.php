<!DOCTYPE html>
<html dir="rtl" lang="ar">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=11" >

        <title> المركز أبحاث نمط الحياة والصحة  - المصادر التعليمية </title>


        <!-- Jquery -->
        <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/admin.css') }}">
        <script src="https://kit.fontawesome.com/a1dae543e1.js"></script>


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/seachPage.css') }}" rel="stylesheet">

        <!-- <script type='text/javascript' src="js/jquery.min.js"></script> -->
        <script type='text/javascript'>
          // Size the parent iFrame
          function iframeResize() {
            var height = $('body').outerHeight(); // IMPORTANT: If body's height is set to 100% with CSS this will not work.
            parent.postMessage("resize::"+height,"*");
          }

          $(document).ready(function() {
            // Resize iframe
            setInterval(iframeResize, 1000);
          });
        </script>

    </head>
    <body class="body-size">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="p-3 mb-2 text-dark center"><h4>مركز أبحاث نمط الحياة و صحة يحتوي على        <b>{{$totalEducationalResources}}</b> من المصادر التعليمية   </h4></div>
                  <form action="/ar/search" method="GET" id="SearchForm">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                    <div class='form-group row'>
                      <div class='col-sm-10'>
                        <div class='row row-margin'>
                          <div class='col'>
                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="اكتب كلمة البحث">
                          </div>
                        </div>
                        <div class='row row-margin'>
                          <div class='col-sm-3'>
                            <select name="topic" id="topic" class="form-control" >
                              <option value="" selected="selected">اختر الموضوع</option>
                              <option value="1"> النشاط البدني </option>
                              <option value="2"> السلوك الخامل </option>
                              <option value="3"> اللياقة البدنية </option>
                              <option value="4"> التغذية </option>
                              <option value="5"> الصحة الذهنية والنفسية </option>
                              <option value="6"> النوم والصحة </option>
                              <option value="7"> التكوين الجسمي والتحكم بالوزن </option>
                              <option value="8"> صحة الأطفال والمراهقين </option>
                              <option value="9"> صحة المرأة </option>
                              <option value="10"> أخرى </option>
                            </select>
                          </div>
                          <div class='col-sm-3'>
                            <select name="age_group" id="age_group" class="form-control" >
                              <option value="">اختر الفئة العمرية </option>
                              @foreach(App\AgeGroups::getAgeGroups() as $ageGroup)
                              <option value='{{$ageGroup->id}}'>{{$ageGroup->arabic_name}} </option>
                              @endforeach
                            </select>
                          </div>
                          <div class='col-sm-3'>
                            <select name="gender" id="gender"class="form-control" >
                              <option value="">اختر النوع </option>
                              <option value="1"> ذكر</option>
                              <option value="2"> انثى</option>
                              <option value="3"> كلاهما</option>
                            </select>
                          </div>
                          <div class='col-sm-3'>
                            <select name="language" id="language" class="form-control" >
                              <option value="">اختر اللغة</option>
                              <option value="1">العربية </option>
                              <option value="2">الإنجليزية </option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class='col-sm-2'>
                        <div class='row row-margin'>
                          <div class='col'>
                            <input type="submit" value="بحث" class="btn btn-primary" onclick="search()" style="width: 70px">
                          </div>
                        </div>
                        <div class='row row-margin '>
                          <div class='col'>
                            <input type="submit" value="مسح" class="btn btn-danger" onclick="clearFormFields()" style="width: 70px">                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                <div class="results text-right" id="results" style="padding-top: 30px;">
                  @include('arabic.results')
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/search.js') }}"></script>
    </body>
</html>
