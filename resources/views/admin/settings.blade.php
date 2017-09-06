@extends("admin.app")
@section("title")
    Settings
@stop
@section("content")

      <section id="main-content">
          <section class="wrapper">
           <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-cog"></i> Settings</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-cog"></i>Settings</li>
					</ol>
				</div>
			</div>
<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            Edit setting of website
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="{{route('settings')}}" novalidate="novalidate">
                                      {{csrf_field()}}
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Name</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" name="name"  value="{{$settings->name}}" id="cname" minlength="5" type="text" required="">
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">E-Mail </label>
                                          <div class="col-lg-10">
                                              <input class="form-control " value="{{$settings->email}}" id="cemail" type="email" name="email" required="">
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="description" class="control-label col-lg-2">Description</label>
                                          <div class="col-lg-10">
                                              <textarea class="form-control "  id="description" name="description" required="">{{$settings->description}}</textarea>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="keys" class="control-label col-lg-2">Keys</label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="keys" value="{{$settings->keys}}" name="keys" minlength="5" type="text" required="">
                                          </div>
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Status</label>
                                          <div class="col-lg-10">
                                            <select class="form-control" name="status" value="{{$settings->status}}">
                                                <option {{$settings->status == 0 ? "selected = selected" : ''}} value="0">Open</option>
                                                <option {{$settings->status == 1 ? "selected = selected" : ''}}  value="1">Close</option>
                                            </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Save</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>              <!-- page end-->
              </section>
              <!-- start -->
              

              </section>

@stop