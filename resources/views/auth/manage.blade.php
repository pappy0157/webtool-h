@extends('layouts.main')

@section('content')

<div class="single-page-sec">
    <div class="single-page-icon"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24.9422 6.63899e-05H4.74224C2.12735 6.63899e-05 0 2.07227 0 4.61955V31.3805C0 33.9277 2.12727 36 4.74224 36H24.9422C27.5571 36 29.6845 33.9278 29.6845 31.3805V19.4484L32.5403 16.6665L32.5634 16.689L34.6448 14.6614L34.6215 14.6386C35.5104 13.7674 36 12.6119 36 11.3828C36 10.1489 35.5068 8.98891 34.6109 8.11654L34.2526 7.76752C33.0177 6.56455 31.264 6.16667 29.6845 6.57169V4.61949C29.6845 2.07228 27.5572 0 24.9422 0L24.9422 6.63899e-05ZM26.741 31.3807C26.741 32.347 25.9342 33.1328 24.9422 33.1328H4.74224C3.75025 33.1328 2.94351 32.3469 2.94351 31.3807V4.6197C2.94351 3.65339 3.75033 2.86753 4.74224 2.86753H24.9422C25.9342 2.86753 26.741 3.65347 26.741 4.6197V8.51522L25.4564 9.76654L25.4725 9.78219L14.3132 20.6213C14.1284 20.8008 13.9958 21.0252 13.9292 21.2713L12.1313 27.9182C11.9978 28.4118 12.1439 28.9374 12.5147 29.2981C12.7942 29.57 13.1697 29.7171 13.5545 29.7171C13.6804 29.7171 13.8071 29.7014 13.9318 29.669L20.7093 27.9173C20.9601 27.8525 21.1891 27.7242 21.3724 27.5453L26.7407 22.316L26.741 31.3807ZM16.1192 24.427L17.4963 25.781L15.6219 26.2654L16.1192 24.427ZM20.3364 24.4996L17.4303 21.6426L27.5535 11.8091L30.4586 14.6391L20.3364 24.4996ZM32.1706 9.79524L32.5289 10.1443C32.8686 10.4751 33.0557 10.9151 33.0557 11.3833C33.0557 11.8464 32.8721 12.2816 32.5389 12.6116L29.6375 9.78534C30.3401 9.1129 31.4736 9.11603 32.1707 9.79529L32.1706 9.79524Z" fill="#4C3FF2"/></svg></div>
    <h1 class="single-page-main-title">Manage your Subscriptions</h1>
    <p class="single-page-main-desc">Update your subscription status.</p>
    
    @if(session('verification'))
        <div class="alert alert-success">E-mail Verification Successful.</div>
    @endif

    @if(session('cancelled'))
        <div class="alert alert-success">Subscription cancelled successfully. You will not be charged further.</div>
    @endif

    <div class="single-page-inner">
        <div class="usersec">
            <div class="userDetSec">
                <div class="userNm">{{ auth()->user()->name }}</div>
                <div class="userEmail">{{ auth()->user()->email }}</div>
            </div>
        </div>
        <hr class="small-marg">
        <div class="bodyBillingDetails clearfix">
            <div class="currentPlansDetails">
                <div class="planDetails">
                    <div class="planText">
                        Current plan:

                        <span>
                            @if(auth()->user()->subscription_id || auth()->user()->allow_till > now())
                                <span class="planIcon pro">Pro</span>
                            @else
                                <span class="planIcon trial">Free</span>
                            @endif
                        </span>
                    </div>
                    <div class="billingText">
                        @if(auth()->user()->allow_till > now())
                            Your premium status will remain until: <strong>{{ \Carbon\Carbon::parse(auth()->user()->allow_till)->format("M d, Y") }}</strong>. You will be able to re-subscribe when your current term is over.
                        @elseif(auth()->user()->subscription_id)
                            Your subscription is currently active. Your payment interval is <strong>{{ auth()->user()->checkout->type == 'month' ? 'Monthly' : 'Yearly' }}</strong>. You will receive further details in your E-mail inbox.
                        @else
                            You are currently not subscribed to any plan.
                        @endif
                    </div>
                </div>
                @if(auth()->user()->subscription_id)
                    <a href="{{ route('cancel.current.subscription.confirmation') }}" class="btn custom--btn bg-danger button__md">Cancel Your Subscription</a>
                @elseif(auth()->user()->allow_till > now())
                    <button disabled class="btn custom--btn disabled button__md">Upgrade</button>
                @else
                    <a href="{{ route('pricing') }}" class="btn custom--btn button__md">Upgrade</a>
                @endif
            </div>
        </div>

        <hr class="small-marg">
        
        <div class="currentPlansDetails">
            <div class="planDetails">
                <div class="plansTextBTextArea newBillingEmailPlanText">
                    <div class="planText">
                        Billing email:
                    </div>
                    <div class="billingText">{{ auth()->user()->email }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(auth()->user()->password != 'NONE')
    <div class="single-page-sec">
        <div id="password" class="single-page-icon mt-4"><svg width="41" height="36" viewBox="0 0 41 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M40.2738 5.84324C40.1814 6.85185 39.7656 7.72958 39.0573 8.43022C38.3393 9.15242 37.6219 9.87541 36.9044 10.5985L36.899 10.6039C33.7327 13.7949 30.5652 16.9871 27.3465 20.1178C25.1137 22.2891 22.3343 23.29 19.216 23.3054C18.2767 23.3131 17.6377 22.6124 17.6608 21.6346C17.7301 18.3701 18.9004 15.5675 21.1948 13.25C24.9367 9.48503 28.6939 5.72775 32.4589 1.98586C33.737 0.715466 35.3154 0.338198 37.0323 0.838656C38.7416 1.33911 39.7887 2.53251 40.2199 4.26487C40.2403 4.34646 40.2472 4.43142 40.254 4.51529C40.2574 4.55805 40.2609 4.60053 40.2661 4.64214C40.2738 5.05008 40.2738 5.44263 40.2738 5.84287V5.84324ZM20.9253 20.0485C20.9946 19.5019 21.164 18.9937 21.3564 18.501C21.803 17.3692 22.4497 16.3606 23.3121 15.4982C27.054 11.7486 30.7958 8.00676 34.5454 4.26487C35.2307 3.57963 36.17 3.54883 36.8013 4.17248C37.4404 4.80383 37.4173 5.74315 36.7321 6.42839C32.9825 10.1857 29.2252 13.943 25.4679 17.6848C24.236 18.909 22.7577 19.679 21.0639 20.0485C21.0395 20.0534 21.0151 20.0521 20.9849 20.0505C20.9674 20.0496 20.9479 20.0485 20.9253 20.0485ZM6.02767 5.28126C3.2944 6.22058 1.12318 8.99234 0.976896 11.7256C1.03317 11.9554 0.995193 12.1766 0.956899 12.3997C0.932317 12.5429 0.907602 12.6868 0.907602 12.8343C0.923 18.7936 0.923 24.7529 0.899902 30.7045C0.899902 30.8383 0.923799 30.9696 0.947701 31.101C0.982937 31.2945 1.01818 31.4882 0.976896 31.69C0.979983 31.7147 0.980594 31.7407 0.981212 31.7668C0.982134 31.806 0.98307 31.8456 0.992295 31.8825C1.63134 35.2548 5.7043 36.7793 8.38368 34.6312C9.00171 34.1328 9.59105 33.5885 10.1765 33.0478L10.1766 33.0477L10.1802 33.0444C10.2718 32.9598 10.3633 32.8753 10.4548 32.791C10.6627 32.6063 10.8629 32.537 11.14 32.537C16.1369 32.5447 21.1261 32.5447 26.1153 32.5447C26.6234 32.5447 27.1393 32.5293 27.6475 32.46C30.9274 32.0211 33.7453 29.1416 34.0995 25.8462C34.2022 24.8864 34.1885 23.9197 34.1748 22.953C34.168 22.4696 34.1611 21.9863 34.1688 21.5038C34.1842 20.5491 33.5067 19.8407 32.6212 19.8561C31.7435 19.8715 31.0968 20.5645 31.0968 21.4961V24.8453C31.0968 25.1995 31.0583 25.5383 30.9736 25.877C30.4192 28.0867 28.6484 29.4726 26.354 29.4726C21.026 29.4803 15.7058 29.4803 10.3778 29.4726C9.82345 29.4726 9.36149 29.642 8.95343 30.0193C8.557 30.3868 8.15172 30.7477 7.74589 31.109L7.74582 31.1091L7.74575 31.1092L7.74566 31.1092L7.74561 31.1093C7.39486 31.4216 7.04371 31.7343 6.69752 32.0519C6.15856 32.537 5.56571 32.7218 4.89587 32.4138C4.24142 32.1135 3.98734 31.5669 3.98734 30.8585C3.99504 24.7837 3.99504 18.7166 3.99504 12.6495C3.99504 12.4263 3.99504 12.2107 4.02584 11.9951C4.38771 9.5621 6.28175 7.91443 8.74554 7.91443H21.257C21.2925 7.91443 21.3281 7.9148 21.3636 7.91516H21.3637C21.5589 7.91717 21.7533 7.91916 21.9422 7.86054C22.666 7.65266 23.1587 6.93662 23.0663 6.22828C22.9586 5.38905 22.3272 4.83469 21.4495 4.83469C17.1609 4.82699 12.8801 4.82699 8.59156 4.83469C7.71383 4.83469 6.8592 4.99638 6.02767 5.28126ZM10.1709 17.1554C10.4224 17.1545 10.6737 17.1537 10.9249 17.1537C11.1793 17.1537 11.4329 17.1545 11.6856 17.1554H11.6863H11.6871H11.6876H11.6876C12.1913 17.1571 12.6916 17.1588 13.1885 17.1537C14.0816 17.146 14.7515 16.5069 14.7669 15.66C14.79 14.7977 14.1201 14.0893 13.227 14.0816C11.6948 14.0662 10.155 14.0662 8.61509 14.0816C7.72196 14.0893 7.05982 14.7977 7.07521 15.66C7.09061 16.5069 7.76046 17.146 8.65358 17.1537C9.16203 17.1588 9.66705 17.1571 10.1709 17.1554ZM10.9481 23.3131C10.6969 23.3131 10.4457 23.3139 10.1942 23.3148C9.6903 23.3165 9.18528 23.3182 8.67684 23.3131C7.76062 23.3054 7.09077 22.6586 7.08307 21.7963C7.07537 20.9263 7.76062 20.241 8.68454 20.2333C10.1859 20.2256 11.6873 20.2256 13.181 20.2333C14.1049 20.241 14.7901 20.9186 14.7747 21.7963C14.767 22.6586 14.0895 23.2977 13.1733 23.3054C12.6188 23.3169 12.06 23.3155 11.5033 23.314H11.5031H11.5023C11.3173 23.3135 11.1325 23.3131 10.9481 23.3131Z" fill="#4C3FF2"/></svg></div>
        <h1 class="single-page-main-title">Manage your Account</h1>
        <p class="single-page-main-desc">Change your password</p>

        <div class="single-page-inner">
            @if(session('notfound'))
                <div class="alert alert-danger input-alerts">The credentials you provided are invalid.</div>
            @endif

            @if(session('resetpassword'))
                <div class="alert alert-success">Your password was reset successfully.</div>
            @endif

            <form method="POST" action="{{ route('manage-reset-password') }}">
                @csrf
            
                <div class="form-group">
                    <label class="custom-label">Password</label>
                    <div class="copy-textarea-btn">
                        <input type="password" name="password" required class="custom-input" placeholder="Enter your Password" />
                        @error('password')
                            <div class="alert alert-danger input-alerts">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="custom-label">New Password</label>
                            <div class="copy-textarea-btn">
                                <input type="password" name="password_new" required class="custom-input" placeholder="Choose New Password" />
                                @error('password_new')
                                    <div class="alert alert-danger input-alerts">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="custom-label">Confirm New Password</label>
                            <div class="copy-textarea-btn">
                                <input type="password" name="password_new_confirmation" required class="custom-input" placeholder="Confirm Your New Password" />
                            </div>
                        </div>
                    </div>
                </div>
            
                <input type="hidden" name="submit" value="true" />
        
                <button class="btn custom--btn button__lg mt-2">
                    Reset your Password
                </button>
            </form>
        </div>
    </div>
@endif

@endsection