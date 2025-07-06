<x-Layout>
    <div class=" w-4/5 m-auto p-10">
    <h1> Register New Account </h1>
    <form class="flex-1" method="POST" action="{{ route('register.submit') }}">
        @csrf
        <div class="inputdiv">
            <label for="name" >Name: </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" @error('name') style="border-color: red;"@enderror>
            @if ($errors->has('name'))
                <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="inputdiv">
            <label for="email" >Email: </label>
            <input type="text" name="email" id="email" value="{{ old('email') }}" @error('email') style="border-color: red;"@enderror>
             @if ($errors->has('email'))
                <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="inputdiv">
            <label for="password" >Password: </label>
            <input type="password" name="password" id="password" @error('password') style="border-color: red;"@enderror>
            @error('password')
                <span class="text-red-500 text-sm">{{$message}}</span>
            @enderror
        </div>

        <div class="inputdiv">
            <label for="password_confirmation" >Confirm Password: </label>
            <input type="password" name="password_confirmation" id="password_confirmation" @error('password') style="border-color: red;"@enderror>
        </div>

        <input class="btn" type="submit" value="Register">
    </form>
    </div>
</x-Layout>