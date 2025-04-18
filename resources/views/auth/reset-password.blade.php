@extends('frontend.layouts.master')
@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay" style="height: 100px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>change password</h4>
                        <ul>
                            <li><a href="#">login</a></li>
                            <li><a href="#">change password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CHANGE PASSWORD START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-10 col-lg-7 m-auto">
                    <form  method="POST" action="{{ route('password.store') }}">
                        @csrf
                       
                        <div class="wsus__change_password">
                            <h4>Reset password</h4>
                            <div class="wsus__single_pass">
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <label>Email</label>
                                <input id='email' name="email"  type="email" value="{{ old('email', $request->email) }}" required autocomplete="email" autofocus placeholder="Email">
                            </div>
                            <div class="wsus__single_pass">
                                <label>new password</label>
                                <input id="password" type="password" name="password"  placeholder="New Password">
                            </div>
                            <div class="wsus__single_pass">
                                <label>confirm password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation">
                            </div>
                            <button class="common_btn" type="submit">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection