<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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

    </head>
    <body class="body-size">
        <div class="flex-center position-ref full-height">
            <div class="content">
                  <form action="/search" method="GET" id="SearchForm">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <div class='form-group row'>
                      <div class='col-sm-12'>
                        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search using keyword">
                      </div>
                    </div>
                    <div class='form-group row'>
                      <div class='col-sm-6'>
                        <select name="gender" id="gender"class="form-control" >
                          <option value="">Select gender </option>
                          <option value="1">Male </option>
                          <option value="2">Female </option>
                          <option value="3">Both </option>
                        </select>
                      </div>
                      <div class='col-sm-6'>
                        <select name="age_group" id="age_group" class="form-control" >
                          <option value="">Select age group </option>
                          <option value="1">child [0-12] </option>
                          <option value="2">Adolescent [13-18] </option>
                          <option value="3">Adults [19-64] </option>
                          <option value="4">Elderly [65+] </option>
                        </select>
                      </div>
                    </div>

                    <div class='form-group row'>
                      <div class='col-sm-6'>
                        <select name="language" id="language" class="form-control" >
                          <option value="">Select language </option>
                          <option value="1">Arabic </option>
                          <option value="2">English </option>
                        </select>
                      </div>
                      <div class='col-sm-6'>
                        <select name="topic" id="topic" class="form-control" >
                          <option value="" selected="selected">Select topic</option>
                          <option value="1">Physical Activity</option>
                          <option value="2">Sedentary Behavior </option>
                          <option value="3">Physical Fitness </option>
                          <option value="4">Nutrition Nutrition </option>
                          <option value="5">Mental Health</option>
                          <option value="6">Sleep and Health</option>
                          <option value="7">Body Composition and Weight Management </option>
                          <option value="8">Children's and Adolescents' Health</option>
                          <option value="9">Women's Health</option>
                          <option value="10">Other</option>
                        </select>
                      </div>
                    </div>

                    <div class='form-group row'>
                      <div class='col-sm-6'>
                      <input type="submit" class="btn btn-primary" onclick="search()">
                    </div>
                    </div>
                  </form>
                <div class="results" id="results">
                  @include('results')
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/search.js') }}"></script>
    </body>
</html>
