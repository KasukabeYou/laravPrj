@extends('layouts.common')

@section('title', 'Technical Diary')

@section('content')
  <!-- Top -->
  <!--<div id="topSet">-->
  <div class="flex card bg-dark text-white">
    <img class="card-img top-img" src="../img/top_b.jpg" alt="トップ画像">
    <div class="d-flex align-items-center  justify-content-center card-img-overlay">
      <h1>@lang('messages.welcome')</h1>
    </div>
  </div>
  <!--</div>-->
  <!-- Profile -->
  <div id="profileSt"></div>
  <div class="py-5 bg-light profileSt">
    <section id="profile">
      <div class="container">
        <h3 class="text-center mb-3">@lang('messages.profile')</h3>
        <div class="card text-center text-dark w-75 mx-auto">
          <div class="topdesign">
            <table>
              <tbody>
                <tr>
                    <th>名前</th>
                    <td colspan="2">春日部　コウ</td>
                </tr>
                <tr>
                    <th>経歴</th>
                    <td colspan="2">IT業界で10年以上、携わっており開発・設計をメインでWEB・業務エンジニアとして活動中です。<br/>
                    勉強会なども実施しており、インストラクターとしてプログラミングの指導も行っております。</td>
                </tr>
                <tr>
                    <th rowspan="6">対応言語</th>
                    <td style="width:40%">HTML・CSS</td>
                    <td style="width:40%">5年以上</td>
                </tr>
                <tr>
                    <td>JavaScript・JQuery</td>
                    <td>5年以上</td>
                </tr>
                <tr>
                    <td>JAVA</td>
                    <td>5年以上</td>
                </tr>
                <tr>
                    <td>PHP</td>
                    <td>3年以上</td>
                </tr>
                <tr>
                    <td>Ruby</td>
                    <td>1年～3年未満</td>
                </tr>
                <tr>
                    <td>Python</td>
                    <td>1年～3年未満</td>
                </tr>
                <tr>
                    <th>URL</th>
                    <td colspan="2">（勉強会 ※ただいま休止中）<a href="https://mokumoku0mattari.connpass.com/event/165427/?utm_campaign=event_participate_to_owner&utm_source=notifications&utm_medium=email&utm_content=title_link">もくもくまったり勉強会</a></a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Works -->
  <div id="worksSt"></div>
  <div class="py-5 worksSt">
    <section id="works">
      <div class="container">
        <h3 class="text-center mb-3">@lang('messages.work.work')</h3>
        <div class="card text-center text-dark w-75 mx-auto">
          <div class="topdesign">
            <table>
              <tbody>
                <tr>
                    <th rowspan="9">機能一覧・実装予定表</th>
                    <td colspan="2">現在勉強中のLaravel・Djangoのうち、Laravelを使った機能を随時更新していきます。</td>
                </tr>
                <tr>
                    <td>会員処理（登録・変更・退会・詳細・一覧）</td>
                    <td>実装済み</td>
                </tr>
                <tr>
                    <td>ログイン・ログアウト</td>
                    <td>実装済み</td>
                </tr>
                <tr>
                    <td>SNSログイン処理（Google）</td>
                    <td>実装済み</td>
                </tr>
                <tr>
                    <td>SNSログイン処理（Google以外）</td>
                    <td>実装済み</td>
                </tr>
                <tr>
                    <td>天気情報</td>
                    <td>実装中</td>
                </tr>
                <tr>
                    <td>カート機能</td>
                    <td>実装予定</td>
                </tr>
                <tr>
                    <td>精算機能</td>
                    <td>実装予定</td>
                </tr>
                <tr>
                    <td colspan="3">
                      <div class="p-3 text-center">
                        <a id="contact_us" href="{{ action('Works\WorksController@index') }}">機能一覧はこちら</a>
                      <div>
                    </td>
                </tr>
                <tr>
                    <th rowspan="3">GitHub</th>
                    <td colspan="2">このサイトのソースをGitHubに挙げておりますので、ご興味がありましたら参照してください。</td>
                </tr>
                <tr>
                    <td>Laravel</td>
                    <td><a href="https://github.com/KasukabeYou/laravPrj">https://github.com/KasukabeYou/laravPrj</a></td>
                </tr>
                <tr>
                    <td>Django</td>
                    <td><a href="https://github.com/KasukabeYou/pythonPrj">https://github.com/KasukabeYou/pythonPrj</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Contact Us -->
  <div id="contactUsSt"></div>
  <div class="py-5 bg-light">
    <section id="contactUs">
      <div class="container">
        <h3 class="text-center mb-3">@lang('messages.contact')</h3>
        <div class="card text-left text-dark w-75 mx-auto">
        <form method="POST" action="{{ route('mail.confirm') }}">
          @csrf
          <div class="topdesign">
            <table>
              <tbody>
                <tr>
                    <th rowspan="5">お問い合わせ</th>
                    <td colspan="2">何か御用のある方は下の入力欄より、問い合わせ内容を入力してください。</td>
                </tr>
                <tr>
                    <td style="width:40%">メールアドレス</td>
                    <td style="width:40%">
                      <input style="width:80%" name="email" value="{{ old('email') }}" type="text">
                      @if ($errors->has('email'))
                      <p class="error-message">{{ $errors->first('email') }}</p>
                      @endif
                    </td>
                </tr>
                <tr>
                    <td style="width:40%">タイトル</td>
                    <td style="width:40%">
                      <input style="width:80%" name="title" value="{{ old('title') }}" type="text">
                      @if ($errors->has('title'))
                          <p class="error-message">{{ $errors->first('title') }}</p>
                      @endif
                    </td>
                </tr>
                <tr>
                    <td style="width:40%">お問い合わせ内容</td>
                    <td style="width:40%">
                      <textarea style="width:100%;min-height:200px;" name="body">{{ old('body') }}</textarea>
                      @if ($errors->has('body'))
                          <p class="error-message">{{ $errors->first('body') }}</p>
                      @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                      <div class="p-3 text-center">
                        <button id="contact_us" type="submit">お問い合わせ内容確認</button>
                      <div>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
        </form>
        </div>
      </div>
    </section>
  </div>
@endsection

@section('footer')
    <!-- ナビゲーション -->
    <ul class="nav justify-content-center mb-3">
      <li class="nav-item">
        <a class="nav-link" href="#topSt">Top</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#profileSt">@lang('messages.profile')</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#worksSt">@lang('messages.work.work')</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contactUsSt">@lang('messages.contact')</a>
      </li>
    </ul>
    <!-- ナビゲーション -->
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection