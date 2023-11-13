@extends('layouts.app')

@section('content')

{{-- <div class="container"> --}}
  <div class="row">
    <div class="col-md-3">
      @include('admin.partials.sidebar')
    </div>
      
    
    <div class="col-md-8 justify-content-center vh-100">
          <h2 class="fs-4 text-secondary my-4">
              {{ __('Welcome Claudio !') }}
          </h2>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
          @endif
          
          <div class="row justify-content-center">
              <div class="col">
                  <div class="card">
                      <div class="card-body">
                          <h3>Total Projects</h3>
                          <strong>{{$total_projects}}</strong>                    
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

    
</div>
@endsection

{{-- <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Company name</a>
    <div id="app">

    <div class="container-fluid">
    <div class="row">
      <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
        <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3">
            
          </div>
        </div>
      </div>
  
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        
        <h2>Section title</h2>
        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1,001</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
              </tr>
              <tr>
                <td>1,002</td>
                <td>placeholder</td>
                <td>irrelevant</td>
                <td>visual</td>
                <td>layout</td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  </header> --}}
  
  