<!DOCTYPE html>
<html lang="en">

<head>
    @component('layouts.head')
    @endcomponent

</head>

<body id="page-top">

    <div id="wrapper">

        @component('layouts.sidebar')
        @endcomponent

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                @component('layouts.navbar')
                @endcomponent

                @yield('content')

            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Desenvolvido por <a id="github" target="blank" href="https://github.com/gbcastelo">Gabriel Castelo Garcia</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>

    </div>

    @component('layouts.footer')
    @endcomponent

    @component('layouts.scripts')        
    @endcomponent

    @include('sweetalert::alert')

</body>

</html>
