<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <br>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif

    <br><br><br>


    <form action="{{ route('linkedin.post') }}" method="POST" class="form container" enctype="multipart/form-data">
        @csrf
        <textarea name="postinput" class="form-control" placeholder="Type Some text for post"></textarea><br>
        <button type="submit" class="btn btn-primary">Post on LinkedIn</button>
    </form>


</x-app-layout>