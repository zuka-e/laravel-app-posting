@canany(['update', 'delete'], $val) {{-- 一つでも権限があれば表示 --}}
  <div class="mb-4 text-right">
    <a class="btn btn-primary" href="{{ route($column.'s.edit', [$column => $val]) }}">編集</a>
    <form method="POST" action="{{ route($column.'s.destroy', [$column => $val]) }}"
    style="display: inline-block;">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger">削除</button>
    </form>
  </div>
@endcanany
