<!doctype html>
<html lang="en" data-bs-theme="blue-theme">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png">


    <!--plugins-->
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/metismenu/mm-vertical.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}">
    <!--bootstrap css-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link
        href="{{ asset('assets/fonts.googleapis.com/css2ab59.css?family=Noto+Sans:wght@300;400;500;600&amp;display=swap') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/fonts.googleapis.com/cssf511.css?family=Material+Icons+Outlined') }}"
        rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/bordered-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/responsive.css') }}" rel="stylesheet">

</head>

<body>
  @include('sweetalert::alert')

  <!--authentication-->

  <div class="mx-3 mx-lg-0">

  <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden border-3 p-4">
    <div class="row g-4">
      <div class="col-lg-6 d-flex">
        <div class="card-body">
          <img src="{{ asset('assets/images/logo1.png')}}" class="mb-4" width="145" alt="">
          <h4 class="fw-bold">Get Started Now</h4>
          <p class="mb-0">Join U Consult Today and Get Paid</p>
     
         
          <div class="form-body mt-4">
            <form class="row g-3" method="POST" action="{{ route('register') }}">
              @csrf
              <div class="col-12">
                  <label for="inputFirstname" class="form-label">First Name</label>
                  <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="inputFirstname" name="first_name" value="{{ old('first_name') }}" required>
                  @error('first_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              
              <div class="col-12">
                  <label for="inputLastname" class="form-label">Last Name</label>
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="inputLastname" name="last_name" value="{{ old('last_name') }}" required>
                  @error('last_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              
              <div class="col-12">
                  <label for="inputOthername" class="form-label">Other Name</label>
                  <input type="text" class="form-control @error('other_name') is-invalid @enderror" id="inputOthername" name="other_name" value="{{ old('other_name') }}">
                  @error('other_name')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              
              <div class="col-12">
                  <label for="inputEmailAddress" class="form-label">Email Address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress" name="email" value="{{ old('email') }}" required>
                  @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="col-12">
                <label for="inputCountry" class="form-label">Country</label>
                <select class="form-select @error('country') is-invalid @enderror" id="inputCountry" name="country" required>
                    <option value="">Select your country</option>
                </select>
                @error('country')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
              
              <div class="col-12">
                  <label for="password" class="form-label">Password</label>
                  <div class="input-group @error('password') is-invalid @enderror" id="show_hide_password">
                      <input type="password" class="form-control border-end-0" id="password" name="password" required>
                      <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                  </div>
                  @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
              
              <div class="col-12">
                  <label for="password_confirmation" class="form-label">Confirm Password</label>
                  <div class="input-group" id="show_hide_password_confirmation">
                      <input type="password" class="form-control border-end-0" id="password_confirmation" name="password_confirmation" required>
                      <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                  </div>
              </div>
              
              <div class="col-12">
                  <div class="d-grid">
                      <button type="submit" class="btn btn-grd-info">Sign Up</button>
                  </div>
              </div>
              
              <div class="col-12">
                  <div class="text-start">
                      <p class="mb-0">Already have an account? <a href="{{ route('sign-in') }}">Sign in here</a></p>
                  </div>
              </div>
          </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6 d-lg-flex d-none">
        <div class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center bg-grd-info">
          <img src="{{ asset('assets/images/auth/register1.png')}}" class="img-fluid" alt="">
        </div>
      </div>
    </div><!--end row-->
  </div>

</div>

<!--authentication-->




    <!--bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/metisMenu.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script> --}}
    <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>

  <script>
    $(document).ready(function () {
      $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bi-eye-slash-fill");
          $('#show_hide_password i').removeClass("bi-eye-fill");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bi-eye-slash-fill");
          $('#show_hide_password i').addClass("bi-eye-fill");
        }
      });
    });
  </script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      fetch('https://restcountries.com/v3.1/all?fields=name,cca2')
          .then(response => response.json())
          .then(data => {
              const countrySelect = document.getElementById('inputCountry');
              data.sort((a, b) => a.name.common.localeCompare(b.name.common));
              data.forEach(country => {
                  const option = document.createElement('option');
                  option.value = country.cca2;
                  option.textContent = country.name.common;
                  countrySelect.appendChild(option);
              });
          })
          .catch(error => console.error('Error fetching countries:', error));
  });
  </script>

</body>


</html>