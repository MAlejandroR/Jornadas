<div>
    <video
           width=420 height=320 playsinline autoplay muted loop title="VÍDEO JEJE "
           poster="{{asset('public/images/logo_calidad.png')}}" id=video onclick="click_video"
    >
        <source src="{{asset('storage/videos/presentacion.mkv')}}"  type="video/mp4" />


        <track src="{{asset('storage/videos/presentacion.vtt')}}" kind="subtitles" srclang="es" label="Español" default>
        Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.<br>
        La versión descargable está disponible en <a href="URL">Enlace</a>.
    </video>
    <h2>Clcik sobre mí para parar o activar el vídeo</h2>
    <x-form.button id="botonVideo">
        Ver texto
    </x-form.button>

</div>
@section("script")
    <script>
    // function click_video(){
    //     alert ("hola please");
    //
    //         if($("#video").onplay)
    //             $("#video").play();
    //
    //         else
    //             $("#video").pause();
    //     }


    var videoPlayer = document.getElementById('video');
    var botonVideo = document.getElementById('botonVideo');
    botonVideo.addEventListener('click', function () {

    });

    // Auto play, half volume.
    videoPlayer.play()
    videoPlayer.volume = 0.5;


    // Play / pause.
    videoPlayer.addEventListener('click', function () {
        if (videoPlayer.paused == false) {
            videoPlayer.pause();
            videoPlayer.firstChild.nodeValue = 'Play';
        } else {
            videoPlayer.play();
            videoPlayer.firstChild.nodeValue = 'Pause';
        }
    });
    </script>
@endsection