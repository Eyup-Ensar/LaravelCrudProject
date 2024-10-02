@if (App::getLocale()==='tr')
<a class="nav-link" href="/dilDegistir">İngilizce</a>
@else
    <a class="nav-link" href="/dilDegistir">Turkish</a>
@endif
<form action="{{ route('panel.register') }}" method="POST">
  @csrf
  <div>
      <label for="kulad">{{__('project.kulad')}}</label>
      <input type="text" name="kulad" required>
  </div>
  <div>
      <label for="password">{{__('project.sifre')}}</label>
      <input type="password" name="password" required>
  </div>
  <div>
      <label for="password_confirmation">{{__('project.sifreonay')}}</label>
      <input type="password" name="password_confirmation" required>
  </div>
  <button type="submit">{{__('project.kayit')}}</button>
</form>