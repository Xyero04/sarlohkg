@extends('layout')

@section('title', 'Kitchen')

@section('data')
<nav class="navbar md:navbar-expand bg-1">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer" data-bs-target="#navbarDrawer" aria-controls="navbarDrawer" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" aria-hidden="true"></span>
    </button>
    <dialog class="drawer drawer-end" tabindex="-1" id="navbarDrawer" aria-labelledby="navbarDrawerLabel">
      <div class="drawer-header">
        <h5 class="drawer-title" id="navbarDrawerLabel">Sar Loh Kg</h5>
        <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
      </div>
      <div class="drawer-body mb-2 md:mb-0">
        <ul class="nav navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Burmese Traditional Food</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Western Food</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Drink & Beverages</a>
          </li>
        </ul>
        <form class="hstack gap-2" role="search">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search"/>
          <button class="btn-solid btn-icon theme-secondary" type="submit">
            <svg class="bi" width="16" height="16"><use href="#search" /></svg>
          </button>
        </form>
      </div>
    </dialog>
  </div>
</nav>

<div class="body_part mt-3">
    <img src="{{ asset('foodphoto/cover.jpg') }}" class="img-fluid" alt="cover_photo">
</div>
@endsection