@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add educational resource</div>

                <div class="card-body">
                  <div class="container">
                            <div class="row">
                              <div class="col-md-11 col-md-offset-1">
                                <div class="panel panel-default">
                                    <div class="panel-heading status">
                                        <div class="panel-body">
                                          <div class="flex-center position-ref full-height">
                                          </br>
                                          {{ html()->form('PUT', '/admin/create/educational-resource')->open() }}
                                            <!-- Title -->
                                            <div class='form-group row'>
                            									{{ html()->label('Title')->class(['col-sm-2', 'col-form-label', 'font-weight-bold']) }}
                            									<div class='col-sm-1'>
                            										@if ($errors->has('url'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                              	@endif
                            									</div>
                            									<div class="col-sm-9">
                                                {{ html()->text('title', null)->class('form-control') }}
                            									</div>
                            								</div>
                                            <!-- Gender -->
                            								<div class="form-group row">
                                              {{ html()->label('Gender')->class(['col-sm-2', 'col-form-label', 'font-weight-bold']) }}
                            									<div class='col-sm-1'>
                            										@if ($errors->has('gender'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('gender') }}</strong>
                                                      </span>
                                              	@endif
                            									</div>
                            									<div class="col-sm-9">
                                                  {{ html()->select('gender', [1 => 'male', 2 =>'female', 3 => 'both'])->class('form-control') }}
                            									</div>
                            								</div>
                                            <!-- Age Grup -->
                                            <div class="form-group row">
                                              {{ html()->label('Age Group')->class(['col-sm-2', 'col-form-label', 'font-weight-bold']) }}
                                              <div class='col-sm-1'>
                                                @if ($errors->has('age_group'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('age_group') }}</strong>
                                                      </span>
                                                @endif
                                              </div>
                                              <div class="col-sm-9">
                                                {{ html()->select('age_group', [1 => 'child [0-12]', 2 => 'Adolescent [13-18]', 3 => 'Adults [19-64]', 4 => 'Elderly [65+]'])->class('form-control') }}
                            									</div>
                            								</div>
                                            <!-- Language -->
                                            <div class="form-group row">
                                              {{ html()->label('Language')->class(['col-sm-2', 'col-form-label', 'font-weight-bold']) }}
                                              <div class='col-sm-1'>
                                              @if ($errors->has('language'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('language') }}</strong>
                                                    </span>
                                              @endif
                                              </div>
                                              <div class="col-sm-9">
                                                {{ html()->select('language', [1 => 'Arabic', 2 => 'English'])->class('form-control') }}
                                              </div>
                                            </div>
                                            <!-- RL -->
                                            <div class="form-group row">
                                              {{ html()->label('URL')->class(['col-sm-2', 'col-form-label', 'font-weight-bold']) }}
                                              <div class='col-sm-1'>
                                              @if ($errors->has('url'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('url') }}</strong>
                                                    </span>
                                              @endif
                                              </div>
                                              <div class="col-sm-9">
                                                {{ html()->text('url', null)->class('form-control') }}
                            									</div>
                            								</div>
                                            <!-- Format -->
                                            <div class="form-group row">
                                              {{ html()->label('Format')->class(['col-sm-2', 'col-form-label', 'font-weight-bold']) }}
                                              <div class='col-sm-1'>
                                              @if ($errors->has('format'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('format') }}</strong>
                                                    </span>
                                              @endif
                                              </div>
                                              <div class="col-sm-9">
                                                {{ html()->select('format', [1 => 'Word', 2 => 'PowerPoint', 3 => 'PDF', 4 => 'Video', 5 => 'Other'])->class('form-control') }}
                                              </div>
                                            </div>
                                            <!-- keywords -->
                            								<div class="form-group row">
                                              {{ html()->label('Keywords')->class(['col-sm-2', 'col-form-label', 'font-weight-bold']) }}
                            									<div class='col-sm-1'>
                            									@if ($errors->has('keywords'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('keywords') }}</strong>
                                                    </span>
                                            	@endif
                                            	</div>
                            									<div class="col-sm-9">
                                                {{ html()->text('keywords', null)->class('form-control') }}
                            									</div>
                                            </div>
                                            <div class="form-group row">
                                              {{ html()->label('Topics')->class(['col-sm-2', 'col-form-label', 'font-weight-bold']) }}
                            									<div class='col-sm-1'>
                            									@if ($errors->has('institutes'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('institutes') }}</strong>
                                                    </span>
                                            	@endif
                                            	</div>
                            									<div class="col-sm-9">
                                                {{ html()->text('title', null)->placeholder('You may select more than one topic')->class('form-control') }}
                            									</div>
                                            </div>
                                            <div class="form-group row">
                                              {{ html()->label('Date of aproval')->class(['col-sm-2', 'col-form-label', 'font-weight-bold']) }}
                            									<div class='col-sm-1'>
                            									@if ($errors->has('date_of_aproval'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('date_of_aproval') }}</strong>
                                                    </span>
                                            	@endif
                                            	</div>
                            									<div class="col-sm-9">
                                                {{ html()->date('date_of_aproval', null)->class('form-control') }}
                            									</div>
                                            </div>
                                            <div class='row'>
                                            <div class="card col-sm-12">
                                              <div class="card-header font-weight-bold">Sources</div>
                                              <div class="card-body ">
                                                <table class="table" id='sourcesTable'>
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">#</th>
                                                      <th scope="col">Source name</th>
                                                      <th scope="col">Source email</th>
                                                      <th scope="col">Source phone</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <th scope="row">1</th>
                                                      <td>
                                                        @if ($errors->has('source_name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('source_name') }}</strong>
                                                            </span>
                                                        @else
                                                          {{ html()->text('source_name', null)->class('form-control') }}
                                                        @endif
                                                      </td>
                                                      <td>
                                                        @if ($errors->has('source_email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('source_email') }}</strong>
                                                            </span>
                                                        @else
                                                          {{ html()->text('source_email', null)->class('form-control') }}
                                                        @endif
                                                      </td>
                                                      <td>
                                                        @if ($errors->has('source_phone'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('source_phone') }}</strong>
                                                            </span>
                                                        @else
                                                          {{ html()->text('source_phone', null)->class('form-control') }}
                                                        @endif
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </div>
                                              <a  id="addSourceField" class='btn btn-primary'>Add Source</a>
                                            </div>

                                            {{ html()->form()->close() }}
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
  $(document).on('click', '#addSourceField', function(event)
  {
    event.preventDefault();
    //get table were you will add row
    var table = document.getElementById("sourcesTable");
    //insert row after the last row
    var row = table.insertRow(table.rows.length);
    // Insert cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = "new source name fields";
    cell2.innerHTML = "new source email fields";
    cell3.innerHTML = "new source phone fields";


  });

</script>
