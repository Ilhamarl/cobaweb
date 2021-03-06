@extends('layouts.app')

@section('content')



<section class="container pt-3">

    <h1 class="my-4">
        Buat Trip
    </h1>

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">


        <div class="form-group">
            <label for="name">Event Name</label>
            <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" required minlength="4" autocomplete="name" placeholder="Judul Trips / Event" autofocus />

            @error('name')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" autocomplete="description" placeholder="Berikan gambaran Perjalanan yang akan peserta kunjungi"
                autofocus>{{ old('description') }}</textarea>

            <span class="pull-right label label-default" id="count_char"></span>

            @error('description')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>


        <hr class="my-3" style="border-top: 8px solid rgba(0, 0, 0, 0.05); border-radius: 2px;">

        <div class="row">
            <div class="form-group col-md-3">
                <label for="start_at">Start Date</label>
                <input name="start_at" id="date_start" value="" type="text" class="form-control @error('start_at') is-invalid @enderror" placeholder="Tanggal Pendakian" />

                @error('start_at')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="finish_at">Finish Date</label>
                <input name="finish_at" id="date_end" value="" type="text" class="form-control @error('finish_at') is-invalid @enderror" placeholder="Tanggal Turun" />
                @error('finish_at')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <hr class="my-3" style="border-top: 8px solid rgba(0, 0, 0, 0.05); border-radius: 2px;">

        <div class="row">
            <div class="form-group col-md-3">
                <label for="price">Price</label>
                <input name="price" id="price" value="{{ old('price') }}" type="number" format='000.00' class="form-control @error('price') is-invalid @enderror" placeholder="Rp" >
                
                
                @error('price')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="total_participant">Total Participant</label>
                <input name="total_participant" id="total_participant" value="{{ old('total_participant') }}" type="number" class="form-control @error('total_participant') is-invalid @enderror" placeholder="Jumlah Peserta" />
                @error('total_participant')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="meet_point">Meet Point</label>
            <input name="meet_point" id="meet_point" value="{{ old('meet_point') }}" type="text" class="form-control @error('meet_point') is-invalid @enderror" required autocomplete="meet_point" placeholder="Tentukan Nama Lokasi Titik Temu Peserta"
                autofocus />
            @error('meet_point')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="facility">Facility</label>
            <textarea name="facility" id="facility" class="form-control @error('facility') is-invalid @enderror" autocomplete="facility" placeholder="Masukkan fasilitas" autofocus>{{ old('facility') }}</textarea>
            @error('facility')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Terms & Condition</label>
            <textarea name="terms_condition" id="terms_condition" class="form-control @error('terms_condition') is-invalid @enderror" autocomplete="terms_condition" placeholder="Syarat & Ketentuan Trips"
                autofocus>{{ old('terms_condition') }}</textarea>
            @error('terms_condition')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            <img id="imagePreview" class="image-uploaded mb-4" style="border: 1px #000000; border-radius: 8px;" src="https://bulma.io/images/placeholders/128x128.png" style="object-fit: cover;" alt="Image Upload" />

            <div id="file-js-example" class="custom-file">
                <input type="file" name="img" id="imgInp" value="{{ old('img') }}" class="custom-file-input @error('img') is-invalid @enderror" required />
                <label class="file-name custom-file-label" for="imgInp">No file uploaded</label>

                @error('img')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <!-- Seller
        <div class="field">
            <label class="label" for="">Seller</label>
            <div class="control">
                <div class="select is-rounded">
                    <select name="seller_id">
                        @foreach($seller as $data) <option value="{{ $data->id }}">{{ $data->name }}</option> @endforeach
                    </select>
                </div>
            </div>
        </div>
        -->

        @csrf
        <button type="submit" class="btn btn-primary mt-1">
            Simpan
        </button>

    </form>

</section>

<script>
    CKEDITOR.replace( 'facility' );
    CKEDITOR.replace( 'terms_condition' );
</script>

@endsection