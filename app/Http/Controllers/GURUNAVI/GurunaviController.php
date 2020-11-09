<?php

namespace App\Http\Controllers\GURUNAVI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GurunaviController extends Controller
{
    //
    /**
     * 初期表示.
     */
    public function index() {
        // 都道府県APIより都道府県の情報を取得.
        $tdhk = $this->curlJson(config('my-app.gurunavi.tdhk_api'),
                        ['keyid'=>config('my-app.gurunavi.api_key'),'lang'=>'ja']);
        session('tdhk', $tdhk['pref']);
        // 画面を呼び出す
        return view('gurunavi.index',['tdhks'=>$tdhk['pref']]);
    }

    /**
     * レストランの情報.
     */
    public function output(Request $req) {
        $HIT_PER_PAGE = 100;
        
        // 都道府県APIより都道府県の情報を取得.
        // $tdhk = $this->curlJson(config('my-app.gurunavi.tdhk_api'),
                        // ['keyid'=>config('my-app.gurunavi.api_key'),'lang'=>'ja']);
                        
        $tdhk = session('tdhk');
        
        \Log::info('セッション確認');
        \Log::info($tdhk);
        
        // レストラン情報
        $rest_data = $this->curlJson(config('my-app.gurunavi.rest_api'),
                        ['keyid'=>config('my-app.gurunavi.api_key')
                        ,'hit_per_page'=>$HIT_PER_PAGE
                        ,'pref'=>$req->gurunavi_select]);
        // 地名より検索
        return view('gurunavi.index' ,['rest_info'=>$rest_data['rest'], 'tdhks'=>$tdhk['pref']]);
    }
    
    /**
     * リクエスト送信（curl）.
     * 
     * @param $url URL.
     * @param $params URLのパラメータ.
     * 
     * @return success:アクセス先のレスポンスデータ, fail : false.
     */
    private function curlJson($url, $params = array() ) {
        // 引数が複数あるか
    	if (count($params) > 0) {
    	    // URLエンコードされたクエリ文字列を生成
    	    $query = '?' . http_build_query($params);
    	} else {
    	    $query = '';
    	}
    	$url .= $query;
    	
    	\Log::info("URL:".$url);
    	
    	// ヘッダーの設定
    	$headers = array(
        	'Content-type: application/json; charset=UTF-8',
        	'Accept: application/json'
    	);
    	// 指定した関数が定義されているかチェック
    	// curl_version　→　cURL のバージョンを返す
    	if (!function_exists('curl_version')) {
    	    return false;
    	}
    	// cURL セッションを初期化する
    	$ch = curl_init();
    	
    	// curl_setopt関数でcURL転送用オプションを設定
    	// https://www.php.net/manual/ja/function.curl-setopt
    	// URL
    	curl_setopt( $ch, CURLOPT_URL, $url );
    	// アクセスしてタイムアウトになるまでの時間
    	curl_setopt( $ch, CURLOPT_TIMEOUT, 60);
    	// 文字列で返す
    	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    	// ヘッダー情報を設定する
    	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
    	// cURL セッションを実行する
    	$data = curl_exec($ch);
    	// 指定した伝送に関する情報を得る
    	$response = curl_getinfo( $ch, CURLINFO_RESPONSE_CODE );
    	// セッションを閉じる
    	curl_close($ch);
    	
    	if ($response === 200) {
    	    // JSONデータを配列に変換
    	    $data = json_decode($data, true);
    	} else {
    	    $data = false;
    	};
    	return $data;
    }
}
