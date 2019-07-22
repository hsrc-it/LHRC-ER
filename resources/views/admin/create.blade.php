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
                                          {{ html()->form('post', '/admin/store/educational-resource')->open() }}
                                          <!-- token -->
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <!-- Title -->
                                            <div class='form-group row'>
                            									{{ html()->label('Title *')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                            									<div class='col-sm-1'>
                            										@if ($errors->has('url'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('title') }}</strong>
                                                      </span>
                                              	@endif
                            									</div>
                            									<div class="col-sm-8">
                                                {{ html()->text('title', null)->class('form-control')->required() }}
                            									</div>
                            								</div>
                                            <!-- Topics -->
                                            <div class="form-group row">
                                              {{ html()->label('Topics *')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                            									<div class='col-sm-1'>
                            									@if ($errors->has('institutes'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('institutes') }}</strong>
                                                    </span>
                                            	@endif
                                            	</div>
                            									<div class="col-sm-8">
                                                <div class="row-sm-8">
                                                  <b class="text-success">Press ctrl while selecting more than one</b>
                                                </div>
                                                <div class="row-sm-8">
                                                  {{ html()->multiselect('topics', App\Topic::getTopics())->attribute('size', 11)->required()->placeholder('Select topic')->class(['form-control', 'no-scrollbar-css']) }}
                                                </div>

                            									</div>
                                            </div>
                                            <!-- Gender -->
                            								<div class="form-group row">
                                              {{ html()->label('Gender *')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                            									<div class='col-sm-1'>
                            										@if ($errors->has('gender'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('gender') }}</strong>
                                                      </span>
                                              	@endif
                            									</div>
                            									<div class="col-sm-8">
                                                  {{ html()->select('gender', [1 => 'male', 2 =>'female', 3 => 'both'])->required()->placeholder('Select gender')->class('form-control') }}
                            									</div>
                            								</div>
                                            <!-- Age Grup -->
                                            <div class="form-group row">
                                              {{ html()->label('Age Group *')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                                              <div class='col-sm-1'>
                                                @if ($errors->has('age_group'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('age_group') }}</strong>
                                                      </span>
                                                @endif
                                              </div>
                                              <div class="col-sm-8">
                                                {{ html()->select('age_group', [1 => 'child [0-12]', 2 => 'Adolescent [13-18]', 3 => 'Adults [19-64]', 4 => 'Elderly [65+]'])->required()->placeholder('Select age group')->class('form-control') }}
                            									</div>
                            								</div>
                                            <!-- Language -->
                                            <div class="form-group row">
                                              {{ html()->label('Language')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                                              <div class='col-sm-1'>
                                              @if ($errors->has('language'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('language') }}</strong>
                                                    </span>
                                              @endif
                                              </div>
                                              <div class="col-sm-8">
                                                {{ html()->select('language', [1 => 'Arabic', 2 => 'English'])->required()->placeholder('Select language')->class('form-control') }}
                                              </div>
                                            </div>
                                            <!-- Date of aproval -->
                                            <div class="form-group row">
                                              {{ html()->label('Date of aproval *')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                                              <div class='col-sm-1'>
                                              @if ($errors->has('date_of_aproval'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('date_of_aproval') }}</strong>
                                                    </span>
                                              @endif
                                              </div>
                                              <div class="col-sm-8">
                                                {{ html()->date('date_of_aproval', null)->required()->class('form-control') }}
                                              </div>
                                            </div>
                                            <!-- keywords -->
                            								<div class="form-group row">
                                              {{ html()->label('Keywords')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                            									<div class='col-sm-1'>
                            									@if ($errors->has('keywords'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('keywords') }}</strong>
                                                    </span>
                                            	@endif
                                            	</div>
                            									<div class="col-sm-8">
                                                <div class="row-sm-8">
                                                  <b class="text-danger">saperate keywords with comma </b>
                                                </div>
                                                <div class="row-sm-8">
                                                  {{ html()->text('keywords', null)->class('form-control') }}
                                                </div>
                            									</div>
                                            </div>

                                            <!-- URL -->
                                            <div class="form-group row">
                                              {{ html()->label('URL')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                                              <div class='col-sm-1'>
                                              @if ($errors->has('url'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('url') }}</strong>
                                                    </span>
                                              @endif
                                              </div>
                                              <div class="col-sm-8">
                                                <div class="row-sm-8">
                                                  <b class="text-danger">This field is mandatory for Videos</b>
                                                </div>
                                                <div class="row-sm-8">
                                                  <input class="form-control" type="text" name="url" id="url" onchange="changeRequiredUpload()" pattern="https?://.+">
                                                </div>
                            									</div>
                            								</div>
                                            <!-- Upload -->
                                            <div class="form-group row">
                                              {{ html()->label('Upload')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                                              <div class='col-sm-1'>
                                              @if ($errors->has('upload'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('upload') }}</strong>
                                                    </span>
                                              @endif
                                              </div>
                                              <div class="col-sm-8">
                                                <div class="row-sm-8">
                                                  <b class="text-danger">Upload is not mandatory for videos resource</b>
                                                </div>
                                                <div class="row-sm-8">
                                                  <div class="custom-file">
                                                    <input id="upload" type="file" class="custom-file-input" id="customFile" onChange='getExtension(event)' required>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                            <!-- Format -->
                                            <div class="form-group row">
                                              {{ html()->label('Format')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                                              <div class='col-sm-1'>
                                              @if ($errors->has('format'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('format') }}</strong>
                                                    </span>
                                              @endif
                                              </div>
                                              <div class="col-sm-8">
                                                {{ html()->select('format', [1 => 'Word', 2 => 'PowerPoint', 3 => 'PDF', 4 => 'Video', 5 => 'Other'])->required()->placeholder('Select format')->class('form-control') }}
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <div class="card">
                                                <div class="card-header font-weight-bold">Sources <b class="text-danger">(at least add one resource)</b></div>
                                                <div class="card-body ">
                                                  <table class="table" id='sourcesTable'>
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Source name</th>
                                                        <th scope="col">Source email</th>
                                                        <th scope="col">Source phone</th>
                                                        <th scope="col"></th>
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
                                                            {{ html()->text('name', null)->attribute('id', 'source-name-1')->required()->class('form-control') }}
                                                          @endif
                                                        </td>
                                                        <td>
                                                          @if ($errors->has('source_email'))
                                                              <span class="help-block">
                                                                  <strong>{{ $errors->first('source_email') }}</strong>
                                                              </span>
                                                          @else
                                                            {{ html()->email('email', null)->attribute('id', 'source-email-1')->required()->class('form-control') }}
                                                          @endif
                                                        </td>
                                                        <td>
                                                          @if ($errors->has('source_phone'))
                                                              <span class="help-block">
                                                                  <strong>{{ $errors->first('source_phone') }}</strong>
                                                              </span>
                                                          @else
                                                            {{ html()->text('phone', null)->attributes(['id' => 'source-phone-1', 'pattern'=>'[0-9]*'])->required()->class('form-control') }}
                                                          @endif
                                                        </td>
                                                        <td>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <a  id="addSourceField" class='btn btn-primary' style='color:white;'>Add Source</a>
                                                </div>
                                              </div>
                                            </div>

                                            {{ html()->submit('Add Resource')->class('btn btn-success')}}
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
