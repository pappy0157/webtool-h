<!DOCTYPE html>
<html lang="{{ $locale['code'] }}" dir="{{ $locale['direction'] }}">
	<head>
        @if($generalSettings->gaId)
            <script async defer src="https://www.googletagmanager.com/gtag/js?id={{ $generalSettings->gaId }}" type="text/javascript"></script>
            <script type="text/javascript">
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', '{{ $generalSettings->gaId }}');
            </script>
        @endif
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
		<title>{{ $title }} — {{ $generalSettings->websiteTitle }}</title>
        @include('includes.seo-content')
        <link rel="icon" href="{{ storage_url( $generalSettings->favicon ) }}">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/additional.css') }}">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        @include('includes.header-content')

        @if(isset($wire))
            @livewireStyles()
        @endif

        @if(isset($recaptcha) && $recaptcha)
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        @endif
    </head>
<body class="{{ $locale['direction'] }} {{ $theme }}">

    @if($generalSettings->bodyTags)
        {!! $generalSettings->bodyTags !!}
    @endif

	<div class="container">
		<div class="main-section">
			<header class="mainPadding">
				<nav class="p-0 navbar navbar-expand-lg navbar-dark">
					<a class="navbar-brand {{ $theme == 'dark' ? 'dark' : '' }}" href="{{ url('/') }}"><img alt="top-logo" src="{{ storage_url( $theme == 'dark' ? $generalSettings->footerLogo : $generalSettings->logo ) }}" class="img-responsivee" width="auto" height="auto"></a>
					<div class="d-flex ms-auto align-items-center">
                        <div class="collapse navbar-collapse header-navbar" x-data x-on:toggle.window="$el.classList.toggle('show')" id="navbarNavDropdown">
                            <ul>
                                <li>
                                    <a href="{{ url('/') }}">{{ trans('webtools/pages.home-link') }}</a>
                                </li>

                                @if($sass->status && (!auth()->check() || !auth()->user()->premium()))
                                    <li>
                                        <a href="{{ route('pricing') }}">Pricing</a>
                                    </li>
                                @endif

                                @foreach($navigationPages as $page)
                                    @if($page->location == 'header' || $page->location == 'both')
                                        <li>
                                            <a href="{{ route('page', $page->slug) }}">{{ $page->title }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                @foreach($generalSettings->links as $link)
                                    @if($link['location'] == 'header' || $link['location'] == 'both')
                                        <li>
                                            <a {{ $link['newTab'] ? 'target="_blank"' : '' }} href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                @if ($generalSettings->blogSection)
                                    <li>
                                        <a href="{{ route('blog') }}">{{ trans('webtools/pages.blog-link') }}</a>
                                    </li>
                                @endif

                                @if ($generalSettings->contactPage)
                                    <li>
                                        <a href="{{ route('contact') }}">{{ trans('webtools/pages.contact-link') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        @if($generalSettings->darkTheme)
                            <div x-data="{ show: false }" @click.outside="show = false" class="btn-group header-language-btn-group theme-change-color">
                                <a href="{{ route('set-theme', $theme == 'light' ? 'dark' : 'light') }}" class="text-black header-language-btn">
                                    <div class="text"><i class="fas {{ $theme == 'light' ? 'fa-moon' : 'fa-sun' }}"></i></div>
                                </a>
                            </div>
                        @endif

                        @if(count($languageSettings->languages) && count($languageSettings->languages) > 1)
                            <div x-data="{ show: false }" @click.outside="show = false" class="btn-group header-language-btn-group">
                                <button type="button" :class="show && 'show'" @click="show = !show" class="header-language-btn dropdown-toggle">
                                    <div class="icon">
                                        <img width="20" height="18" src="https://countryflagsapi.netlify.app/flag/{{ get_locale()['flag'] }}.png" alt="">
                                    </div>
                                    <div class="text {{ $locale['direction'] == 'rtl' ? 'mx-2' : '' }}">{{ strtoupper(trim(get_locale()['code'])) }}</div>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end header-language-dd" :class="show && 'show'" data-bs-popper>
                                    @foreach ($languageSettings->languages as $language)
                                        <a href="javascript:void()" x-on:click="window.location.replace('{{ route('set-language', $language['code']) }}')" class="{{ get_locale()['code'] == strtolower(trim($language['code'])) ? 'active' : '' }}">
                                            <div class="icon">
                                                <img width="20" height="18" src="https://countryflagsapi.netlify.app/flag/{{ $language['flag'] }}.png" alt="">
                                            </div>
                                            <div class="text">{{ strtoupper(trim($language['code'])) }}</div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if($sass->status)
                            <div x-data="{ show: false }" x-on:click.outside="show = false" class="login-btn-main">
                                <a x-on:click="show = ! show" href="{{ auth()->check() ? 'javascript:void(0)' : route('login') }}" class="login-btn" data-bs-toggle="dropdown">
                                    <div class="login-user-icon {{ auth()->check() ? 'logedin' : '' }} "><svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.9597 1.83419C5.2233 0.52676 6.62153 0 8.2215 0C9.83146 0 11.3482 0.653759 12.4862 1.83717C13.6224 3.0187 14.2488 4.59329 14.2488 6.26212C14.2488 7.93096 13.6224 9.50555 12.4862 10.6871L12.4848 10.6885C12.4235 10.7518 12.3612 10.8137 12.2978 10.874C12.5936 11.0479 12.8806 11.2418 13.1572 11.4554C13.688 11.8655 13.8033 12.6453 13.4073 13.1995L13.4069 13.2001C13.0092 13.7554 12.2536 13.8739 11.7152 13.4607L11.7141 13.4599C10.7 12.6783 9.49629 12.2664 8.23017 12.2664C6.78425 12.2664 5.39618 12.8181 4.31918 13.8227C3.25059 14.8201 2.57178 16.1816 2.40748 17.657C2.33727 18.2921 1.81704 18.7638 1.20867 18.7638C1.16076 18.7638 1.11682 18.7601 1.09784 18.7586C1.096 18.7584 1.09439 18.7583 1.09304 18.7582L1.08011 18.7571L1.06723 18.7556C0.402205 18.6744 -0.068535 18.0532 0.00819045 17.3704C0.237974 15.3024 1.00149 13.5473 2.70459 11.9627C3.13229 11.5648 3.72582 11.1808 4.19061 10.9049C4.10516 10.8292 4.02466 10.754 3.95856 10.6853C2.82237 9.50374 2.19589 7.92916 2.19589 6.26032C2.19589 4.60489 2.68578 3.15229 3.9597 1.83419ZM8.22323 2.49955C7.25777 2.49955 6.35384 2.88828 5.67129 3.59792C4.98791 4.31022 4.61226 5.25153 4.61226 6.26032C4.61226 7.26963 4.98826 8.21243 5.67103 8.92245C6.33022 9.60795 7.13081 9.97684 8.05846 10.0181C9.06853 10.0623 10.0592 9.66271 10.774 8.92214C11.4571 8.21167 11.8342 7.26879 11.8342 6.26032C11.8342 5.25039 11.4595 4.30807 10.7759 3.5987C10.0912 2.88821 9.18682 2.49955 8.22323 2.49955ZM13.5634 13.5512C13.5634 12.8659 14.0992 12.3005 14.7716 12.3005C15.4439 12.3005 15.9797 12.8659 15.9797 13.5512V14.3996H16.7901C17.4631 14.3996 17.9963 14.9649 18 15.6466L18 15.6503C18 16.3355 17.4642 16.9009 16.7918 16.9009H15.9815V17.7493C15.9815 18.4346 15.4457 19 14.7733 19C14.1009 19 13.5651 18.4346 13.5651 17.7493V16.9009H12.753C12.0806 16.9009 11.5448 16.3355 11.5448 15.6503C11.5448 14.965 12.0806 14.3996 12.753 14.3996H13.5634V13.5512Z" fill="#4C3FF2"/></svg></div>
                                </a>

                                @if(auth()->check())
                                    <ul x-cloak x-bind:class="`${(show ? 'show ' : '')} dropdown-menu dropdown-menu-end`">
                                        <li><a href="{{ route('manage') }}">Profile</a></li>
                                        <li><a href="{{ route('logout') }}">Sign Out</a></li>
                                    </ul>
                                @endif
                            </div>
                        @endif

                        <div x-data x-on:click="$dispatch('toggle')" id="navbar-toggler" class="nav-btn" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
				</nav>
			</header>

            @yield('content')

            <div class="row">
                @if ($generalSettings->contactPage)
                    <div class="col-lg-6">
                        <div class="home-helping-sec">
                            {!! $generalSettings->contactSectionContent !!}

                            <a href="{{ route('contact') }}" class="btn custom--btn button__lg btn__light">{{ trans('webtools/pages.contact-link') }}</a>
                        </div>
                    </div>
                @endif

				<div class="{{ $generalSettings->contactPage ? 'col-lg-6' : 'col-lg-12' }}">
					<footer>
						<div class="footer-logo"><a href="{{ url('/') }}"><img alt="footer-logo" src="{{ storage_url( $generalSettings->footerLogo ) }}" alt="" width="auto" height="auto"></a></div>
						<div class="footer-nav">
                            @foreach($navigationPages as $page)
                                @if($page->location == 'footer' || $page->location == 'both')
                                    <a href="{{ route('page', $page->slug) }}">{{ $page->title }}</a>
                                @endif
                            @endforeach

                            @foreach($generalSettings->links as $link)
                                @if($link['location'] == 'footer' || $link['location'] == 'both')
                                    <a {{ $link['newTab'] ? 'target="_blank"' : '' }} href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                                @endif
                            @endforeach

                            @if ($generalSettings->blogSection)
                                <a href="{{ route('blog') }}">{{ trans('webtools/pages.blog-link') }}</a>
                            @endif
						</div>
						<div class="footer-copyright">{!! $generalSettings->footerAttribution !!}</div>
					</footer>
				</div>
			</div>
		</div>
	</div>

    @if($cookieConsent == 'no-consent')
        <div x-data class="cookie-alert alert alert-dark text-center mb-0" x-ref="parent">
            This website uses Cookies to ensure optimal user experience. <button x-on:click="fetch('{{ url("/cookie-consent") }}'); $refs.parent.remove();" class="btn btn-primary">OK</button>
        </div>
    @endif

    @stack('alpine-components')
    <script src="{{ asset('js/app.js') }}" defer></script>

    @if(isset($wire))
        @livewireScripts()
    @endif

    @include('includes.footer-content')

    @stack('scripts')
</body>
</html>
