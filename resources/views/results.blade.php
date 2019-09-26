@if(!empty($EducationalResources))
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr >
          <th class="cell-css">
            #
          </th>
          <th class="title-cell-css">
            Title
          </th>
          <th class="cell-css">
            Age group
          </th>
          <th class="cell-css">
            Gender
          </th>
          <th class="cell-css">
            Date Developed
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($EducationalResources as $EducationalResource)
        <tr>
          <td class="cell-css">
            {{ (($EducationalResources->currentPage() - 1 ) * $EducationalResources->perPage() ) + $loop->iteration }}
          </td>
          <td>
          <h6><a href="{{$EducationalResource->url}}" target="_blank" class="no-line text-dark">
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
            <a href="{{$EducationalResource->url}}" target="_blank" class="text-dark text-css">
              {{$EducationalResource->title}}
            </a></h6>
          </td>
          <td class="cell-css">
            @php
              switch($EducationalResource->age_group){
                case 1: echo "Child<br>[0-12]";
                break;
                case 2: echo "Adolescent<br>[13-18]";
                break;
                case 3: echo "Adults<br>[19-64]";
                break;
                case 4: echo "Elderly<br>[65+]";
                break;
              }
            @endphp
          </td>
          <td class="cell-css">
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

          <td class="cell-css" style="white-space: nowrap;">
            {{date("d-m-Y", strtotime($EducationalResource->date_of_approval))}}
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
    <div class="hpadding20">
      <ul class="pagination right paddingbtm20">
        {{$EducationalResources->links()}}
      </ul>
    </div>
@elseif(!empty($findEducationalResources))
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr class="table-secondary">
          <th colspan="5">
            <h5>{{ $findEducationalResources->total() }} Educational resource matched your search</h5>
          </th>
        </tr>
        <tr >
          <th class="cell-css">
            #
          </th>
          <th class="title-cell-css">
            Title
          </th>
          <th class="cell-css">
            Age group
          </th>
          <th class="cell-css">
            Gender
          </th>
          <th class="cell-css">
            Date Developed
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($findEducationalResources as $EducationalResource)
        <tr>
          <td class="cell-css">
            {{ (($findEducationalResources->currentPage() - 1 ) * $findEducationalResources->perPage() ) + $loop->iteration }}
          </td>
          <td>
          <h6><a href="{{$EducationalResource->url}}" target="_blank" class="no-line text-dark">
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
            <a href="{{$EducationalResource->url}}" target="_blank" class="text-dark text-css">
              {{$EducationalResource->title}}
            </a></h6>
          </td>
          <td class="cell-css">
            @php
              switch($EducationalResource->age_group){
                case 1: echo "Child<br>[0-12]";
                break;
                case 2: echo "Adolescent<br>[13-18]";
                break;
                case 3: echo "Adults<br>[19-64]";
                break;
                case 4: echo "Elderly<br>[65+]";
                break;
              }
            @endphp
          </td>
          <td class="cell-css">
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

          <td class="cell-css" style="white-space: nowrap;">
            {{$EducationalResource->date_of_approval}}
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
    <div class="hpadding20">
  		<ul class="pagination right paddingbtm20">
  		  {{$findEducationalResources->links()}}
  		</ul>
  	</div>
@else
  <h5>No educational resouces were found</h5>
@endif
