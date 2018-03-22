@section('email.form_message')
    <div style="background: #fff;padding:20px">
        @if(session('success'))
            <div class="alert alert-success alert-message">
                <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">?</span></button>
                <i class="fa fa-check fa-lg"></i> {{session('success')}}
            </div>
        @endif
        <form method="post" action="email_client_massage" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="form-group form-element-wysiwyg ">
                <label>Email client massage</label>
                <textarea  id="ckview" name="massage_email"  class="form-control"  cols="30" rows="10">{{($massage)?$massage->massage_email:''}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@show
























