<!doctype html>
<html data-theme="cupcake">

<head>
  <title>Gardener Recommendation API | Token Create</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div class="min-h-full">
    <nav class="bg-gray-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="{{ route('dashboard') }}"
                  class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                  aria-current="page">Dashboard</a>

                <a href="{{ route('showToken') }}"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Token
                  Generation</a>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <button type="button"
                class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                <span class="sr-only">View notifications</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
              </button>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button"
              class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
              aria-controls="mobile-menu" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <!--
                Heroicon name: outline/menu

                Menu open: "hidden", Menu closed: "block"
              -->
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <!--
                Heroicon name: outline/x

                Menu open: "block", Menu closed: "hidden"
              -->
              <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="{{ route('dashboard') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
            aria-current="page">Dashboard</a>

          <a href="{{ route('showToken') }}"
            class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Token
            Generation</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
          <div class="flex items-center px-5">
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
              <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
            </div>
          </div>
          <div class="mt-3 px-2 space-y-1">
            <a href="#"
              class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign
              out</a>
          </div>
        </div>
      </div>
    </nav>

    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Create Personal Access Token</h1>
      </div>
    </header>
    <main>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
              <form id="createToken" autocomplete="off">
                @csrf
                {{-- error message --}}
                <div id="error"></div>

                {{-- name --}}
                <div class="form-control w-full">
                  <label for="name" class="label">Name</label>
                  <input type="text" class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" name="name" id="name" placeholder="Your Token Name" autofocus>
                </div>

                <div class="mt-4 flex item-center justify-end">
                  <button class="btn group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cusor-pointer" id="createTokenButton">Generate</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    $(document).ready(function() {
      $(document).on('submit', '#createToken', (event) => {
        event.preventDefault();
        loadSpinner('#createTokenButton');

        let name = $('#name').val();

        let params =new FormData();
        params.append('name', name);

        let url = "{{ route('storeToken') }}"
        axios.post(url,params)
        .then(res => {
          if(res.data.success == true){
            $('#error').html(`<div class="flex items-center justify-between py-3 px-5 bg-green-500 text-xs text-white rounded">${res.data.message}<span class="w-5 h-5" onclick=""><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex items-center justify-center rounded-full transition-colors cusor-pointer hover:bg-[rgba(0,0,0,0.2)]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></span></div>`);
          }
          setTimeout(() => {
            window.location = res.data.redirectTo;
          }, 2000);
        })
        .catch(err => {
          removeSpinner('#createTokenButton', 'Generate');
          var errors = err.response.data.errors;
          var msg = "";

          if(errors != undefined) {
            var obj = Object.keys(errors);

            // name
            if(jQuery.inArray('name', obj) != '-1') {
              msg+= errors['name'][0];
            } else {
              msg+= "";
            }
          }

          if(errors){
            $('#error').html(`<div class="flex items-center justify-between py-3 px-5 bg-red-500 text-xs text-white rounded">${msg}<span class="w-5 h-5" onclick=""><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex items-center justify-center rounded-full transition-colors cusor-pointer hover:bg-[rgba(0,0,0,0.2)]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></span></div>`);
          } else {
            $('#error').html("");
          }
        })
      });

      const loadSpinner = (button_field) => {
        $(button_field).attr('disabled', true);
        $(button_field).html('processing...');
      }

      const removeSpinner = (button_field, message) => {
        $(button_field).attr('disabled', false);
        $(button_field).html(message);
      }
    });
  </script>
</body>

</html>
