@if ($errors->any())
<ul class="error-form">
    @foreach ($errors->all() as $error)
        <li class="error-form-item">{{ $error }}</li>
    @endforeach
</ul>

@endif
