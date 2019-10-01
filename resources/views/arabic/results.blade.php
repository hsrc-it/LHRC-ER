@if(!empty($EducationalResources))
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr >
          <th class="cell-css">
            #
          </th>
          <th class="title-cell-css">
            العنوان
          </th>
          <th class="cell-css">
            الفئة العمرية
          </th>
          <th class="cell-css">
            الجنس
          </th>
          <th class="cell-css">
            تاريخ التطوير
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
                case 1: echo "أطفال<br>[0-12]";
                break;
                case 2: echo "مراهقين<br>[13-18]";
                break;
                case 3: echo "بالغين<br>[19-64]";
                break;
                case 4: echo "كبار السن<br>[65+]";
                break;
              }
            @endphp
          </td>
          <td class="cell-css">
            @php
              switch($EducationalResource->gender){
                case 1: echo "ذكر";
                break;
                case 2: echo "أنثى";
                break;
                case 3: echo "كلاهما";
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
        {{$EducationalResources->links()}}
      </ul>
    </div>
@elseif(!empty($findEducationalResources))
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr class="table-secondary">
          <th colspan="5">
            <h5>{{ $findEducationalResources->total() }} مصدر تعليمي يوافق البحث</h5>
          </th>
        </tr>
        <tr >
          <th class="cell-css">
            #
          </th>
          <th class="title-cell-css">
            العنوان
          </th>
          <th class="cell-css">
            الفئة العمرية
          </th>
          <th class="cell-css">
            الجنس
          </th>
          <th class="cell-css">
            تاريخ التطوير
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
                case 1: echo "أطفال<br>[0-12]";
                break;
                case 2: echo "مراهقين<br>[13-18]";
                break;
                case 3: echo "بالغين<br>[19-64]";
                break;
                case 4: echo "كبار السن<br>[65+]";
                break;
              }
            @endphp
          </td>
          <td class="cell-css">
            @php
              switch($EducationalResource->gender){
                case 1: echo "ذكر";
                break;
                case 2: echo "أنثى";
                break;
                case 3: echo "كلاهما";
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
  <h5>لا يوجد مصادر تعليمية توافق البحث</h5>
@endif
