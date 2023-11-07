<div class="sticky-md-top">

    <nav class="navbar navbar-expand-lg navbar-dark dark-mod-bg">
        <div class="container ms-0 me-auto">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="fw-bold">
                <a class="navbar-brand" href="{{route("iptbm.admin.iptbm_profiles.profiles")}}">IPTBM Profiles:</a>
            </span>
            <div class=" navbar-collapse " id="navbarNav">
                <ul class="navbar-nav nav-pills gap-4">
                    <li class="nav-item dropdown ms-3 ">
                        <a class="nav-link dropdown-toggle active" href="#" id="regionDropDown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            All Regions
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="regionDropDown">
                            @foreach($regions as $region)
                                <li>
                                    <a class="dropdown-item" href="{{route("iptbm.admin.iptbm_profiles.profiles-list",["id"=>$region->id])}}">{{$region->name}}</a>
                                </li>

                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

