<!doctype html>
<html data-theme="cupcake">

<head>
  <title>Gardener Recommendation API | Dashboard</title>
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
        <h1 class="text-3xl font-bold text-gray-900">Your Personal Access Token</h1>
      </div>
    </header>
    <main>
      <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
          <p class="mb-8">
            <a href="{{ route('showToken') }}" class="btn btn-outline btn-accent">Create new token</a>
          </p>

          @if (count($tokens) > 0)
          <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">S/N
                        </th>
                        <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last used
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Action</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach ($tokens as $key => $token)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          {{ $key + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          {{ $token->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          {{ $token->last_used_at ? $token->last_used_at->diffForHumans() : 'Not Used'}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                      <!-- More people... -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          @else
            <p class="text-center">You dont have Personal Access Token</p>
          @endif
        </div>
        <!-- /End replace -->
      </div>
    </main>

    @if(session()->has('token'))
    <div class="modal">
      <div class="modal-box">
        <h3 class="font-bold text-lg">Personal Access Token</h3>
        <p class="py-4">
          This is your access token <span class="font-bold">(BEARER TOKEN)</span> and it can only be seen once after generation, so you are to copy down your access token for api authorization
        </p>
        <br>
        <p class="py-4">
          BEARER TOKEN: <span class="font-bold">{{ session()->get('token') }}</span>
          <span class="mt-2">This is your bearer token and it should be used via postman.</span>
        </p>
        <div class="modal-action">
          <label for="my-modal" id="closeModal" class="btn btn-sm group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cusor-pointer">close!</label>
        </div>
      </div>
    </div>
    @endif
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
  @if(session()->has('token'))
  <script>
    $(document).ready(function() {
      $(".modal").addClass("modal-open");

      $(document).on('click', '#closeModal', () => {
        $('.modal').removeClass("modal-open");
      })
    });
  </script>
  @endif
</body>

</html>
