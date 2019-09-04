@if(!empty($findEducationalResources))
    <table class="table">
      <thead>
        <tr class="table-secondary">
          <th colspan="5">
            {{ $findEducationalResources->total() }} Educational resource matched your search
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
        @foreach($findEducationalResources as $EducationalResource)
        <tr>
          <td>
            {{ (($findEducationalResources->currentPage() - 1 ) * $findEducationalResources->perPage() ) + $loop->iteration }}
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
            @php
              switch($EducationalResource->age_group){
                case 1: echo "child [0-12]";
                break;
                case 2: echo "Adolescent [13-18]";
                break;
                case 3: echo "Adults [19-64]";
                break;
                case 4: echo "Elderly [65+]";
                break;
              }
            @endphp
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
    <div class="hpadding20">
  		<ul class="pagination right paddingbtm20">
  		  {{$findEducationalResources->links()}}
  		</ul>
  	</div>
@else
  No educational resouces were found
@endif
