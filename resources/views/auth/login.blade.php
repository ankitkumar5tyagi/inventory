<x-Layout>
    <h1>Login</h1>
    <form class="flex-1" method="POST" action="{{ route('login.submit') }}">
        @csrf
        <div class="inputdiv">
            <label for="email" class="block text-sm font-medium text-gray-700">Email: </label>
            <input type="text" name="email" id="email" @error('email') style="border-color: red;"@enderror>
            @error('email')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="password" class="block text-sm font-medium text-gray-700">Password: </label>
            <input type="password" name="password" id="password" @error('password') style="border-color: red;"@enderror>
            @error('password')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        <div class="inputdiv">
            <input class="w-4 h-4" type="checkbox" name="remember" id="remember">
        <label class="form-check-label" for="remember">
            Remember Me
        </label>
            @error('remember')
                <span class="text-red-600">{{$message}}</span>
            @enderror
        </div>
        @session('error')
            <p class="text-red-600">{{session('error')}}</p>
        @endsession

        <input class="btn" type="submit" value="Login">
    </form>
</x-Layout>