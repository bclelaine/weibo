<form action="{{ route('statuses.store') }}" method="POST">
  @include('shared._errors')
  {{ csrf_field() }}
  <textarea class="form-control" rows="3" placeholder="聊聊新鲜事儿..." name="content">{{ old('content') }}</textarea>
  <div class="text-end">
    <span>
      <a href="{{ route('help') }}" class="btn btn-link mt-3">点击进入deepseek^^</a>
    </span>
    <button type="submit" class="btn btn-primary mt-3">发布</button>
  </div>
</form>
