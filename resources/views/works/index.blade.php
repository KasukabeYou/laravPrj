@extends('layouts.common_work')

@section('title', 'Technical Diary -Works-')

@section('content')
  <div class="py-5 bg-light profileSt">
    <section id="profile">
      <div class="container">
        <div class="alert alert-danger" role="alert">
        　各機能を使用することによるいかなる問題も、当サイトは一切の責任を負いません。<br/>
        　SNSアカウントなどのご使用の際にはご注意ください。
        </div>
        <h3 class="text-center mb-3">@lang('messages.work.list')</h3>
        <div class="card text-center text-dark w-75 mx-auto">
          <div class="topdesign">
            <table>
              <tbody>
                  <tr>
                      <th rowspan="2">メンバー管理処理</th>
                      <td>
                        会員登録、会員編集、会員退会、会員一覧、会員詳細が確認出来るようになっております。<br/>
                        ログイン後は会員一覧のリンクに変わり、一覧画面へ遷移後に編集・退会・詳細のリンクがあります。<br/>
                        会員一覧には今まで登録した会員が全て表示されますので、登録の際にはご注意ください。
                      </td>
                  </tr>
                  <tr rowspan="2">
                      <td>
                      @guest
                        <a href="{{ route('member.signup') }}">@lang('messages.member.regist')</a>
                      @else
                        <a href="{{ route('member.show') }}">一覧参照</a>
                      @endguest
                      </td>
                  </tr>
                  <tr>
                      <th rowspan="2">ログイン/ログアウト処理</th>
                      <td>
                        ログイン/ログアウト機能になります。<br/>
                        ログイン時は当サイトで作成した会員の他にSNSアカウントでいくつかログインすることが可能です。<br/>
                        SNSでのログイン時にはDBにメールアドレス等が登録されますので、ログインする際は捨てアカウントなど影響がないものを使用することをお勧めいたします。
                      </td>
                  </tr>
                  <tr>
                      @guest
                        <td><a href="{{ route('login') }}">@lang('messages.login')</a></td>
                      @else
                        <td>
                          @lang('messages.username')：{{ Auth::user()->name }}<br/>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              @lang('messages.logout')
                          </a>
  
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                        </td>
                      @endguest
                  </tr>
                  <tr>
                      <th rowspan="2">OpenWeather</th>
                      <td>
                        こちらはOpenWeatherというAPIより天気の情報を取得して、その内容を表示している機能になります。<br/>
                        現在は改修中となります。
                      </td>
                  </tr>
                  <tr>
                      <td><a href="{{ route('weather.index') }}">天気の情報を表示</a></td>
                  </tr>
                  <!--<tr>-->
                  <!--    <td>ログイン（AZURE AD使用）</td>-->
                  <!--    <td><a href="{{ route('top') }}">作成中</a></td>-->
                  <!--</tr>-->
                  <tr>
                      <th>ぐるなびAPI</th>
                      <td><a href="{{ route('gurunavi.index') }}">ぐるなびAPI</a></td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@section('footer')
    <!-- ナビゲーション -->
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection