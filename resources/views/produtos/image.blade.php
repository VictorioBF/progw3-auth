@extends('templates.base')
@section('title', 'Cortar imagem')

@section('content')
<h1>Imagem</h1>
<div>
  <img id="img-crop" src="{{asset('img/' . $prod->image)}}"/>
</div>
<form action="{{ route('produtos.image', $prod) }}" method="post" id="cortar">
  @csrf
  <input type="hidden" name="img" id="img">
  <input type="submit" value="cortar" class="btn btn-primary">
</form>
<script>
  document.querySelector('#cortar').addEventListener('submit', function(e){
    e.preventDefault(); 
    document.querySelector('#img').value = cropper.getCroppedCanvas().toDataURL('image/jpeg');
    this.submit();
  })
</script>
@push('CropperStyles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" integrity="sha512-0SPWAwpC/17yYyZ/4HSllgaK7/gg9OlVozq8K7rf3J8LvCjYEEIfzzpnA2/SSjpGIunCSD18r3UhvDcu/xncWA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('CropperScripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    const cropper = new Cropper(document.getElementById("img-crop"));
  </script>
@endpush

@endsection