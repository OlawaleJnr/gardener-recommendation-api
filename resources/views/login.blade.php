<!doctype html>
<html data-theme="bumblebee">

<head>
  <title>Gardener Recommendation API | Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          to
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Gardener Recommendation API Access </a>
        </p>
      </div>
      <form class="mt-8 space-y-6" id="login" autocomplete="off">
        @csrf
        {{-- error message --}}
        <div id="error"></div>

        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email" class="sr-only">Email address</label>
            <input id="email" name="email" type="email"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Email address">
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Password">
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember-me" name="remember-me" type="checkbox"
              class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
            <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
          </div>

          <div class="text-sm">
            <a href="javascript:void(0)" class="font-medium text-indigo-600 hover:text-indigo-500"> Forgot your password? </a>
          </div>
        </div>

        <div>
          <button type="submit" id="loginButton"
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Sign in
          </button>
        </div>
      </form>
    </div>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    $(document).ready(() => {
      $(document).on('submit', '#login', (event) => {
        event.preventDefault();
        loadSpinner('#loginButton');

        let email = $('#email').val();
        let password = $('#password').val();

        let params =new FormData();
        params.append('email', email);
        params.append('password', password);

        let url = "{{ route('auth.login') }}"
        axios.post(url,params)
        .then(res => {
          setTimeout(() => {
            window.location = res.data.redirectTo;
          }, 2000);
        })
        .catch(err => {
          removeSpinner('#loginButton', 'Sign in');
          // checking for group errors
          var errors = err.response.data.errors;
          var msg = "";

          if(errors != undefined) {
            var obj = Object.keys(errors);

            // email
            if(jQuery.inArray('email', obj) != '-1') {
              msg+= errors['email'][0]+" <br>";
            } else {
              msg+= "";
            }

            // password
            if(jQuery.inArray('password', obj) != '-1') {
              msg+= errors['password'][0]+" <br>";
            } else {
              msg+= "";
            }
          }

          if(errors){
            $('#error').html(`<div class="flex items-center justify-between py-3 px-5 bg-red-500 text-xs text-white rounded">${msg}<span class="w-5 h-5" onclick=""><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex items-center justify-center rounded-full transition-colors cusor-pointer hover:bg-[rgba(0,0,0,0.2)]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></span></div>`);
          }else if(err.response.data.error != null) {
            $('#error').html(`<div class="flex items-center justify-between py-3 px-5 bg-red-500 text-xs text-white rounded">${err.response.data.error} <span class="w-5 h-5 flex items-center justify-center rounded-full transition-colors cusor-pointer hover:bg-[rgba(0,0,0,0.2)]" onclick=""><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></span></div>`);
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
