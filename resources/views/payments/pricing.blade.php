@extends('layouts.main')

@section('content')

<div class="single-page-sec">
    <div class="single-page-icon"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.28169 4.68208C3.28169 4.03075 3.77629 3.50269 4.3865 3.50269H19.2389C19.8491 3.50269 20.3437 4.03074 20.3437 4.68208V13.3167C20.6822 12.6294 21.121 11.9908 21.6643 11.411C22.2528 10.7831 22.9101 10.2733 23.625 9.87399V0.875738C23.625 0.391997 23.2576 0 22.8047 0H0.820342C0.367463 0 0 0.391997 0 0.875738V28.3743C0 28.858 0.367438 29.25 0.820342 29.25H18.9207C18.7543 28.4407 18.675 27.5913 18.675 26.7122V25.747H4.38588C3.77571 25.747 3.28107 25.219 3.28107 24.5677L3.28169 4.68208ZM31.3825 27.1573C31.3825 26.3491 31.1375 25.7083 30.6475 25.2351C30.1682 24.752 29.3479 24.3084 28.1869 23.9041C27.0257 23.5001 26.0245 23.1006 25.1829 22.7065C24.3414 22.3022 23.6171 21.8438 23.0098 21.3312C22.4132 20.8088 21.9447 20.1975 21.6036 19.4975C21.2735 18.7976 21.1083 17.9646 21.1083 16.9987C21.1083 15.3325 21.6837 13.9673 22.8341 12.9027C23.8544 11.9583 25.1719 11.3629 26.7871 11.1166C27.1447 11.0622 27.42 10.7841 27.42 10.4489V8.52786C27.42 8.16717 27.7357 7.875 28.1253 7.875H29.2711C29.6606 7.875 29.9764 8.16717 29.9764 8.52786V10.5167C29.9764 10.8419 30.2363 11.1147 30.5801 11.1819C32.1795 11.4955 33.4536 12.1922 34.4025 13.2722C35.3445 14.3359 35.8701 15.6809 35.9791 17.3073C36.0028 17.6669 35.6845 17.9599 35.2947 17.9599H32.0878C31.6983 17.9599 31.3872 17.6667 31.3525 17.3075C31.2696 16.4471 31.0133 15.7822 30.5836 15.3129C30.0617 14.7215 29.3586 14.4258 28.4743 14.4258C27.6008 14.4258 26.9244 14.6572 26.4451 15.1207C25.9658 15.574 25.7261 16.205 25.7261 17.0133C25.7261 17.7626 25.9603 18.3638 26.4292 18.8175C26.898 19.2708 27.766 19.7343 29.0337 20.2073C30.3119 20.6806 31.3613 21.1292 32.1814 21.5531C33.0015 21.9669 33.6941 22.4402 34.2585 22.9727C34.8231 23.4951 35.2545 24.0963 35.5529 24.7767C35.8513 25.4469 36 26.2308 36 27.1279C36 28.8037 35.4357 30.1641 34.3067 31.2091C33.3002 32.1403 31.9557 32.731 30.2726 32.981C29.9155 33.0342 29.6408 33.312 29.6408 33.647V35.3471C29.6408 35.7078 29.325 36 28.9355 36H27.8057C27.4161 36 27.1004 35.7078 27.1004 35.3471V33.6588C27.1004 33.325 26.8278 33.0477 26.4721 32.9941C24.5891 32.7104 23.1048 32.0218 22.0193 30.9279C20.9575 29.8401 20.368 28.4361 20.2513 26.7158C20.2268 26.3559 20.5453 26.0632 20.9349 26.0632H24.1418C24.5316 26.0632 24.8421 26.3564 24.8809 26.715C24.9742 27.576 25.2611 28.2605 25.742 28.769C26.3493 29.3902 27.2174 29.7007 28.3466 29.7007C29.284 29.7007 30.0242 29.474 30.5677 29.0204C31.1108 28.5572 31.3825 27.9361 31.3825 27.1572L31.3825 27.1573ZM6.75 13.8904C6.75 13.0533 7.23455 12.375 7.83226 12.375H15.7927C16.3905 12.375 16.875 13.0534 16.875 13.8904V15.3599C16.875 16.1967 16.3905 16.875 15.7927 16.875H7.83226C7.23451 16.875 6.75 16.1966 6.75 15.3599V13.8904ZM6.75 19.5153C6.75 18.6783 7.23451 18 7.83226 18H15.7927C16.3905 18 16.875 18.6783 16.875 19.5153V20.9847C16.875 21.8214 16.3905 22.5 15.7927 22.5H7.83226C7.23454 22.5 6.75 21.8214 6.75 20.9847V19.5153ZM6.75 8.26509C6.75 7.42835 7.23455 6.75 7.83226 6.75H15.7927C16.3905 6.75 16.875 7.42837 16.875 8.26509V9.73491C16.875 10.5716 16.3905 11.25 15.7927 11.25H7.83226C7.23451 11.25 6.75 10.5716 6.75 9.73491V8.26509Z" fill="#4C3FF2"/></svg></div>
    <h1 class="single-page-main-title" id="premium">Upgrade to Premium</h1>
    <p class="single-page-main-desc">Get access to all tools, as-well as premium tools that will be released in the future.</p>
    
    <div class="single-page-inner">
        <div class="pricing-plan-sec">
            <div class="container">
                <div class="text-center">
                    <div class="pricing-plan-main">
                        <div class="plans basic">
                            <div class="plans-text-section">
                                <div class="package">Monthly</div>
                                <div class="package-subtitle">Get Access to all Features</div>
                                <div class="package-price"><span class="dollar">$</span>{{ floor($sass->premiumPriceMonthly) }}<span>.{{ $sass->premiumPriceMonthly * 100 - (floor($sass->premiumPriceMonthly) * 100) }}</span></div>
                                <div class="package-detail">billed monthly.</div>
                            </div>
                            <a href="{{ route('monthly.subscription') }}" class="plan-btn">Subscribe</a>
                        </div>
                        <div class="plans">
                            <div class="plans-text-section">
                                <div class="package">Yearly</div>
                                <div class="package-subtitle">Get Access to all Features</div>
                                <div class="package-price"><span class="dollar">$</span>{{ floor($sass->premiumPriceAnnually) }}<span>.{{ $sass->premiumPriceAnnually * 100 - (floor($sass->premiumPriceAnnually) * 100) }}</span></div>
                                <div class="package-detail">billed yearly.</div>
                            </div>
                            <a href="{{ route('yearly.subscription') }}" class="plan-btn">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="plan-table-section">
            <div class="container">
                <div class="table-responsive">
                    <table class="table plansFeaturesTable">
                        <thead>
                            <tr>
                                <th scope="col" class="text-left tHeadTitle lefttHeadTitle">Tools</th>
                                <th scope="col" class="lastTwoTds tHeadTitle">Free</th>
                                <th scope="col" class="lastTwoTds tHeadTitle">Pro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sass->premiumTools as $toolKey)
                                <tr>
                                    <td scope="row" class="text-left">{{ get_tool_title_from_key($toolKey) }}</td>
                                    <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="19.613" height="19.613" viewBox="0 0 19.613 19.613"><path id="close" d="M27.2,10.592,25.606,9,18.1,16.507,10.592,9,9,10.592,16.507,18.1,9,25.606,10.592,27.2,18.1,19.692,25.606,27.2,27.2,25.606,19.692,18.1Z" transform="translate(-8.293 -8.293)" fill="#d42940" stroke="#d42940" stroke-width="1"/></svg></td>
                                    <td class="text-center"><svg id="check" xmlns="http://www.w3.org/2000/svg" width="20.473" height="15.358" viewBox="0 0 20.473 15.358"><path id="Path_3220" data-name="Path 3220" d="M17.193,21.873l-5.12-5.118L9.514,19.314l7.679,7.679L29.987,14.2l-2.556-2.561L17.193,21.873Z" transform="translate(-9.514 -11.635)" fill="#286efb"/></svg></td>
                                </tr>
                            @endforeach

                            <tr>
                                <td scope="row" class="text-left">All Other Tools & Features</td>
                                <td class="text-center"><svg id="check" xmlns="http://www.w3.org/2000/svg" width="20.473" height="15.358" viewBox="0 0 20.473 15.358"><path id="Path_3220" data-name="Path 3220" d="M17.193,21.873l-5.12-5.118L9.514,19.314l7.679,7.679L29.987,14.2l-2.556-2.561L17.193,21.873Z" transform="translate(-9.514 -11.635)" fill="#286efb"/></svg></td>
                                <td class="text-center"><svg id="check" xmlns="http://www.w3.org/2000/svg" width="20.473" height="15.358" viewBox="0 0 20.473 15.358"><path id="Path_3220" data-name="Path 3220" d="M17.193,21.873l-5.12-5.118L9.514,19.314l7.679,7.679L29.987,14.2l-2.556-2.561L17.193,21.873Z" transform="translate(-9.514 -11.635)" fill="#286efb"/></svg></td>
                            </tr>

                            <tr>
                                <td scope="row" class="text-left border-none"></td>
                                <td class="text-center border-none"></td>
                                <td class="text-center border-none"><a href="#premium" class="btn custom--btn button__lg mt-3 mb-3 white-space-nw">Upgrade to Pro</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection