<li class="nav-item {{(request()->getRequestUri() == "/".lang())?"active":""}}">
    <a class="nav-link" href="{{app()->make("url")->to('/')}}/">
        <i class="icon ion-ios-pie-outline"></i>
        <span>{{trans('navigation.Dashboard')}}</span>
    </a>
</li>

@if(can('create-pages') || can('view-users') || can('view-countries') || can('view-news') || can('view-roles') || can('view-options'))

    <li class="nav-item with-sub mega-dropdown {{(request()->is('*/pages*' , '*/news*' , '*/countries*' , '*/users*','*/roles*'.'*/options*'))?"active":""}}">
        <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="true">
            <i class="icon ion-ios-analytics-outline"></i>
            <span> {{trans('navigation.Entities Management')}}</span>
        </a>
        <div class="sub-item">
            <div class="row">
                <div class="col-lg mg-t-30 mg-lg-t-0">
                    <div class="row">
                        <div class="col">
                            <label class="section-label">{{trans('navigation.Users')}}</label>
                            <ul>
                                <li class="{{(request()->is('*/roles*'))?"active":""}}">
                                    <a href="/roles">{{trans('navigation.Roles & Permissions')}}</a>
                                </li>
                                <li class="{{(request()->is('*/users*'))?"active":""}}">
                                    <a href="/users">{{trans('navigation.All Users')}}</a>
                                </li>
                                <li class="{{(request()->is('*/users*'))?"active":""}}">
                                    <a href="/users?type=admin">{{trans('navigation.Admins')}}</a>
                                </li>
                                <li class="{{(request()->is('*/customer*'))?"active":""}}">
                                    <a href="/users?type=customer">{{trans('navigation.Customers')}}</a>
                                </li>  
                                <li class="{{(request()->is('*/mortgage-applications*'))?"active":""}}">
                                    <a href="/mortgage-applications">{{trans('navigation.Mortgage Applications')}}</a>
                                </li>
                                <li class="{{(request()->is('*/requests*'))?"active":""}}">
                                    <a href="/requests">{{trans('navigation.User Requests')}}</a>
                                </li>
                                <li class="{{(request()->is('*/payments*'))?"active":""}}">
                                    <a href="/payments">{{trans('navigation.Payment Processes')}}</a>
                                </li>

                                <li class="{{(request()->is('*/news-teller*'))?"active":""}}">
                                    <a href="/news-teller">{{trans('navigation.News Teller')}}</a>
                                </li>        
                                <li class="{{(request()->is('*/agents*'))?"active":""}}">
                                    <a href="/agents">{{trans('navigation.Agents')}}</a>
                                </li>  
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg mg-t-30 mg-lg-t-0">
                    <div class="row">
                        <div class="col">
                            <label class="section-label">{{trans('navigation.Dynamic Settings')}}</label>
                            <ul>
                                <li class="{{(request()->is('*/pages*'))?"active":""}}">
                                    <a href="/calculator/edit/1">{{trans('navigation.Calculator')}}</a>
                                </li>
                                <li class="{{(request()->is('*/pages*'))?"active":""}}">
                                    <a href="/pages">{{trans('navigation.Pages')}}</a>
                                </li>
                                <li class="{{(request()->is('*/countries*'))?"active":""}}">
                                    <a href="/countries">{{trans('navigation.Countries')}}</a>
                                </li>
                                <li class="{{(request()->is('*/on-boarding-screens*'))?"active":""}}">
                                    <a href="/on-boarding-screens">{{trans('navigation.On Boarding Screens')}}</a>
                                </li>
                                <li class="{{(request()->is('*/options*'))?"active":""}}">
                                    <a href="/options">{{trans('navigation.Lookups & Options')}}</a>
                                </li>
                                <li class="{{(request()->is('*/how-it-works*'))?"active":""}}">
                                    <a href="/how-it-works">{{trans('navigation.How It Works')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg mg-t-30 mg-lg-t-0">
                    <div class="row">
                        <div class="col">
                            <label class="section-label">{{trans('navigation.News')}}</label>
                            <ul>
                                <li class="{{(request()->is('*/categories*'))?"active":""}}">
                                    <a href="/categories">{{trans('navigation.Categories')}}</a>
                                </li>
                                <li class="{{(request()->is('*/news*'))?"active":""}}">
                                    <a href="/news">{{trans('navigation.News')}}</a>
                                </li>
                                <li class="{{(request()->is('*/slider*'))?"active":""}}">
                                    <a href="/slider">{{trans('navigation.Slider')}}</a>
                                </li>
                                <li class="{{(request()->is('*/partners*'))?"active":""}}">
                                    <a href="/partners">{{trans('navigation.Partners')}}</a>
                                </li>
                                <li class="{{(request()->is('*/products*'))?"active":""}}">
                                    <a href="/products">{{trans('navigation.Products')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg mg-t-30 mg-lg-t-0">
                    <div class="row">
                        <div class="col">
                            <label class="section-label">{{trans('navigation.Logs & Activities')}}</label>
                            <ul>
                                <li class="{{(request()->is('*/activities*'))?"active":""}}">
                                    <a href="/activities">{{trans('navigation.Activities')}}</a>
                                </li>
                                <li class="{{(request()->is('*/notifications*'))?"active":""}}">
                                    <a href="/notifications">{{trans('navigation.Notifications')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg mg-t-30 mg-lg-t-0">
                    <div class="row">
                        <div class="col">
                            <label class="section-label">{{trans('navigation.Projects')}}</label>
                            <ul>
                                <li class="{{(request()->is('*/areas*'))?"active":""}}">
                                    <a href="/areas">{{trans('navigation.Areas')}}</a>
                                </li>
                                <li class="{{(request()->is('*/projects*'))?"active":""}}">
                                    <a href="/projects">{{trans('navigation.Projects')}}</a>
                                </li>
                                <li class="{{(request()->is('*/units*'))?"active":""}}">
                                    <a href="/units">{{trans('navigation.Units')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg mg-t-30 mg-lg-t-0">
                    <div class="row">
                        <div class="col">
                            <label class="section-label">{{trans('navigation.About Us')}}</label>
                            <ul>
                                <li class="{{(request()->is('*/vision-mission*'))?"active":""}}">
                                    <a href="/vision-mission">{{trans('navigation.Vision And Mission')}}</a>
                                </li>
                                <li class="{{(request()->is('*/our-team*'))?"active":""}}">
                                    <a href="/our-team">{{trans('navigation.OurTeam')}}</a>
                                </li>

                                <li class="{{(request()->is('*/subsidiaries*'))?"active":""}}">
                                    <a href="/subsidiaries">{{trans('navigation.Subsidiaries')}}</a>
                                </li>

                                <li class="{{(request()->is('*/shareholders*'))?"active":""}}">
                                    <a href="/shareholders">{{trans('navigation.Shareholders')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </li>

@endif
{{-- only super admin can access configuration settings --}}
@if(@auth()->user()->type == App\Modules\Users\UserEnums::SUPER_ADMIN_TYPE)
    
    
    <li class="nav-item with-sub settings {{(request()->is( '*/translator*' , '*/configs*' ))?"active":""}}">
        <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="true">
            <i class="icon ion-ios-gear-outline"></i>
            <span>{{trans('navigation.Settings')}}</span>
        </a>
        <div class="sub-item">
            <ul>                
                <li class="{{(request()->is('*/translator*'))?"active":""}}">
                    <a href="/translator">{{trans('navigation.translator')}}</a>
                </li>

                <li class="{{(request()->is('*/configs*'))?"active":""}}">
                    <a href="/configs/edit">{{trans('navigation.Configurations')}}</a>
                </li>
                
            </ul>
        </div><!-- dropdown-menu -->
    </li>
@endif