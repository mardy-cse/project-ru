<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

        <style>
            :root {
                --primary: #4f46e5;
                --primary-light: #6366f1;
                --secondary: #10b981;
                --dark: #1e293b;
                --light: #f8fafc;
                --error: #ef4444;
                --success: #10b981;
                --text-muted: #64748b;
            }
            
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }
            
            body {
                font-family: 'Poppins', 'Instrument Sans', sans-serif;
                background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                padding: 20px;
            }
            
            .login-container {
                background-color: white;
                padding: 2.5rem;
                border-radius: 12px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
                width: 100%;
                max-width: 420px;
                position: relative;
                overflow: hidden;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            
            .login-container:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
            }
            
            .login-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 5px;
                background: linear-gradient(90deg, var(--primary), var(--secondary));
            }
            
            .login-title {
                text-align: center;
                font-size: 1.75rem;
                font-weight: 600;
                margin-bottom: 2rem;
                color: var(--primary);
                position: relative;
            }
            
            .login-title::after {
                content: '';
                position: absolute;
                bottom: -10px;
                left: 50%;
                transform: translateX(-50%);
                width: 50px;
                height: 3px;
                background: linear-gradient(90deg, var(--primary), var(--secondary));
                border-radius: 3px;
            }
            
            .form-group {
                margin-bottom: 1.75rem;
                position: relative;
            }
            
            label {
                display: block;
                margin-bottom: 0.75rem;
                font-weight: 500;
                color: var(--dark);
                font-size: 0.9375rem;
            }
            
            input {
                width: 100%;
                padding: 0.875rem 1rem;
                border: 2px solid #e2e8f0;
                border-radius: 8px;
                font-size: 1rem;
                transition: all 0.3s ease;
                background-color: var(--light);
            }
            
            input:focus {
                outline: none;
                border-color: var(--primary-light);
                box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
            }
            
            .login-btn {
                width: 100%;
                padding: 0.875rem;
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                margin-top: 1rem;
                box-shadow: 0 4px 6px rgba(79, 70, 229, 0.2);
            }
            
            .login-btn:hover {
                background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
                transform: translateY(-2px);
                box-shadow: 0 6px 12px rgba(79, 70, 229, 0.25);
            }
            
            .login-btn:active {
                transform: translateY(0);
            }
            
            .remember-me {
                display: flex;
                align-items: center;
                margin: 1.5rem 0;
            }
            
            .remember-me input {
                width: auto;
                margin-right: 0.75rem;
                accent-color: var(--primary);
            }
            
            .remember-me label {
                margin-bottom: 0;
                color: var(--text-muted);
                font-size: 0.9375rem;
            }
            
            .links-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 1.5rem;
                padding-top: 1.5rem;
                border-top: 1px solid #e2e8f0;
            }
            
            .auth-link {
                color: var(--text-muted);
                text-decoration: none;
                font-size: 0.875rem;
                font-weight: 500;
                transition: all 0.2s ease;
            }
            
            .auth-link:hover {
                color: var(--primary);
                text-decoration: underline;
            }
            
            .status-message {
                padding: 0.75rem;
                border-radius: 8px;
                margin-bottom: 1.5rem;
                font-size: 0.9375rem;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
            }
            
            .status-message.success {
                background-color: rgba(16, 185, 129, 0.1);
                color: var(--success);
            }
            
            .error-message {
                color: var(--error);
                font-size: 0.8125rem;
                margin-top: 0.5rem;
                display: flex;
                align-items: center;
            }
            
            .error-message svg {
                width: 14px;
                height: 14px;
                margin-right: 4px;
            }
            
            .branding {
                text-align: center;
                margin-top: 2rem;
                font-size: 0.875rem;
                color: var(--text-muted);
            }
            
            .branding a {
                color: var(--primary);
                text-decoration: none;
                font-weight: 600;
            }
            
            @media (max-width: 480px) {
                .login-container {
                    padding: 1.75rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <h1 class="login-title">Welcome Back</h1>

            <!-- Session Status -->
            @if (session('status'))
                <div class="status-message success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ session('status') }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="your@email.com">
                    @error('email')
                        <span class="error-message">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                
                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
                    @error('password')
                        <span class="error-message">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                
                <!-- Remember Me -->
                <div class="remember-me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Remember me</label>
                </div>
                
                <button type="submit" class="login-btn">Sign In</button>
                
                <div class="links-container">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="auth-link">
                            Forgot password?
                        </a>
                    @endif
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="auth-link">
                            Create account
                        </a>
                    @endif
                </div>
            </form>
            
            <div class="branding">
                © {{ date('Y') }} Your Company. All rights reserved.
            </div>
        </div>
    </body>
</html>