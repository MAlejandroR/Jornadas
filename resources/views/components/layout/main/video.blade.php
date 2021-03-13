    <video class="" autoplay controls width=80% height=100% playsinline muted loop title="VÍDEO JEJE "
           poster="{{asset('images/logo_calidad.png')}}" id=video>
        <source src="{{asset('videos/presentacion.mkv')}}" type="video/mp4"/>


        <track id="subtitulo" src="{{asset('videos/presentacion.vtt')}}" kind="subtitles" srclang="es"
               label="Español" default>
        Lo sentimos. Este vídeo no puede ser reproducido en tu navegador.<br>
        La versión descargable está disponible en <a href="URL">Enlace</a>.
    </video>



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

        videoPlayer.addEventListener("timeupdate", function () {

            if ((this.currentTime >= 30) && (this.currentTime <= 31)) {
                $("#ii").addClass("transform translate-y-1 scale-110 bg-green-800");

            }
            if (this.currentTime >= 31) {
                $("#ii").removeClass("transform translate-y-1 scale-110 bg-green-800");
            }
            if ((this.currentTime >= 24) && (this.currentTime <= 26)) {

                $("#id").addClass("transform translate-y-1 scale-110 bg-green-800");
                $("#id").attr("src", "images/familias/jornadas2.png");

            }
            if (this.currentTime >= 26) {
                $("#id").removeClass("transform translate-y-1 scale-110 bg-green-800");
                $("#id").attr("src", "images/familias/jornadas.png");
            }

            if ((this.currentTime >= 19) && (this.currentTime <= 21)) {
                //si
                $("#si").addClass("transform translate-y-1 scale-110 bg-green-800");
            }
            if (this.currentTime >= 21) {
                $("#si").removeClass("transform translate-y-1 scale-110 bg-green-800");
            }
            if ((this.currentTime >= 15) && (this.currentTime <= 17)) {
                $("#sd").addClass("transform translate-y-1 scale-110 bg-green-800");
            }
            if (this.currentTime >= 17) {
                $("#sd").removeClass("transform translate-y-1 scale-110 bg-green-800");
            }

            // }            /* more of the video has played */
            // if ((this.currentTime >= 30) && (this.currentTime <= 31)) {
            //     //ii
            //     remove_yellow();
            //     $("#ii").addClass("bg-green-800");
            //     $("#id").addClass("bg-red-800");
            //     $("#si").addClass("bg-red-800");
            //     $("#sd").addClass("bg-red-800");
            //
            //
            //     // $("#ii").addClass("transition durantion-1500 bg-red-200 transform bg-red-200")
            //
            //     console.log("Cambiando class ii");
            // }
            // // if ((this.currentTime >= 24) && (this.currentTime <= 26)) {
            // if ((this.currentTime >= 2) && (this.currentTime <= 3)) {
            //     //id
            //     remove_yellow();
            //     $("#ii").addClass("bg-red-800");
            //     // transform hover:-translate-y-1 hover:scale-110
            //     $("#id").addClass("transform translate-y-1 scale-110 bg-green-800");
            //     $("#si").addClass("bg-red-800");
            //     $("#sd").addClass("bg-red-800");
            //     console.log("Cambiando class id");
            //
            // }
            // if (this.currentTime >= 4) {
            //     $("#id").removeClass("transform translate-y-1 scale-110 bg-green-800");
            // }
            //
            // if ((this.currentTime >= 19) && (this.currentTime <= 21)) {
            //     //si
            //     remove_yellow();
            //     $("#sd").addClass("bg-red-800");
            //     $("#si").addClass("bg-green-800");
            //     $("#id").addClass("bg-red-800");
            //     $("#ii").addClass("bg-red-800");
            //     console.log("Cambiando class si");
            //
            // }
            // if ((this.currentTime >= 15) && (this.currentTime <= 17)) {
            //     //sd
            //     remove_yellow();
            //     $("#ii").addClass("bg-red-800");
            //     $("#id").addClass("bg-red-800");
            //     $("#si").addClass("bg-red-800");
            //     $("#sd").addClass("bg-green-800");
            //     console.log("Cambiando class id");
            //     console.log("Cambiando class sd");
            // }
        });
    </script>
@endsection