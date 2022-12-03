@extends('layouts.app')

@section('content')
sound page
<br>
<a href="/sound/add">add sound</a>

<div class="sound_list">

</div>

@endsection

<script>
    window.onload = function() {
        const aaa = getSoundList().then(data => {
            console.log(data);
        })
    };

    async function getSoundList() {
        const response = await fetch('/api/getSoundList');
        const json = await response.json();
        const array = json.map(item => item.Key);

        const soundlist = [];
        array.forEach(item => {
            // memo: ちゃんとしたaタグ作る
            // let el = document.createElement('a');
            // el.innerHTML = item.Key;
            // el.className = 'sound'
            // soundlist.push(el);
        });
        return soundlist;
    }


    // const play_btn = document.getElementById('play_btn');
    // play_btn.addEventListener("click", () => {
    //     // 音声パスを取得
    //     // fetchAPIで/api/getSoundを実行し音声ファイルを取得する
    //     let sound = new Audio();
    //     sound.play();
    // });
</script>