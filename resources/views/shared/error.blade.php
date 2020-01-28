@if ($errors->any())
  <div class="alert alert-danger">
    <ul style="margin-block-end: 0em;">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
