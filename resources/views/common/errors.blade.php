@if ($errors->has($el))
  <div class="alert alert-warning" role="alert">{{ $errors->first($el) }}</div>
@endif
