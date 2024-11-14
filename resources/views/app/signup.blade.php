{{-- sign-up.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- Preserve your existing favicon --}}
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png">
    
    {{-- Bootstrap CSS --}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css') }}" rel="stylesheet">
    
    {{-- Use the same styles as sign-in.blade.php --}}
    <style>
      :root {
          --primary-blue: #0066FF;
          --input-bg: #F5F5F5;
          --text-muted: #6C757D;
      }
      
      body {
          background-color: #FAFAFA;
          min-height: 100vh;
          font-family: 'Noto Sans', sans-serif;
      }
      
      .auth-container {
          max-width: 460px;
          margin: 2rem auto;
          padding: 1rem;
      }
      
      .brand-logo {
          margin-bottom: 2rem;
      }
      
      .brand-logo img {
          height: 40px;
          width: auto;
      }
      
      .auth-card {
          background: white;
          border-radius: 16px;
          padding: 2rem;
          box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
      }
      
      .auth-title {
          font-size: 1.5rem;
          font-weight: 600;
          margin-bottom: 0.5rem;
      }
      
      .auth-subtitle {
          color: var(--text-muted);
          margin-bottom: 2rem;
      }
      
      .form-control {
          background: var(--input-bg);
          border: none;
          padding: 0.75rem 1rem;
          font-size: 0.95rem;
      }
      
      .form-control:focus {
          background: var(--input-bg);
          box-shadow: 0 0 0 2px var(--primary-blue);
      }
      
      .password-field {
          position: relative;
      }
      
      .password-toggle {
          position: absolute;
          right: 1rem;
          top: 50%;
          transform: translateY(-50%);
          background: none;
          border: none;
          color: var(--text-muted);
          cursor: pointer;
      }
      
      .btn-primary {
          background: var(--primary-blue);
          border: none;
          padding: 0.75rem;
          font-weight: 500;
      }
      
      .btn-primary:hover {
          background: #0052CC;
      }
      
      .auth-links {
          margin-top: 1rem;
          font-size: 0.95rem;
      }
      
      .auth-links a {
          color: var(--primary-blue);
          text-decoration: none;
      }
      
      .is-invalid {
          border-color: #dc3545;
          padding-right: calc(1.5em + 0.75rem);
          background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
          background-repeat: no-repeat;
          background-position: right calc(0.375em + 0.1875rem) center;
          background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
      }
  </style>
</head>
<body>
    @include('sweetalert::alert')
    
    <div class="auth-container">
        <div class="brand-logo">
            <img src="{{ asset('assets/images/logo1.png') }}" alt="Logo">
        </div>
        
        <div class="auth-card">
            <h1 class="auth-title">Sign up to U-consult</h1>
            <p class="auth-subtitle">Fill out the form below to generate a professional invoice</p>
            
            <form method="POST" action="{{ route('register') }}" class="needs-validation">
                @csrf
                
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" 
                           class="form-control @error('first_name') is-invalid @enderror" 
                           id="first_name" 
                           name="first_name" 
                           value="{{ old('first_name') }}"
                           required>
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" 
                           class="form-control @error('last_name') is-invalid @enderror" 
                           id="last_name" 
                           name="last_name" 
                           value="{{ old('last_name') }}"
                           required>
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="other_name" class="form-label">Other Name</label>
                    <input type="text" 
                           class="form-control @error('other_name') is-invalid @enderror" 
                           id="other_name" 
                           name="other_name" 
                           value="{{ old('other_name') }}">
                    @error('other_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <select class="form-control @error('country') is-invalid @enderror" 
                            id="country" 
                            name="country" 
                            required>
                        <option value="">Select your country</option>
                    </select>
                    @error('country')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="password-field">
                        <input type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password"
                               required>
                        <button type="button" class="password-toggle">
                            <i class="bi bi-eye-slash-fill"></i>
                        </button>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="password-field">
                        <input type="password" 
                               class="form-control" 
                               id="password_confirmation" 
                               name="password_confirmation"
                               required>
                        <button type="button" class="password-toggle">
                            <i class="bi bi-eye-slash-fill"></i>
                        </button>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Sign up</button>
                
                <div class="auth-links text-center">
                    Already have an account? <a href="{{ route('sign-in') }}">Sign in here</a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script>
        // Password toggle functionality
        $(document).ready(function() {
            $(".password-toggle").on('click', function() {
                const input = $(this).siblings('input');
                const icon = $(this).find('i');
                
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                    icon.removeClass("bi-eye-slash-fill").addClass("bi-eye-fill");
                } else {
                    input.attr("type", "password");
                    icon.removeClass("bi-eye-fill").addClass("bi-eye-slash-fill");
                }
            });
        });
        
        // Countries API
        document.addEventListener('DOMContentLoaded', function() {
            fetch('https://restcountries.com/v3.1/all?fields=name,cca2')
                .then(response => response.json())
                .then(data => {
                    const countrySelect = document.getElementById('country');
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