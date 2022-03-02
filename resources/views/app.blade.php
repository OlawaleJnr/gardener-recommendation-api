<!doctype html>
<html>

<head>
  <title>Gardener Recommendation API | Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
      <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
        <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
          fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
          <polygon points="50,0 100,0 50,100 0,100" />
        </svg>

        <div>
          <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
            <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
              <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                <div class="flex items-center justify-between w-full md:w-auto">
                  <a href="#">
                    <span class="sr-only">Workflow</span>
                    <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg">
                  </a>
                  <div class="-mr-2 flex items-center md:hidden">
                    <button type="button"
                      class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                      aria-expanded="false">
                      <span class="sr-only">Open main menu</span>
                      <!-- Heroicon name: outline/menu -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
                <a href="#" class="font-medium text-gray-500 hover:text-gray-900">Features</a>

                @guest
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Log in</a>
                @endguest

                @auth
                <a href="{{ route('dashboard') }}"
                  class="font-medium text-indigo-600 hover:text-indigo-500">Dashboard</a>
                @endauth
              </div>
            </nav>
          </div>

          <!--
          Mobile menu, show/hide based on menu open state.

          Entering: "duration-150 ease-out"
            From: "opacity-0 scale-95"
            To: "opacity-100 scale-100"
          Leaving: "duration-100 ease-in"
            From: "opacity-100 scale-100"
            To: "opacity-0 scale-95"
        -->
          <div class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
            <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
              <div class="px-5 pt-4 flex items-center justify-between">
                <div>
                  <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                </div>
                <div class="-mr-2">
                  <button type="button"
                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Close main menu</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>
              <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#"
                  class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Features</a>
              </div>
              @guest
              <a href="{{ route('login') }}"
                class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100"> Log
                in </a>
              @endguest

              @auth
              <a href="{{ route('dashboard') }}"
                class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
                Dashboard </a>
              @endauth
            </div>
          </div>
        </div>

        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
          <div class="sm:text-center lg:text-left">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
              <span class="block xl:inline">Gardener Recommendation API</span>
              <span class="block text-indigo-600 xl:inline">by Talabi Ayomide</span>
            </h1>
            <p
              class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
              Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet
              fugiat veniam occaecat fugiat aliqua.</p>
            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
              <div class="rounded-md shadow">
                <a href="#"
                  class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                  Get started </a>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
      <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
        src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80"
        alt="">
    </div>
  </div>

  <div class="bg-white py-6 sm:px-6 lg:px-7">
    <!-- Replace with your content -->
    <div class="overflow-hidden shadow-sm sm:rounded-lg p-4 bg-stone-50">
      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">Gardener Recommendation Documentation</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">Documentation:</p>
        </div>
        <div class="border-t border-gray-200">
          <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Credentials:</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <span>email:</span> admin@edenlife.com
                <br>
                <span>password:</span> password
              </dd>
            </div>
          </dl>
        </div>
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">API URL</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500 font-bold">The listed APIs should be run on postman application with a generated bearer token:</p>
          <p class="text-sm text-red-500">Note: Bearer token can only be gotten from the dashboard after authentication <br> Auth Credentials have been provided above to get started in getting your personal access token (bearer token)</p>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Get all Customers and its assigned Gardeners :</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <span>URL: {{ url('/')."/api/v1/customers"}}</span>
            <br>
            <span>Method: GET</span>
          </dd>
        </div>
        <hr>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Create a Customer and automatically get assigned to a gardener based on country:</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <span>URL: {{ url('/')."/api/v1/customer/register"}}</span>
            <br>
            <span>Method: POST</span>
            <br>
            <pre class="mr-4 text-indigo-700">
              params : {
                name: "Talabi Ayomide"
                "email": "admin@edenlife.com"
                "country_id" 1,   // Nigeria
                "state": "Lagos",
                "city": "Surulere"
              }
            </pre>
          </dd>
        </div>
        <hr>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Update a customer :</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <span>{{ url('/')."/api/v1/customer/update/{customer}"}}</span>
            <br>
            <span>Method: PUT</span>
            <br>
            <pre class="mr-4 text-indigo-700">
              params : {
                name: "John Doe"
              }

              route-binding: {
                customer: 1 // customer_id (This field accept only ID)
              }
            </pre>
          </dd>
        </div>
        <hr>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Get a single Customer :</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <span>URL: {{ url('/')."/api/v1/customer/{customer}"}}</span>
            <br>
            <span>Method: GET</span>
            <br>
            <pre class="mr-4 text-indigo-700">
              params : {
                name: "John Doe"
              }

              route-binding: {
                customer: 1 // customer_id (This field accept only ID)
              }
            </pre>
          </dd>
        </div>
        <hr>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Get all Gardeners :</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <span>URL: {{ url('/')."/api/v1/gardeners"}}</span>
            <br>
            <span>Method: GET</span>
          </dd>
        </div>
        <hr>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Create a Gardener :</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <span>URL: {{ url('/')."/api/v1/gardener/register"}}</span>
            <br>
            <span>Method: POST</span>
            <pre class="mr-4 text-indigo-700">
              params : {
                name: "Talabi Ayomide"
                "email": "admin@edenlife.com"
                "country_id" 2,   // Kenya
                "state": "Nairobi",
                "city": "Brookside"
              }
            </pre>
          </dd>
        </div>
        <hr>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Get List of Gardeners in a Country :</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <span>URL: {{ url('/')."/api/v1/gardener/{country}"}}</span>
            <br>
            <span>Method: GET</span>
            <pre class="mr-4 text-indigo-700">
              route-binding : {
                country: ng // Nigeria Country code  (This field accepts country code only)
              }

              route-binding : {
                country: ke // Kenya Country code (This field accepts country code only)
              }
            </pre>
          </dd>
        </div>
        <hr>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Update Gardener :</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <span>URL: {{ url('/')."/api/v1/gardener/update/{gardener}"}}</span>
            <br>
            <span>Method: PUT</span>
            <pre class="mr-4 text-indigo-700">
              params : {
                name: "John Doe"
              }

              route-binding : {
                gardener: 1 // gardener_id (This field accept only ID)
              }
            </pre>
          </dd>
        </div>
      </div>
    </div>
  </div>
</body>

</html>