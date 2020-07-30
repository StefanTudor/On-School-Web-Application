<style>
    .user-img-msg-white {
        height: 45px;
        width: 45px;
        border: 2px solid #fff
    }

    .navbar {
        z-index: 10;
    }

    #navbarContent {
        z-index: 9;
    }

    #btn-user {
        position: fixed;
        right: 1.5rem;
        z-index: 10;
        cursor: pointer;
        -webkit-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }
</style>

<div class="dropdown" style="z-index: 12;">
    <a class="btn mt-2 p-0 d-flex align-items-center" id="btn-user" href="#" role="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="badge badge-light text-dark p-2 pr-4" style="font-size: 1rem; top: 0.6rem; right: 2.5rem;"><?php echo $_SESSION["userName"] ?></span>
        <img src="/assets/img/user-white.png" class="rounded-circle user-img-msg-white position-absolute" style="right:1rem; top: 0.1rem;">
    </a>


    <div class="dropdown-menu mr-5 mt-3" aria-labelledby="dropdownMenu">
        <a class="dropdown-item py-2" href=""><i class="fa fa-cogs"></i> Setări cont</a>
        <div class="dropdown-divider m-0"></div>
        <a class="dropdown-item py-2" href="/"><i class="fa fa-power-off text-danger"></i> <span class="text-danger">Deconecteză-te</span></a>
    </div>
</div>

<nav class="navbar navbar-dark position-fixed w-100 bg-dark">
    <button class="navbar-toggler outline-0 my-1 mr-3" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a href="/">
        <h1 class="text-light text-center w-100 p-1 text-uppercase d-none d-lg-block d-xl-block" id="school-h1">
            <a href="/elev" id="link-scoala"><?php echo $_SESSION["scoala"] ?></a>
        </h1>

</nav>
<div class="collapse position-fixed w-100" id="navbarContent">
    <div class="bg-dark p-3">
        <div class="p-4"></div>

        <ul class="navbar-nav text-center">
            <li class="nav-item active">
                <a class="nav-link text-light" href="/parinte">Note</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-light" href="/parinte/orar">Orar</a>
            </li>
            </li>
        </ul>
    </div>
</div>