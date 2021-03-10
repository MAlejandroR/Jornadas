<div>
    <video
            controls width=420 height=320 playsinline autoplay muted loop title="VÍDEO JEJE "
            poster="{{asset('public/images/logo_calidad.png')}}" id=video>
        <source src="{{asset('storage/videos/presentacion.mkv')}}" type="video/mp4"/>


        <track id="subtitulo" src="{{asset('storage/videos/presentacion.vtt')}}" kind="subtitles" srclang="es"
               label="Español" default>
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
            video.removeAttribute("default");

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


        var $video = $('video');
        var comercio = $('comercio');
        var informatica = $('informatica');
        var imagen = $('imagen');
        var cpi = $('cpi');
        var ii = $("#ii");
        var si = $("#si");
        var id = $("#id");
        var sd = $("#sd");
        var subtitulo = $("#subtitulo");
        var m = $("#m");
        m.innerHTML = "Cambibando cambiando";


        // function func() {
        //     if ( (this.currentTime >=19) and (this.currentTime>=20)) {
        //         alert ("Epa");
        //         cosola.log="Epa epa estoy en según ok";
        //     }
        // }
        //
        // video.on('timeupdate', func);


        function remove_yellow() {
            $("#ii").removeClass("bg-green-800");
            $("#si").removeClass("bg-green-800");
            $("#id").removeClass("bg-green-800");
            $("#sd").removeClass("bg-green-800");
        }

        videoPlayer.addEventListener("timeupdate", function () {

            /* more of the video has played */
            if ((this.currentTime >= 30) && (this.currentTime <= 31)) {
                //ii
                remove_yellow();
                $("#ii").addClass("bg-green-800");
                $("#id").addClass("bg-red-800");
                $("#si").addClass("bg-red-800");
                $("#sd").addClass("bg-red-800");


                // $("#ii").addClass("transition durantion-1500 bg-red-200 transform bg-red-200")

                console.log("Cambiando class ii");
            }
            if ((this.currentTime >= 24) && (this.currentTime <= 26)) {
                //id
                remove_yellow();
                $("#ii").addClass("bg-red-800");
                $("#id").addClass("bg-green-800");
                $("#si").addClass("bg-red-800");
                $("#sd").addClass("bg-red-800");
                console.log("Cambiando class id");

            }
            if ((this.currentTime >= 19) && (this.currentTime <= 21)) {
                //si
                remove_yellow();
                $("#sd").addClass("bg-red-800");
                $("#si").addClass("bg-green-800");
                $("#id").addClass("bg-red-800");
                $("#ii").addClass("bg-red-800");
                console.log("Cambiando class si");

            }
            if ((this.currentTime >= 15) && (this.currentTime <= 17)) {
                //sd
                remove_yellow();
                $("#ii").addClass("bg-red-800");
                $("#id").addClass("bg-red-800");
                $("#si").addClass("bg-red-800");
                $("#sd").addClass("bg-green-800");
                console.log("Cambiando class id");
                console.log("Cambiando class sd");
            }
        });
    </script>
@endsection