<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">@yield('page-title')</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    @yield('breadcrumb')
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                @yield('widgetbar')
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
