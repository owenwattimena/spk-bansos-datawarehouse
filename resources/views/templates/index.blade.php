
<!DOCTYPE html>
<html lang="en">
    @include('templates.head')
    <body class="nav-fixed">
        @include('templates.top-nav')

        <div id="layoutSidenav">
            @include('templates.side-nav')
            <div id="layoutSidenav_content">
                @if(session('alert'))
                <div class="alert alert-{{ session('alert')['status'] }} alert-dismissible fade show rounded-0" role="alert">
                    <h5 class="alert-heading">{{ session('alert')['title'] }}</h5>
                    {{ session('alert')['message'] }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <main>
                    @yield('content')
                </main>
                @include('templates.footer')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets') }}/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables/datatables-simple-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets') }}/js/litepicker.js"></script>
        @yield('script')
    </body>
</html>
