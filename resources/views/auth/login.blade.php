{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<x-app>
<div class="w-75 mx-auto">
  <div style="height: 30vh;"></div>
<h1 class="font-weight-bolder text-center" > Login</h1>
<form method="POST" action="{{ route('login') }}" class="p-2">
    @csrf
    <div class="form-row mt-2">
        <div class="col-md-6">
           
            <input type="text" name='username' class="form-control-lg form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username*">
            @error('username')
                <span>
                  <strong class="text-red">{{$message}}</strong>
                </span>
            @enderror
          </div>
          <div class="col-md-6 ">
           
            <input type="password" name='password' class="form-control-lg form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="password*">
            
            @error('password')
                <span>
                  <strong class="text-red">{{$message}}</strong>
                </span>
            @enderror
          </div>
          
    </div>
    {{-- <div class="form-row justify-content-between">
        <div class="form-check form-check-inline">
            <input class="form-check-input"  type="checkbox" id="inlineCheckbox1" value="Remember Me">
            <label class="form-check-label" for="inlineCheckbox1">Remember Me</label>
          </div>
          <div class="form-check form-check-inline">
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            
          </div>
    </div> --}}
    <div class="row justify-content-center">
      <button type="submit" class="btn bg-color text-color mt-2 mr-1">submit</button>
      {{-- <span class="align-self-center">or</span> --}}
      <button class="btn bg-color text-color mt-2 ml-1"><a class='text-color' href="/register">register</a></button>
    </div>

      
</form>
</div>
{{-- @endsection --}}
</x-app>
