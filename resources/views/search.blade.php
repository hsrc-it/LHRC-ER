<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=11" >

        <title>Lifestyle & Health Research Center - Educational Resources</title>

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
                <div class="p-3 mb-2 text-dark center"><h4>LHRC contains <b>{{$totalEducationalResources}}</b> educational resources </h4></div>
                  <form action="/search" method="GET" id="SearchForm">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                    <div class='form-group row'>
                      <div class='col-sm-10'>
                        <div class='row row-margin'>
                          <div class='col'>
                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search using keyword">
                          </div>
                        </div>
                        <div class='row row-margin'>
                          <div class='col-sm-3'>
                            <select name="topic" id="topic" class="form-control" >
                              <option value="" selected="selected">Select topic</option>
                              <option value="1">Physical Activity</option>
                              <option value="2">Sedentary Behavior </option>
                              <option value="3">Physical Fitness </option>
                              <option value="4">Nutrition </option>
                              <option value="5">Mental Health</option>
                              <option value="6">Sleep and Health</option>
                              <option value="7">Body Composition and Weight Management </option>
                              <option value="8">Children's and Adolescents' Health</option>
                              <option value="9">Women's Health</option>
                              <option value="10">Other</option>
                            </select>
                          </div>
                          <div class='col-sm-3'>
                            <select name="age_group" id="age_group" class="form-control" >
                              <option value="">Select age group </option>
                              <option value="1">Child [0-12] </option>
                              <option value="2">Adolescent [13-18] </option>
                              <option value="3">Adults [19-64] </option>
                              <option value="4">Elderly [65+] </option>
                            </select>
                          </div>
                          <div class='col-sm-3'>
                            <select name="gender" id="gender"class="form-control" >
                              <option value="">Select gender </option>
                              <option value="1">Male </option>
                              <option value="2">Female </option>
                              <option value="3">Both </option>
                            </select>
                          </div>
                          <div class='col-sm-3'>
                            <select name="language" id="language" class="form-control" >
                              <option value="">Select language </option>
                              <option value="1">Arabic </option>
                              <option value="2">English </option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class='col-sm-2'>
                        <div class='row row-margin'>
                          <div class='col'>
                            <input type="submit" value="Search" class="btn btn-primary" onclick="search()">
                          </div>
                        </div>
                        <div class='row row-margin '>
                          <div class='col'>
                            <input type="submit" value="Clear" class="btn btn-danger" onclick="clearFormFields()" style="width: 70px">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                <div class="results" id="results" style="padding-top: 30px;">
                  @include('results')
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/search.js') }}"></script>
    </body>
</html>
