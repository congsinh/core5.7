<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>Metronic | Dashboard</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->


    <link href="{{ asset('admin/css/vendors.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('admin/css/app.css') }}" rel="stylesheet" type="text/css"/>


</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile
            m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed
             m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login  m-login--2 m-login-2--skin-1
            @if(isset($token)) m-login--reset-password @else m-login--signin @endif"
        id="m_login" style="background-image: url({{ asset('admin/media/img/bg/bg-1.jpg') }});">
        <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
            <div class="m-login__container">
                <div class="m-login__logo">
                    <a href="#">
                        <img src="{{ asset('admin/media/img/logo/logo-1.png') }}">
                    </a>
                </div>




                {{--form login--}}
                <div class="m-login__signin" >
                    <div class="m-login__head">
                        <h3 class="m-login__title">Sign In To Admin</h3>
                    </div>
                    <form class="m-login__form m-form" action="{{ route('postLogin') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Email" name="email"
                                   autocomplete="off">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password"
                                   placeholder="Password" name="password">
                        </div>
                        <div class="row m-login__form-sub">
                            <div class="col m--align-left m-login__form-left">
                                <label class="m-checkbox  m-checkbox--light">
                                    <input type="checkbox" name="remember"> Remember me
                                    <span></span>
                                </label>
                            </div>
                            <div class="col m--align-right m-login__form-right">
                                <a href="javascript:;" id="m_login_forget_password" class="m-link">Forget Password ?</a>
                            </div>
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_signin_submit" type="submit"
                                    class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>

                {{--form forget password--}}
                <div class="m-login__forget-password">
                    <div class="m-login__head">
                        <h3 class="m-login__title">Forgotten Password ?</h3>
                        <div class="m-login__desc">Enter your email to reset your password:</div>
                    </div>
                    <form class="m-login__form m-form" action="{{ route('password.email') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Email" name="email"
                                   id="m_email" autocomplete="off">
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_forget_password_submit" type="submit"
                                    class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                                Request
                            </button>&nbsp;&nbsp;
                            <button id="m_login_forget_password_cancel"
                                    class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel
                            </button>
                        </div>
                    </form>
                </div>



                {{--form reset password--}}
                <div class="m-login__reset-password" >
                    <div class="m-login__head">
                        <h3 class="m-login__title">Reset password</h3>
                        <div class="m-login__desc">Enter your details to reset password:</div>
                    </div>
                    <form class="m-login__form m-form" method="POST" action="{{ route('password.update') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ (isset($token)) ? $token : ''}}">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Email" name="email"
                                   autocomplete="off" />
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="password" placeholder="Password" name="password" id="password" />
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" id="password_confirmation"
                                   placeholder="Confirm Password" name="password_confirmation" />
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_reset_password_submit" type="submit"
                                    class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                                Request
                            </button>&nbsp;&nbsp;
                            <button id="m_login_reset_password_cancel"
                                    class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel
                            </button>
                        </div>
                    </form>
                </div>
                {{--<div class="m-login__signup">--}}
                {{--<div class="m-login__head">--}}
                {{--<h3 class="m-login__title">Sign Up</h3>--}}
                {{--<div class="m-login__desc">Enter your details to create your account:</div>--}}
                {{--</div>--}}
                {{--<form class="m-login__form m-form" action="">--}}
                {{--<div class="form-group m-form__group">--}}
                {{--<input class="form-control m-input" type="text" placeholder="Fullname" name="fullname">--}}
                {{--</div>--}}
                {{--<div class="form-group m-form__group">--}}
                {{--<input class="form-control m-input" type="text" placeholder="Email" name="email"--}}
                {{--autocomplete="off">--}}
                {{--</div>--}}
                {{--<div class="form-group m-form__group">--}}
                {{--<input class="form-control m-input" type="password" placeholder="Password" name="password">--}}
                {{--</div>--}}
                {{--<div class="form-group m-form__group">--}}
                {{--<input class="form-control m-input m-login__form-input--last" type="password"--}}
                {{--placeholder="Confirm Password" name="rpassword">--}}
                {{--</div>--}}
                {{--<div class="row form-group m-form__group m-login__form-sub">--}}
                {{--<div class="col m--align-left">--}}
                {{--<label class="m-checkbox m-checkbox--light">--}}
                {{--<input type="checkbox" name="agree">I Agree the--}}
                {{--<a href="#" class="m-link m-link--focus">terms and conditions</a>.--}}
                {{--<span></span>--}}
                {{--</label>--}}
                {{--<span class="m-form__help"></span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="m-login__form-action">--}}
                {{--<button id="m_login_signup_submit"--}}
                {{--class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">--}}
                {{--Sign Up--}}
                {{--</button>&nbsp;&nbsp;--}}
                {{--<button id="m_login_signup_cancel"--}}
                {{--class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel--}}
                {{--</button>--}}
                {{--</div>--}}
                {{--</form>--}}
                {{--</div>--}}
                {{--<div class="m-login__account">--}}
							{{--<span class="m-login__account-msg">--}}
								{{--Don't have an account yet ?--}}
							{{--</span>&nbsp;&nbsp;--}}
                    {{--<a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">Sign--}}
                        {{--Up</a>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!--begin::Base Scripts -->
<script src="{{ asset('admin/js/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/scripts.bundle.js') }}" type="text/javascript"></script>

<!--end::Base Scripts -->
<!--begin::Page Snippets -->
<script type="text/javascript">
    //== Class Definition
    var SnippetLogin = function() {
        var ajaxToken =  function () {
            $.ajaxSetup({//add this when call ajax
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        };
        var login = $('#m_login');

        var showErrorMsg = function(form, type, msg) {
            var alert = $('<div class="m-alert m-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
			<span></span>\
		</div>');

            form.find('.alert').remove();
            alert.prependTo(form);
            //alert.animateClass('fadeIn animated');
            mUtil.animateClass(alert[0], 'fadeIn animated');
            alert.find('span').html(msg);
        }

        //== Private Functions

        // var displaySignUpForm = function() {
        //     login.removeClass('m-login--forget-password');
        //     login.removeClass('m-login--signin');
        //     // login.removeClass('m-login--reset-password');
        //
        //     login.addClass('m-login--signup');
        //     mUtil.animateClass(login.find('.m-login__signup')[0], 'flipInX animated');
        // }

        var displaySignInForm = function() {
            login.removeClass('m-login--forget-password');
            // login.removeClass('m-login--signup');
            login.removeClass('m-login--reset-password');

            login.addClass('m-login--signin');
            mUtil.animateClass(login.find('.m-login__signin')[0], 'flipInX animated');
        }

        var displayForgetPasswordForm = function() {
            login.removeClass('m-login--signin');
            login.removeClass('m-login--reset-password');
            // login.removeClass('m-login--signup');

            login.addClass('m-login--forget-password');
            //login.find('.m-login__forget-password').animateClass('flipInX animated');
            mUtil.animateClass(login.find('.m-login__forget-password')[0], 'flipInX animated');
        }



        var handleFormSwitch = function() {
            $('#m_login_forget_password').click(function(e) {
                e.preventDefault();
                displayForgetPasswordForm();
            });

            $('#m_login_forget_password_cancel').click(function(e) {
                e.preventDefault();
                displaySignInForm();
            });

            $('#m_login_reset_password_cancel').click(function(e){
                e.preventDefault();
                displaySignInForm();
            });
            // $('#m_login_signup').click(function(e) {
            //     e.preventDefault();
            //     displaySignUpForm();
            // });
            //
            // $('#m_login_signup_cancel').click(function(e) {
            //     e.preventDefault();
            //     displaySignInForm();
            // });

        }

        var handleSignInFormSubmit = function() {
            $('#m_login_signin_submit').click(function(e) {
                e.preventDefault();
                var btn = $(this);
                var form = $(this).closest('form');

                form.validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true
                        }
                    }
                });

                if (!form.valid()) {
                    return;
                }

                btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

                form.ajaxSubmit({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    success: function(response, status, xhr, $form) {
                        window.location.href='{{ route('admin.dashboard') }}';
                    },
                    error: function(data){
                        setTimeout(function() {
                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
                            showErrorMsg(form, 'danger', data.responseJSON.error);
                        }, 0);
                    }
                });
            });
        }

        // var handleSignUpFormSubmit = function() {
        //     $('#m_login_signup_submit').click(function(e) {
        //         e.preventDefault();
        //
        //         var btn = $(this);
        //         var form = $(this).closest('form');
        //
        //         form.validate({
        //             rules: {
        //                 fullname: {
        //                     required: true
        //                 },
        //                 email: {
        //                     required: true,
        //                     email: true
        //                 },
        //                 password: {
        //                     required: true
        //                 },
        //                 rpassword: {
        //                     required: true
        //                 },
        //                 agree: {
        //                     required: true
        //                 }
        //             }
        //         });
        //
        //         if (!form.valid()) {
        //             return;
        //         }
        //
        //         btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
        //
        //         form.ajaxSubmit({
        //             url: form.attr('action'),
        //             type: form.attr('method'),
        //             success: function(response, status, xhr, $form) {
        //                 // similate 2s delay
        //                 setTimeout(function() {
        //                     btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
        //                     form.clearForm();
        //                     form.validate().resetForm();
        //
        //                     // display signup form
        //                     displaySignInForm();
        //                     var signInForm = login.find('.m-login__signin form');
        //                     signInForm.clearForm();
        //                     signInForm.validate().resetForm();
        //
        //                     showErrorMsg(signInForm, 'success', 'Thank you. To complete your registration please check your email.');
        //                 }, 0);
        //             },
        //             error: function(data){
        //                 console.log(data);
        //                 setTimeout(function() {
        //                     btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
        //                     showErrorMsg(form, 'danger', 'Incorrect username or password. Please try again.');
        //                 }, 0);
        //             }
        //         });
        //     });
        // }

        var handleForgetPasswordFormSubmit = function() {
            $('#m_login_forget_password_submit').click(function(e) {
                e.preventDefault();

                var btn = $(this);
                var form = $(this).closest('form');

                form.validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        }
                    }
                });

                if (!form.valid()) {
                    return;
                }

                btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

                form.ajaxSubmit({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    success: function(response, status, xhr, $form) {
                        // similate 2s delay
                        setTimeout(function() {
                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false); // remove
                            form.clearForm(); // clear form
                            form.validate().resetForm(); // reset validation states

                            // display signup form
                            displaySignInForm();
                            var signInForm = login.find('.m-login__signin form');
                            signInForm.clearForm();
                            signInForm.validate().resetForm();

                            showErrorMsg(signInForm, 'success', 'Cool! Password recovery instruction has been sent to your email.');
                        }, 0);
                    },
                    error: function(data){
                        console.log(data);
                        setTimeout(function() {
                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
                            showErrorMsg(form, 'danger', data.responseJSON.error ? data.responseJSON.error : 'Sorry, whole some thing went wrong!');
                        }, 0);
                    }
                });
            });
        }
        var handleResetPasswordFormSubmit = function() {
            $('#m_login_reset_password_submit').click(function(e) {
                e.preventDefault();
                var btn = $(this);
                var form = $(this).closest('form');
                $.validator.addMethod("pwcheck",function(value, element) {
                        return /^(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/.test(value);
                }, 'Password must be contain at least 8 character, 1 uppercase letter, 1 digit and 1 symbol');
                form.validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password : {
                            required: true,
                            minlength : 8,
                            pwcheck: true
                        },
                        password_confirmation : {
                            equalTo : "#password"
                        }
                    }
                });

                if (!form.valid()) {
                    return;
                }

                btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

                form.ajaxSubmit({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    success: function(response, status, xhr, $form) {
                        setTimeout(function() {
                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false); // remove
                            form.clearForm(); // clear form
                            form.validate().resetForm(); // reset validation states

                            // display signIn form
                            displaySignInForm();
                            var signInForm = login.find('.m-login__signin form');
                            signInForm.clearForm();
                            signInForm.validate().resetForm();

                            showErrorMsg(signInForm,'success', 'Reset password successfully !. Please login to countinue ');
                        }, 0);
                    },
                    error: function(data){
                        console.log(data);
                        setTimeout(function() {
                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
                            showErrorMsg(form, 'danger', data.responseJSON.error);
                        }, 0);
                    }
                });
            });
        }

        //== Public Functions
        return {
            // public functions
            init: function() {
                ajaxToken();
                handleFormSwitch();
                handleSignInFormSubmit();
                // handleSignUpFormSubmit();
                handleResetPasswordFormSubmit();
                handleForgetPasswordFormSubmit();
            }
        };

    }();

    //== Class Initialization
    jQuery(document).ready(function() {
        SnippetLogin.init();
    });

</script>

<!--end::Page Snippets -->
</body>

<!-- end::Body -->
</html>
