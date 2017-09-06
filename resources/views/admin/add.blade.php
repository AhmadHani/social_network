@extends("admin.app")
@section("title")
    Add {{$type}}
@stop
@section("content")

      <section id="main-content">
          <section class="wrapper">
<div class="row">
			
				 <div class="col-md-8 col-md-offset-2 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Edit {{$type}}</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">
                    
                      <div class="form quick-post">
                                      <!-- Edit profile form (not working)-->
                              
                                          <!-- Title -->
                                          @if($type == "post")
                                                  <form class="form-horizontal" method="post" action="{{route('store',['type'=>'post'])}}">
                                          {{csrf_field()}}
                                          <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Body</label>
                                            <div class="col-lg-10"> 
                                                                                   <textarea name="body" id="" cols="5" class="form-control" rows="5"></textarea>
                                                                                     
                                            
                                            
                                            
                                            </div>
                                          </div>   
                                          <div class="form-group">
                                             <!-- Buttons -->
											 <div class="col-lg-offset-2 col-lg-9">
												<button type="submit" class="btn btn-primary">Update</button>
												
											 </div>
                                          </div>
                                      
                                          </form>
                                            
                                          @else
                                                  <form class="form-horizontal" method="post" action="{{route('store',['type'=>'user'])}}">
                             {{csrf_field()}}
                              <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">Name<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="name" value="{{old('name')}}"  name="name" type="text">
                                         @if($errors->has('name'))

                                        <strong class="alert">{{$errors->first('name')}}</strong>

                                         @endif
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">Location <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="location"  value="{{old('location')}}" name="location" type="text">
                                         @if($errors->has('location'))

                                        <strong class="alert">{{$errors->first('location')}}</strong>

                                         @endif

                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Username <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="username" name="username"  value="{{old('username')}}" type="text">
                                            @if($errors->has('username'))

                                        <strong class="alert">{{$errors->first('username')}}</strong>

                                         @endif
                                          </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control "  value="{{old('email')}}" id="email" name="email" type="email">
                                          @if($errors->has('email'))

                                        <strong class="alert">{{$errors->first('email')}}</strong>

                                         @endif
                                          </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="about" class="control-label col-lg-2">About <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                            <textarea name="about" id="" cols="5" rows="5" class="form-control">{{old('about')}}</textarea>
                                          @if($errors->has('about'))

                                        <strong class="alert">{{$errors->first('about')}}</strong>

                                         @endif
                                          </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Gender <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <select class="form-control" name="gender">
                                                <option  value="0">Male</option>
                                                <option  value="1">Female</option>
                                              </select>
                                         @if($errors->has('gender'))

                                        <strong class="alert">{{$errors->first('gender')}}</strong>

                                         @endif
                                          </div>
                                      </div>
                                      
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Date of birth <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                          <input type="date" class="form-control" name="date_birth" value="{{old('date_birth')}}" >
                                          @if($errors->has('date_birth'))

                                        <strong class="alert">{{$errors->first('date_birth')}}</strong>

                                         @endif
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="password" class="control-label col-lg-2">Password <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="password" name="password"  type="password">
                                          @if($errors->has('password'))

                                        <strong class="alert">{{$errors->first('password')}}</strong>

                                         @endif
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="confirm_password" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="confirm_password" name="password_confirmation" type="password">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                             <!-- Buttons -->
											 <div class="col-lg-offset-2 col-lg-9">
												<button type="submit" class="btn btn-primary">Update</button>
												
											 </div>
                                          </div>
                                      
                                      </form>
                                          @endif

                                          <!-- Buttons -->
                                          
                                    </div>
                  

                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>
                        
          </div>
</section>
</section>
@stop