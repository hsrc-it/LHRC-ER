@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
                    @if(!empty($allResources))
                    <table class="table">
                      <thead>
                        <tr class="table-secondary">
                          <th colspan="5">
                            {{ $allResources->count() }} Educational resource entered
                          </th>
                        </tr>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Title
                          </th>
                          <th>
                            Age group
                          </th>
                          <th>
                            Gender
                          </th>
                          <th>
                            Date Developed
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($allResources as $EducationalResource)
                        <tr>
                          <td>
                            {{ $EducationalResource->id }}
                          </td>
                          <td>
                          <h5><a href="{{$EducationalResource->url}}" target="_blank">
                              @php
                                switch($EducationalResource->format){
                                  case 1: echo "<i class='fa fa-file-word-o text-primary icon-size' aria-hidden='true'></i>&nbsp;&nbsp;&nbsp;";
                                  break;
                                  case 2: echo "<i class='fa fa-file-powerpoint-o text-orange icon-size' aria-hidden='true'></i>&nbsp;&nbsp;&nbsp;";
                                  break;
                                  case 3: echo "<i class='fa fa-file-pdf-o text-danger icon-size' aria-hidden='true'></i>&nbsp;&nbsp;&nbsp;";
                                  break;
                                  case 4: echo "<i class='far fa-file-video text-success icon-size'></i>&nbsp;&nbsp;&nbsp;";
                                  break;
                                  case 5: echo "<i class='far fa-file icon-size'></i>&nbsp;&nbsp;&nbsp;";
                                  break;
                                }
                              @endphp
                            </a>
                            <a href="{{$EducationalResource->url}}" target="_blank" class="text-dark ">
                              {{$EducationalResource->title}}
                            </a></h5>
                          </td>
                          <td>
                            @foreach($EducationalResource->ageGroups as $ageGroup)
                              @if ($ageGroup === end($EducationalResource->ageGroups))
                                {{$ageGroup['age_group']}}
                              @else
                                {{$ageGroup['age_group']}} <br>
                              @endif
                            @endforeach
                          </td>
                          <td>
                            @php
                              switch($EducationalResource->gender){
                                case 1: echo "Male";
                                break;
                                case 2: echo "Female";
                                break;
                                case 3: echo "Both";
                                break;
                              }
                            @endphp
                          </td>

                          <td>
                            {{$EducationalResource->date_of_approval}}
                          </td>

                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                @else
                  No resources entered ...
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
