@extends('layouts.app')

@section('content')


<section class="container">
    <nav aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb bg-white px-0">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}" class="">
                    <i data-feather="arrow-left" width="16" height="16"></i> Back</a>
            </li>
            <li class="breadcrumb-item active text-truncate" aria-current="page">{{ $pagename }}</li>
        </ol>
    </nav>


    <h1 class="my-4">
        Edit Trips - {{ $product->name }}
    </h1>


    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" class="">
        @csrf
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="">Event Name</label>
            <input value="{{ $product->name }}" name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" placeholder="Judul Trips / Event" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" autocomplete="description" placeholder="Berikan gambaran Perjalanan yang akan peserta kunjungi"
                autofocus>{{ $product->description }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="row">
            <div class="form-group col">
                <label for="">Price</label>
                <input value="{{ $product->price }}" name="price" id="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Rp.">
                @error('price')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="">Total Participant</label>
                <input value="{{ $product->total_participant }}" name="total_participant" id="total_participant" type="number" class="form-control @error('total_participant') is-invalid @enderror" placeholder="Jumlah Peserta" />
                @error('total_participant')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <hr class="my-3" style="border-top: 8px solid rgba(0, 0, 0, 0.05); border-radius: 2px;">

        <div class="row">
            <div class="form-group col-md-3">
                <label for="start_at">Start Date</label>
                <input name="start_at" id="date_start" value="{{ date('yy-m-d',strtotime($product->start_at)) }}" type="text" class="form-control @error('start_at') is-invalid @enderror" placeholder="Tanggal Pendakian" />

                @error('start_at')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="finish_at">Finish Date</label>
                <input name="finish_at" id="date_end" value="{{ date('yy-m-d',strtotime($product->finish_at)) }}" type="text" class="form-control @error('finish_at') is-invalid @enderror" placeholder="Tanggal Turun" />
                @error('finish_at')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <hr class="my-3" style="border-top: 8px solid rgba(0, 0, 0, 0.05); border-radius: 2px;">


        <div class="form-group">
            <label for="meet_point">Meet Point</label>
            <input value="{{ $product->meet_point }}" name="meet_point" id="meet_point" type="text" class="form-control @error('meet_point') is-invalid @enderror" required autocomplete="meet_point"
                placeholder="Tentukan Nama Lokasi Titik Temu Peserta" autofocus>
            @error('meet_point')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            <label for="">Facility</label>
            <textarea name="facility" id="name" class="form-control @error('facility') is-invalid @enderror">{{ $product->facility }}</textarea>
            @error('facility')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Terms & Condition</label>
            <textarea name="terms_condition" id="terms_condition" class="form-control @error('terms_condition') is-invalid @enderror" autocomplete="terms_condition" placeholder="Syarat & Ketentuan Trips"
                autofocus>{{ $product->terms_condition }}</textarea>
            @error('terms_condition')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            @if(!$product->img)
            <img id="imagePreview" class="image-uploaded mb-4" src="https://bulma.io/images/placeholders/128x128.png" style="border: 1px #000000; border-radius: 8px; object-fit: cover;" alt="Image Upload">
            @else
            <img id="imagePreview" class="image-uploaded mb-4" src="{{ asset('/uploads/products/'. $product->img ) }}" style="border: 1px #000000; border-radius: 8px; object-fit: cover;" alt="Image Upload">
            @endif

            <div id="file-js-example" class="custom-file">
                <input type="file" name="img" value="{{ $product->img }}" id="imgInp" class="custom-file-input @error('img') is-invalid @enderror" />
                <label class="file-name custom-file-label text-truncate" for="imgInp">{{ $product->img }}</label>

                @error('img')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary mt-1">
                    Simpan
                </button>
            </div>

            <div class="col">
               
            </div>
        </div>

    </form>
</section>


<script>
    CKEDITOR.replace( 'facility' );
    CKEDITOR.replace( 'terms_condition' );
</script>



@endsection