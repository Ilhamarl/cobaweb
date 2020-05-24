@extends('layouts.app')

@section('content')

@if (session('status'))
<div id="snackbar" class="notification is-info is-light">
    <button class="delete"></button>
    <strong>Message</strong>
    {{ session('status') }}
</div>
@endif

<div class="columns">

    <div class="column is-one-third">
        <figure class="image is-64x64 is-spaced">
            @if (Auth::user()->punyaProfile)

            <a href="{{ route('userprofile.photo') }}">
                <img class="is-rounded" src="{{ asset('/storage/images/'. $user->punyaProfile->img_photo ) }}">
            </a>
            @else

            <a href="{{ route('userprofile.photo') }}">
                <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
            </a>

            @endif

        </figure>


        <br>
        <p class="title is-3 ">{{ $user->name }}</p>
        <p class="subtitle">
            {{ $user->email }}

            <span class="tag is-info">
                {{ $user->hasRole('customer') ? 'User' : 'Admin' }}
                <!-- 
                -->
            </span>

            <span class="tag is-info">
                {{ $user->punyaProfile(null) ? '' : $user->punyaProfile->gender }}
            </span>
        </p>

        <a href="{{ route('userprofile.edit', $user) }}" class="button is-rounded is-small">
            <span class="icon">
                <i class="fas fa-edit"></i>
            </span>
            <span>Edit Profil</span>
        </a>

        <p class="subtitle">
        </p>

        <aside class="menu container">
            <p class="menu-label">
                My Menu
            </p>
            <ul class="menu-list">
                <li>
                    <a id="open-modal" class="button is-primary modal-button">Launch image modal</a>
                </li>
                <li><a>Order</a></li>
                <li><a>Transaction History</a></li>
            </ul>


            <p class="menu-label">
                Administration
            </p>
            <ul class="menu-list">
                <li><a>Team Settings</a></li>
                <li>
                    <a class="is-active">Manage Your Team</a>
                    <ul>
                        <li><a>Members</a></li>
                        <li><a>Plugins</a></li>
                        <li><a>Add a member</a></li>
                    </ul>
                </li>
                <li><a>Invitations</a></li>
                <li><a>Cloud Storage Environment Settings</a></li>
                <li><a>Authentication</a></li>
            </ul>

        </aside>

    </div>

    <div class="column">

        <div class="box">
            <header class="card-header">
                <p class="card-header-title">
                    Title Card
                </p>
            </header>

            <div class="card-content">
                Kosong
            </div>

            <footer class="level">
                <a href="#" class="level-left button is-text">Reset</a>
                <a href="#" class="level-right button is-primary">Simpan</a>
            </footer>
        </div>

    </div>

</div>

<div id="open-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Modal title</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <!-- Content ... -->
        </section>
        <footer class="modal-card-foot">
            <button class="button is-success">Save changes</button>
            <button class="button">Cancel</button>
        </footer>
    </div>
</div>

<script>
    document.querySelector('a#open-modal').addEventListener('click', function (event) {
        event.preventDefault();
        var modal = document.querySelector('.modal'); // assuming you have only 1
        var html = document.querySelector('html');
        modal.classList.add('is-active');
        html.classList.add('is-clipped');

        modal.querySelector('.modal-background').addEventListener('click', function (e) {
            e.preventDefault();
            modal.classList.remove('is-active');
            html.classList.remove('is-clipped');
        });
    });

</script>

@endsection
