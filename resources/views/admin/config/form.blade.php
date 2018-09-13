@section('admin.config')
   <div style="background: #fff;padding:20px">

    @if(session('success'))
        <div class="alert alert-success alert-message">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check fa-lg"></i> {{session('success')}}
        </div>
    @endif

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Footer Config</a></li>
        <li><a data-toggle="tab" href="#menu1">Footer social networks Link</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Footer Config</h3>
            <form method="post" action="configs" >
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="form-group">
                    <label>Phone1</label>
                    <input type="text" class="form-control" name="phone1"  value="{{($config)?$config->phone1:''}}">
                </div>
                <div class="form-group">
                    <label>Phone2</label>
                    <input type="text" class="form-control" name="phone2"  value="{{($config)?$config->phone2:''}}">
                </div>

                <div class="form-group">
                    <label>Email1</label>
                    <input type="email" class="form-control" name="email1" value="{{($config)?$config->email1:''}}">
                </div>

                <div class="form-group">
                    <label>Email2</label>
                    <input type="email" class="form-control" name="email2" value="{{($config)?$config->email2:''}}">
                </div>


                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address1" value="{{($config)?$config->address1:''}}">
                </div>

                <div class="form-group">
                    <label>Contact us link</label>
                    <input type="url" class="form-control" name="contact_us_link" value="{{($config)?$config->contact_us_link:''}}">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>Footer social networks link</h3>
            <form method="post" action="configs" >
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <div class="form-group">
                    <label>Github</label>
                    <input type="url" class="form-control" name="social_link_github"  value="{{($config)?$config->social_link_github:''}}">
                </div>
                <div class="form-group">
                    <label>Behance</label>
                    <input type="url" class="form-control" name="social_link_behance"  value="{{($config)?$config->social_link_behance:''}}">
                </div>

                <div class="form-group">
                    <label>Dribbble</label>
                    <input type="url" class="form-control" name="social_link_dribbble" value="{{($config)?$config->social_link_dribbble:''}}">
                </div>

                <div class="form-group">
                    <label>Facebook</label>
                    <input type="url" class="form-control" name="social_link_facebook" value="{{($config)?$config->social_link_facebook:''}}">
                </div>

                <div class="form-group">
                    <label>Twitter</label>
                    <input type="url" class="form-control" name="social_link_twitter" value="{{($config)?$config->social_link_twitter:''}}">
                </div>

                <div class="form-group">
                    <label>Linkedin</label>
                    <input type="url" class="form-control" name="social_link_linkedin" value="{{($config)?$config->social_link_linkedin:''}}">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>
    </div>

   </div>
@show
