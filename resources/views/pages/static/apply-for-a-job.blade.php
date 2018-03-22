@extends('layouts.default_static')

@section('title'){{ strip_tags($page->title) }}@stop
@section('description'){{ strip_tags($page->description) }}@stop
@section('keywords'){{ strip_tags($page->keywords) }}@stop

@section('content')

    <div class="container">
        <form action="{{route('front.send.post')}}" id="upload" novalidate class="form-proposal js_validate"
              enctype="multipart/form-data" method="POST">
            {!! csrf_field() !!}
            @if (session('status'))
                <div class="alert alert-success">
                    <p class="title " style="color: #ff3853">{{ session('status') }}!!!</p>
                </div>
            @else
                <p class="title">Let's get started!</p>
            @endif
         
            <p class="subtitle">Apply for a job.</p>
            <div class="row">
                <div class="col">
                    <div class="field-wrapper">
                        <label>First Name</label>
                        <div class="input-wrap required">
                            <input  id="register-first-name"  class="js-from-field text" type="text" name="firstName" required>
                            <span class="extra-label">required</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="field-wrapper">
                        <label>Last Name</label>
                        <div class="input-wrap">
                            <input   id="register-last-name" class="js-from-field text" name="lastName" type="text" required>
                            <span class="extra-label">required</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="field-wrapper">
                        <label>Email Address</label>
                        <div class="input-wrap required">
                            <input id="register-email" class="js-from-field text" name="email" type="email" required>
                            <span class="extra-label">required</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="field-wrapper">
                        <label>Phone Number</label>
                        <div class="input-wrap">
                            <input class="js-from-field text" name="phone" type="tel">
                        </div>
                    </div>
                </div>
            </div>


            <!--<div class="row">
                <div class="col">
                    <div class="field-wrapper">
                        <label>Company</label>
                        <div class="input-wrap required">
                            <input class="js-from-field text" name="company" type="text">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="field-wrapper">
                        <label>Website URL</label>
                        <div class="input-wrap">
                            <input class="js-from-field text" name="url" type="text">
                        </div>
                    </div>
                </div>
            </div>-->

            <!--<div class="row">

                <div class="col">
                    <div class="field-wrapper">
                        <select id="selectPosition" name="yourPosition" class="select-bottom-border" >
                            <option selected  value="">What is Your Role</option>
                            <option value="C-Level/SVP">C-Level/SVP</option>
                            <option value="Manager">Manager</option>
                            <option value="VP/Director">VP/Director</option>
                            <option value="other">Other (please specify)</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="field-wrapper">
                        <select id="selectResource"  name="hearAboutUs" class="select-bottom-border">
                            <option selected  value="">How Did You Hear About Us</option>
                            <option value="Google">Google</option>
                            <option value="Bing">Bing</option>
                            <option value="LinkedIn">LinkedIn</option>
                            <option value="BuiltIn Chicago">BuiltIn Chicago</option>
                            <option value="Clutch.co">Clutch.co</option>
                            <option value="Event">Event</option>
                            <option value="Event">Referral</option>
                            <option value="other">Other (please specify)</option>
                        </select>
                    </div>
                </div>
            </div>-->

            <!-- <div class="row js-field-role">
                 <div class="col fw">
                     <div class="field-wrapper">
                         <label>Please Specify Your Role</label>
                         <input class="js-from-field text" type="tel">
                     </div>
                 </div>
             </div>
             <div class="row js-field-resource">
                 <div class="col fw">
                     <div class="field-wrapper">
                         <label>Please Specify How Did You Hear About Us</label>
                         <input class="js-from-field text" type="tel">
                     </div>
                 </div>
             </div>-->



            <div class="row">
                <div class="col fw">
                    <div class="field-wrapper">
                        <label>Type Your Message Here:</label>
                        <textarea class="js-from-field" name="messages"></textarea>
                    </div>
                </div>
            </div>
            <div id="drop">
                <svg class="icon icon-upload">
                    <use xlink:href="#icon-upload"></use>
                </svg>
                Drag & drop files here to upload attachments or <a href='#'>browse files</a>

                <input id="fileupload" type="file" name="files[]" multiple/>

            </div>

            <ul class="uploaded-files">
                <!-- The file uploads will be shown here -->
            </ul>

            <button class="btn btn-blue" type="submit">Send inquiry</button>
            <p>We take your privacy seriously. View our <a href="privacy">Privacy Policy</a>.</p>


        </form>
    </div>

@stop
