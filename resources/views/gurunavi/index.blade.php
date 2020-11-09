@extends('layouts.common_work')

@section('title', 'ぐるなび情報')

@section('content')
<div style="min-height:600px;" class="container p-4">
    <div class="pt-2 pl-4">
        <h3>ぐるなび情報の出力</h3>
        <h3>一時的にレストラン情報を表示</h3>
    </div>
    <form action="/gurunavi/output" method="post">
    @csrf
    <select name='gurunavi_select'>
    @if(isset($tdhks))
        @foreach ($tdhks as $tdhk)
            <option value="{{$tdhk['pref_code']}}">{{$tdhk['pref_name']}}</option>
        @endforeach
    @endif
    </select>
    <input type="submit" value="検索">
    </form>
    @if(isset($rest_info))
        @foreach ($rest_info as $rest)
            {{$rest['name']}}<br/>
        @endforeach
    @endif
</div>
@endsection

@section('footer')
    <p>
      <small>Copyright &copy;2020 Technical Diary.</small>
    </p>
@endsection