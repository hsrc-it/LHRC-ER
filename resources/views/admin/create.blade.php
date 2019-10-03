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
                                            <div class="flash-message">
                                              @if (Session::has('success'))
                                              	<div class="alert alert-success"  role="alert">
                                              		<strong>Success:</strong> {{ Session::get('success') }}
                                              	</div>
                                              @endif
                                              @if (Session::has('error'))
                                              	<div class="alert alert-danger"  role="alert">
                                              		<strong>Error:</strong> {{ Session::get('error') }}
                                              	</div>
                                              @endif
                                              @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                           </div>
                                          </br>
                                          {{ html()->form('post', '/admin/store/educational-resource')->attribute('enctype', "multipart/form-data")->open() }}                                          
                                            <!-- Title -->
                                            <div class='form-group row'>
                            									{{ html()->label('Title *')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                            									<div class="col-sm-9">
                                                {{ html()->text('title', null)->class('form-control')->required() }}
                            									</div>
                            								</div>
                                            <!-- Topics -->
                                            <div class="form-group row">
                                              {{ html()->label('Topics *')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                            									<div class="col-sm-9">
                                                <div class="row-sm-9">
                                                  <b class="text-success">Press ctrl while selecting more than one</b>
                                                </div>
                                                <div class="row-sm-9">
                                                  {{ html()->multiselect('topics', App\Topic::getTopics())->attribute('size', 11)->required()->placeholder('Select topic')->class(['form-control', 'no-scrollbar-css']) }}
                                                </div>
                            									</div>
                                            </div>
                                            <!-- Gender -->
                            								<div class="form-group row">
                                              {{ html()->label('Gender *')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                            									<div class="col-sm-9">
                                                  {{ html()->select('gender', [1 => 'male', 2 =>'female', 3 => 'both'])->required()->placeholder('Select gender')->class('form-control') }}
                            									</div>
                            								</div>
                                            <!-- Age Grup -->
                                            <div class="form-group row">
                                              {{ html()->label('Age Group *')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                                              <div class="col-sm-9">
                                                {{ html()->select('age_group', [1 => 'child [0-12]', 2 => 'Adolescent [13-18]', 3 => 'Adults [19-64]', 4 => 'Elderly [65+]'])->required()->placeholder('Select age group')->class('form-control') }}
                            									</div>
                            								</div>
                                            <!-- Language -->
                                            <div class="form-group row">
                                              {{ html()->label('Language *')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                                              <div class="col-sm-9">
                                                {{ html()->select('language', [1 => 'Arabic', 2 => 'English'])->required()->placeholder('Select language')->class('form-control') }}
                                              </div>
                                            </div>
                                            <!-- Date of aproval -->
                                            <div class="form-group row">
                                              {{ html()->label('Date of approval *')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                                              <div class="col-sm-9">
                                                {{ html()->date('date_of_approval', null)->required()->class('form-control') }}
                                              </div>
                                            </div>
                                            <!-- keywords -->
                            								<div class="form-group row">
                                              {{ html()->label('Keywords')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                            									<div class="col-sm-9">
                                                <div class="row-sm-9">
                                                  <b class="text-danger">saperate keywords with comma </b>
                                                </div>
                                                <div class="row-sm-9">
                                                  {{ html()->text('keywords', null)->class('form-control') }}
                                                </div>
                            									</div>
                                            </div>

                                            <!-- URL -->
                                            <div class="form-group row">
                                              {{ html()->label('URL')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                                              <div class="col-sm-9">
                                                <div class="row-sm-9">
                                                  <b class="text-danger">This field is mandatory for Videos</b>
                                                </div>
                                                <div class="row-sm-9">
                                                  <input class="form-control" type="text" name="url" id="url" onchange="changeRequiredUpload()" type="url">
                                                </div>
                            									</div>
                            								</div>
                                            <!-- Upload -->
                                            <div class="form-group row">
                                              {{ html()->label('Upload')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                                              <div class="col-sm-9">
                                                <div class="row-sm-9">
                                                  <b class="text-success">Not mandatory for videos resource (Maximum Upload size is 3MB)</b>
                                                </div>
                                                <div class="row-sm-9">
                                                  <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file" id="customFile" onChange='getExtension(event)' required>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>

                                                  </div>
                                                </div>

                                              </div>
                                            </div>
                                            <!-- Format -->
                                            <div class="form-group row">
                                              {{ html()->label('Format')->class(['col-sm-3', 'col-form-label', 'font-weight-bold']) }}
                                              <div class="col-sm-9">
                                                {{ html()->select('format', [1 => 'Word', 2 => 'PowerPoint', 3 => 'PDF', 4 => 'Video', 5 => 'Other'])->required()->placeholder('Select format')->class('form-control') }}
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <div class="card">
                                                <div class="card-header font-weight-bold">Author <b class="text-danger">(at least add one author)</b></div>
                                                <div class="card-body ">
                                                  <table class="table" id='authorsTable'>
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Author name</th>
                                                        <th scope="col">Author email</th>
                                                        <th scope="col">Author phone</th>
                                                        <th scope="col"></th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                              <span class="help-block">
                                                                  <strong></strong>
                                                              </span>
                                                            {{ html()->text('name', null)->attribute('id', 'author-name-1')->required()->class('form-control') }}
                                                        </td>
                                                        <td>
                                                          <span class="help-block">
                                                              <strong></strong>
                                                          </span>
                                                            {{ html()->email('email', null)->attribute('id', 'author-email-1')->required()->class('form-control') }}
                                                        </td>
                                                        <td>
                                                          <span class="help-block">
                                                              <strong></strong>
                                                          </span>
                                                            {{ html()->text('phone', null)->attributes(['id' => 'author-phone-1', 'pattern'=>'[0-9]*'])->required()->class('form-control') }}
                                                        </td>
                                                        <td>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <a  id="addAuthorField" class='btn btn-primary' style='color:white;'>Add author</a>
                                                </div>
                                              </div>
                                            </div>
                                            {{ html()->text('authors', null)->attributes(['hidden' => 'true'])->required() }}
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
