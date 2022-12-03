@extends('layouts.app')

@section('content')
sound page
<br>
<a href="/sound/add">add sound</a>

<div id="sound_list">
</div>

<script>
    window.onload = function() {
        getSoundList().then(data => {
            const sound_list = document.getElementById('sound_list');
            data.forEach(item => {
                let el = document.createElement('a');
                el.innerHTML = item;
                el.ref = "#";
                el.className = 'sound';
                el.dataset.sound = item;
                console.log(sound_list);
                sound_list.appendChild(el);
            });
        });
    };

    const sound_list = document.getElementById('sound_list');
    sound_list.addEventListener('click', (e) => {
        playSound(e).then(data => {

        });
    });

    async function getSoundList() {
        const response = await fetch('/api/getSoundList');
        const json = await response.json();
        return json.map(item => item.Key);
    }

    async function playSound(e) {
        const play_btn = document.querySelectorAll('.sound');
        const path = e.target.dataset.sound;
        const form = new FormData();
        form.append('path', path);

        const response = await fetch('/api/getSound', {
            method: "POST",
            body: form
        });
        const json = await response.json();

        let sound = new Audio(json);
        sound.play();
    }
</script>

@endsection