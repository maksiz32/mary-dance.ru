@if ($paginator->hasPages())
  <ul class="pagination">
    @foreach ($elements as $element)
      @if (is_string($element))
      {{ $element }}&nbsp;&nbsp;
      @endif

      @if (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
          <li class="page-item disabled"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
          @else
          <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
          @endif
        @endforeach
      @endif
    @endforeach
  </ul>
@endif
